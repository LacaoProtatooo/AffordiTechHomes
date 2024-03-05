<!--NAVBAR-->
<?php
$currentUser = Auth::user();
?>
<nav class="bg-white border-gray-200 dark:bg-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700">
    <div class="max-w-screen-xl flex flex-wrap items-center mx-auto p-4">
        
        <!-- Separate form for search -->
        <form action="{{route('property.search')}}" method="POST" class="mr-4 flex">
            @csrf
            <!--PROPERTY TYPE DROPDOWN-->
            <select name="property_type" class="bg-gradient-to-r mr-3 from-teal-400 via-teal-500 to-teal-600 border border-black-300 text-gray-900 mb-0 text-sm rounded-lg focus:border-blue-500 block w-40 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80">
                <option selected disabled>Property Type</option>
                <option value="APARTMENT">APARTMENT</option>
                <option value="CONDOMINIUM">CONDOMINIUM</option>
                <option value="HOUSE">HOUSE</option>
                <option value="LAND">LAND</option>
            </select>
            
            <!--BEDROOMS DROPDOWN-->
            <select name="bedrooms" class="bg-gradient-to-r mr-3 from-teal-400 via-teal-500 to-teal-600 border border-black-300 text-gray-900 mb-0 text-sm rounded-lg focus:border-blue-500 block w-40 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80">
                <option selected disabled>No. of Bedrooms</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>

            <!--CR DROPDOWN-->
            <select name="location" class="bg-gradient-to-r mr-3 from-teal-400 via-teal-500 to-teal-600 border border-black-300 text-gray-900 mb-0 text-sm rounded-lg focus:border-blue-500 block w-40 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80">
                <option selected disabled>Location</option>
                <option value="Taguig">Taguig</option>
                <option value="Makati">Makati</option>
                <option value="Pasay">Pasay</option>
                <option value="Pasig">Pasig</option>
                <option value="Mandaluyong">Mandaluyong</option>
                <option value="Pateros">Pateros</option>
            </select>

            <!--PARKING DROPDOWN-->
            <select name="parking" class="bg-gradient-to-r mr-3 from-teal-400 via-teal-500 to-teal-600 border border-black-300 text-gray-900 mb-0 text-sm rounded-lg focus:border-blue-500 block w-40 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80">
                <option selected disabled>No. of Parking</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>

            <!--Availability DROPDOWN-->
            <select name="status" class="bg-gradient-to-r mr-3 from-teal-400 via-teal-500 to-teal-600 border border-black-300 text-gray-900 mb-0 text-sm rounded-lg focus:border-blue-500 block w-40 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80">
                <option selected disabled>Availability</option>
                <option value="sold">sold</option>
                <option value="available">available</option>
            </select>

            <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:px-6 hover:py-3.5 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-8 py-3 text-center">Search</button>
        </form>

        @if ($currentUser)
        <button type="button" class="text-white mr-2 bg-gradient-to-r mt-2 from-blue-500 via-blue-600 to-blue-700 hover:px-6 hover:py-3.5 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-0 flex justify-end" onclick="window.location.href='{{route('customer.inquiry')}}';">Inquired Property</button>
        <button type="button" class="text-white mr-2 bg-gradient-to-r mt-2 from-blue-500 via-blue-600 to-blue-700 hover:px-6 hover:py-3.5 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-0 flex justify-end" onclick="window.location.href='{{route('customer.appointment')}}';">View Schedule</button>
        <button type="button" class="text-white mr-2 bg-gradient-to-r mt-2 from-blue-500 via-blue-600 to-blue-700 hover:px-6 hover:py-3.5 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-0 flex justify-end" onclick="window.location.href='{{route('customer.transaction')}}';">Transaction</button>
        @endif
    </div>
</nav>
