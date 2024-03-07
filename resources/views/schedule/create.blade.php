<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Add Schedule</title>
</head>
<body class="bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200">
    @include('common.header')
    <br><br>

    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto  lg:py-0">
        <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Select an Option: </h3><br>
        <form action="{{route('schedule.store')}}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto ">
        @csrf
        <label for="property_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label><b>Property:</b></label><br><br>
        <select name="property_id" id="property_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" disabled selected>Select Property Number</option>
            @foreach ($properties as $property)
                <option value="{{$property->id}}">Property ID {{$property->id}}</option>
            @endforeach
        </select><br>

        <br><br>
        <label for="date"><b>Select Date:</b></label><br>
        
        <div class="relative max-w-sm">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
              </svg>
            </div>
            
            <input datepicker type="text" name="date" id="date" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
          </div>
        <br><br>
        <label for="times" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><b>Select Time:</b></label>
        <select name="times[]" id="times" multiple required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="00:00">00:00</option>
            @for ($hour = 1; $hour <= 11; $hour++)
                <option value="{{ sprintf('%02d', $hour) }}:00">{{ sprintf('%02d', $hour) }}:00</option>
            @endfor
            <option value="12:00">12:00 PM</option>
            @for ($hour = 1; $hour <= 11; $hour++)
                <option value="{{ sprintf('%02d', $hour + 12) }}:00">{{ sprintf('%02d', $hour + 12) }}:00</option>
            @endfor
        </select>
        <br><br>
            <button type="submit" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:px-6 hover:py-3.5 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Submit</button>
        </form>
    </div>

    <br>
    @include('common.footer')
</body>
</html>