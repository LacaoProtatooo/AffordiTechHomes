<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])

    <title>Properties</title>
</head>
<body class="bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700">
    @include('message')
    @include('common.header')

    {{-- TABLE --}}
    <div class = "items-center justify-between mb-10 ml-10 mr-10 mt-10 w-full md:w-auto md:order-1 bg-transparent rounded-lg">
        <div class="flex flex-col justify-end items-end font-medium p-4 md:p-0 mt-0 border border-gray-100 rounded-lg bg-transparent md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            {{-- Add Property --}}
            <button onclick="location.href='{{ route('property.create') }}';" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">Add Property</span>
            </button>
        </div>

        <div class="relative overflow-x-auto shadow-2xl sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-green-900">
                <thead class="text-xs text-white uppercase dark:bg-gray-700 dark:text-gray-400 bg-green-900">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Update
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Delete
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Developer
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Property Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Address
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rooms
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Sq Meters
                        </th>
                        <th scope="col" class="px-6 py-3">
                            CR
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Parking
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Images
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($properties as $property)
                    @php
                        $imagePaths = explode(',', $property->image_path);
                    @endphp
                    
                    <tr class="bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-green-700 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            <a href="{{route('property.edit',$property->id)}}" class="text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out">Update</a>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route('property.delete',$property->id)}}" class="text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out">Delete</a>
                        </td>
                        <td class="px-6 py-4">
                            {{ $property->developer }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $property->property_type }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $property->address }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $property->price }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $property->description }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $property->rooms }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $property->sqm }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $property->cr }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $property->status }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $property->block }}
                        </td>

                        <td class="px-6 py-4 flex space-x-2">
                            @foreach($imagePaths as $imagePath)
                                <img src="{{ asset($imagePath) }}" alt="Property Image" style="max-width: 100px; max-height: 150px;">
                            @endforeach      
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