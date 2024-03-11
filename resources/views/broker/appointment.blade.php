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
    <div class="items-center justify-between mb-20 ml-4 mr-4 mt-4 w-auto">
    
    <div class="overflow-x-auto mt-8"> <!-- Add margin top for separation -->
        <h2 class="text-2xl font-semibold mb-4">Appointed Schedules</h2> <!-- Added h2 heading -->
        <table class="min-w-full bg-white">
          <thead class="bg-gray-100">
            <tr>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Property ID</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Date</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Time</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Customer Name</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone Number</th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
            @foreach ($schedules as $schedule)
                <tr>
                  <td class="py-3 px-4">{{$schedule->property_id}}</td>
                  <td class="py-3 px-4">
                    {{ \Carbon\Carbon::parse($schedule->time_schedule)->toDateString() }}
                </td>
                <td class="py-3 px-4">
                    {{ \Carbon\Carbon::parse($schedule->time_schedule)->format('h:i A') }}
                </td>
                <td class="py-3 px-4">@if ($schedule->name)
                  {{ $schedule->name}}
              @else
                  No Schedule Yet
              @endif</td>
              <td class="py-3 px-4">@if ($schedule->phone_number)
                {{ $schedule->phone_number}}
            @else
                No Schedule Yet
            @endif</td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @include('common.footer')
</body>
</html>