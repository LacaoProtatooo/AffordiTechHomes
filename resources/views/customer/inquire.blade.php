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
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Property Description</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Address</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Broker Name</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Broker Contact</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Agent Name</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Agent Contact</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Cancel</th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
            @foreach ($inquires as $inquire)
            <tr>
                <td class="py-3 px-4">{{ $inquire->description }}</td>
                <td class="py-3 px-4">{{ $inquire->property_address }}</td>
                <td class="py-3 px-4">{{ $inquire->broker_name }}</td>
                <td class="py-3 px-4">{{ $inquire->broker_contact }}</td>
                <td class="py-3 px-4">
                  @if ($inquire->agent_name)
                      {{$inquire->agent_name}}
                  @else
                      No Agent Assign Yet
                  @endif
                </td>
                <td class="py-3 px-4">
                  @if ( $inquire->agent_contact )
                  {{ $inquire->agent_contact }}
                  @else
                    No Agent Assign Yet
                  @endif
                </td>
                <td class="py-3 px-4">
                    <a href="{{ route('inquire.delete', ['customer_id' =>$customer->id, 'property_id' => $inquire->property_id]) }}" class="text-blue-500 hover:underline">Remove</a>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @include('common.footer')
</body>
</html>
