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
<body class="bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200">
    @include('message') 
    @include('common.header')

    {{--Table for appointment--}}
    <br>
    <div class="items-center justify-between mb-20 ml-4 mr-4 mt-4 w-auto rounded-lg">
    
    <div class="overflow-x-auto mt-8 rounded-lg"> <!-- Add margin top for separation -->
        <h2 class="text-2xl font-semibold mb-4">Sold Properties</h2> <!-- Added h2 heading -->
        <table class="min-w-full bg-white">
          <thead class="bg-gray-100">
            <tr>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Property ID</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Address</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Price</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Payment Method</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Customer Name</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Customer Contact</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Agent Name</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Agent Contact </th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
            @foreach ($solds as $sold)
            <tr>
              <td class="py-3 px-4">{{$sold->property_id}}</td>
              <td class="py-3 px-4">{{$sold->description}}</td>
              <td class="py-3 px-4">{{$sold->address}}</td>
              <td class="py-3 px-4">₱{{$sold->price}}</td>
              <td class="py-3 px-4">{{$sold->payment_method}}</td>
              <td class="py-3 px-4">{{$sold->customer_name}}</td>
              <td class="py-3 px-4">{{$sold->customer_contact}}</td>
              <td class="py-3 px-4">{{$sold->agent_name}}</td>
              <td class="py-3 px-4">{{$sold->agent_contact}}</td>
              </tr>  
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @include('common.footer')
</body>
</html>