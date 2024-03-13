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
    @php
      //dd($inquiries);
    @endphp

    {{--Table for appointment--}}
    <br>
    <div class="items-center justify-between mb-20 ml-4 mr-4 mt-4 w-auto rounded-lg">
    
    <div class="overflow-x-auto mt-8 rounded-lg"> <!-- Add margin top for separation -->
        <h2 class="text-2xl font-semibold mb-4">Property Inquiries</h2> <!-- Added h2 heading -->
        <table class="min-w-full bg-white">
          <thead class="bg-gray-100">
            <tr>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Property ID</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Property Title</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Address</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Customer Name</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Customer Contact</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Agent Assigned</th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
            @foreach ($inquiries as $inquire)
            <tr>
            <td class="py-3 px-4">{{ $inquire->property_id }}</td>
            <td class="py-3 px-4">{{ $inquire->description }}</td>
            <td class="py-3 px-4">{{ $inquire->address }}</td>
            <td class="py-3 px-4">{{ $inquire->name }}</td>
            <td class="py-3 px-4">{{ $inquire->phone_number }}</td>
            @if ($inquire->agent_name)
            <td class="py-3 px-4">{{$inquire->agent_name}}</td>
            @else
            <td class="py-3 px-4">
              <button onclick="location.href='{{ route('broker.inquiredetails', ['property_id' => $inquire->property_id, 'customer_id' => $inquire->customer_id]) }}'"
                class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                  Details
                </span>
              </button>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @include('common.footer')
</body>
</html>