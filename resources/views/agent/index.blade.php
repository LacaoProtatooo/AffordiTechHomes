<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])

    <title>AffordiTech</title>
</head>
<body class="bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200">
    @include('message')
    @include('common.header')

    <nav class="bg-transparent ">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 ">
        <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="../../../storage/Logo_BG_Removed.png" class="h-8" alt="AffordiTech Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse"></div>

        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 bg-transparent" id="navbar-cta">
            <div class="flex flex-col font-medium p-4 md:p-0 mt-0 border border-gray-100 rounded-lg bg-transparent md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                {{-- Check Appointments --}}
                <button onclick="location.href='{{ route('agent.appointment') }}';" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">Check Appointments</span>
                </button>
                 {{-- Check Previous Clients --}}
                <button onclick="location.href='{{route('agent.inquiry')}}';" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">Check Inquiries</span>
                </button>
                {{-- Transaction --}}
                <button onclick="location.href='{{route('agent.transaction')}}';" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">Sold Properties</span>
                </button>
            </div>
        </div>
    </div>

    </nav>

    {{-- TABLE --}}
    <div class = "items-center justify-between mb-10 ml-10 mr-10 mt-10 w-full md:w-auto md:order-1 bg-green-200">
        <div class="relative overflow-x-auto shadow-2xl sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-green-900">
                <thead class="text-xs text-white uppercase dark:bg-gray-700 dark:text-gray-400 bg-green-900">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Customer Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Contact No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Property Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Address
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Block
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Unit
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Square Area
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Availability
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only"></span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inquiries as $inquire)
                        {{-- PROPERTY INQUIRE INFORMATION --}}
                        @foreach ($customers as $customer)
                            @if ($inquire->customer_id == $customer->id)
                                <td scope="col" class="px-6 py-3 text-white">
                                    {{ $customer->name }}
                                </td>
                                <td scope="col" class="px-6 py-3 text-white">
                                    {{ $customer->phone_number }}
                                </td>
                            @endif
                        @endforeach

                        @foreach ($properties as $property)
                            @if ($inquire->property_id == $property->id)
                                <td scope="col" class="px-6 py-3 text-white">
                                    {{ $property->property_type }}
                                </td>
                                <td scope="col" class="px-6 py-3 text-white">
                                    {{ $property->description }}
                                </td>
                                <td scope="col" class="px-6 py-3 text-white">
                                    {{ $property->price }}
                                </td>
                                <td scope="col" class="px-6 py-3 text-white">
                                    {{ $property->address }}
                                </td>
                                <td scope="col" class="px-6 py-3 text-white">
                                    {{ $property->block }}
                                </td>
                                <td scope="col" class="px-6 py-3 text-white">
                                    {{ $property->unit }}
                                </td>
                                <td scope="col" class="px-6 py-3 text-white">
                                    {{ $property->sqm }}
                                </td>
                                <td scope="col" class="px-6 py-3 text-white">
                                    {{ $property->status }}
                                </td>
                                <td scope="col" class="px-6 py-3">
                                    <button type="button" onclick="location.href='{{ route('agent.inquiredetails', ['property_id' => $property->id, 'customer_id' => $inquire->customer_id]) }}'"
                                    class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">View Details</button>
                                </td>
                            @endif
                        @endforeach
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function confirmDelete(deleteUrl) {
            if (confirm("Are you sure you want to delete this property?")) {
                window.location.href = deleteUrl;
            }
        }
    </script>

    @include('common.footer')
</body>
</html>