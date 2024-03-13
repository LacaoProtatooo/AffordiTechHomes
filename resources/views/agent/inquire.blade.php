<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Tailwind Utility & Flowbite-->
    @vite(['resources/css/app.css','resources/js/app.js'])

    <title>AffordiTech</title>
</head>
<body class="bg-green-200 ">
    @include('message')
    @include('common.header')

    {{--Table for appointment--}}
    <br>
    <div class="items-center justify-between mb-20 ml-4 mr-4 mt-4 w-auto rounded-lg">
    
    <div class="overflow-x-auto mt-8 rounded-lg"> <!-- Add margin top for separation -->
        <h2 class="text-2xl font-semibold mb-4">Property Inquire</h2> <!-- Added h2 heading -->
        <table class="min-w-full bg-white">
          <thead class="bg-gray-100">
            <tr>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Property Description</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Property Address</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Property Price</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Customer Name</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Customer Contact</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Broker Name</th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
            @foreach ($inquiries as $inquire)
            <tr>
            <td class="py-3 px-4">{{ $inquire->property_description }}</td>
            <td class="py-3 px-4">{{ $inquire->property_address }}</td>
            <td class="py-3 px-4">{{ $inquire->property_price }}</td>
            <td class="py-3 px-4">{{ $inquire->customer_name }}</td>
            <td class="py-3 px-4">{{ $inquire->customer_contact }}</td>
            <td class="py-3 px-4">{{ $inquire->broker_name }}</td>
            </tr> 
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @include('common.footer')
</body>
</html>