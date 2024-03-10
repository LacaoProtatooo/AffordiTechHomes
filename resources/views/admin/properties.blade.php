<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])

    <title>Properties</title>
</head>
<body>
    @include('message')
    @include('common.header')

    {{-- TABLE --}}
    <div class = "items-center justify-between mb-10 ml-10 mr-10 mt-10 w-full md:w-auto md:order-1 bg-green-200">
        <div class="relative overflow-x-auto shadow-2xl sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-green-900">
                <thead class="text-xs text-white uppercase dark:bg-gray-700 dark:text-gray-400 bg-green-900">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">publish</span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Approval Status
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
                        <td class="px-6 py-4 text-right"> 
                            @foreach ($approval as $aprstatus)
                                @if ($property->id == $aprstatus->property_id)
                                    @if ($aprstatus->status_of_approval == 'pending')

                                        <button onclick="confirmAction('{{ route('admin.approveproperty', $property->id) }}', 'Publish this property?')"
                                            class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                                            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                Approve
                                            </span>
                                        </button>
                                        
                                        <button onclick="confirmAction('{{ route('admin.rejectproperty', $property->id) }}', 'Reject this property?')"
                                            class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-200 via-red-300 to-yellow-200 group-hover:from-red-200 group-hover:via-red-300 group-hover:to-yellow-200 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400">
                                            <span class="relative px-7 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                               Reject
                                            </span>
                                        </button>
                                        
                                        <script>
                                            function confirmAction(url, message) {
                                                if (confirm(message)) {
                                                    window.location.href = url;
                                                }
                                            }
                                        </script>
                                 @endif
                                @endif
                            @endforeach
                        </td>

                        <td class="px-6 py-4">
                            @foreach ($approval as $aprstatus)
                                @if ($property->id == $aprstatus->property_id)
                                    {{ $aprstatus->status_of_approval }}
                                @endif
                            @endforeach
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
                            {{ $property->parking }}
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