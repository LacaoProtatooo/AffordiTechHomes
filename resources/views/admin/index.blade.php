<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])

    <title>Admin</title>
</head>
<body class="bg-green-200 ">
    @include('message')
    @include('common.header')
    @csrf

    <!-- THREE TABS -->
    <div class="px-4 pt-6">
    <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
      <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
          <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Listed Properties</h3>
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{$propertycount}}</span>
          <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
            </span>
            Since Launch
          </p>
        </div>
        <div class="w-full" id="new-products-chart"></div>
      </div>
      <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
          <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Agents</h3>
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{$agentcount}}</span>
          <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
            </span>
            Registered
          </p>
        </div>
        <div class="w-full" id="week-signups-chart"></div>
      </div>
      <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
          <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Users</h3>
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{$usercount}}</span>
          <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
            </span>
            Since Launch
          </p>
        </div>
        <div class="w-full" id="week-signups-chart"></div>
      </div>
      <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
          <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Brokers</h3>
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{$brokercount}}</span>
          <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
            </span>
            Since Launch
          </p>
        </div>
        <div class="w-full" id="week-signups-chart"></div>
      </div>
      <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
          <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Property Available</h3>
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{$propertyavailCount}}</span>
          <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
            </span>
            Since Launch
          </p>
        </div>
        <div class="w-full" id="week-signups-chart"></div>
      </div>
      <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
          <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Property Sold</h3>
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{$propertySoldCount}}</span>
          <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
            </span>
            Since Launch
          </p>
        </div>
        <div class="w-full" id="week-signups-chart"></div>
      </div>
    </div>
    <br>

    <!-- PROPERTIES -->
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
      <!-- Card header -->
      <div class="items-center justify-between lg:flex">
        <div class="mb-4 lg:mb-0">
          <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Properties</h3>
          <span class="text-base font-normal text-gray-500 dark:text-gray-400">This is a list of Properties</span>
        </div>

        <div class="items-center sm:flex">
          <div class="flex items-center">
            <!-- FILTER -->
            {{-- <button id="dropdownDefault" data-dropdown-toggle="dropdown"
              class="mb-4 sm:mb-0 mr-4 inline-flex items-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
              type="button">
              Filter by status
              <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </button>
            <!-- DROPDOWN FILTER MENU -->
            <div id="dropdown" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
              <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                Category
              </h6>
              <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                <li class="flex items-center">
                  <input id="apple" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                  <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                    Available
                  </label>
                </li>
                <li class="flex items-center">
                  <input id="fitbit" type="checkbox" value="" checked class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                  <label for="fitbit" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                    Sold
                  </label>
                </li>
              </ul>
            </div> --}}
          </div>
        </div>
      </div>

      <!-- Table of Properties -->
      <div class="flex flex-col mt-6 ">
        <div class="overflow-x-auto rounded-lg">
          <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden shadow sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                <thead class="bg-gray-50 dark:bg-gray-700">
                  <tr>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Property Name
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Property Type
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Property Price
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Agent Seller
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Payment method
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Status
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      
                    </th>
                  </tr>
                </thead>

                <tbody class="bg-white dark:bg-gray-800">
                    @foreach ($properties as $property)
                      <tr class="">
                        <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                          <span class="font-semibold">{{$property->description}}</span>
                        </td>
                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                          {{$property->property_type}}
                        </td>
                        <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                          {{$property->price}}
                        </td>
                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                          {{-- para to sa agent seler na nakabenta sa property inalis ko lang dahil nag eerror --}}
                        </td>
                        <td class="inline-flex items-center p-4 space-x-2 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                          @php
                            $pyment = '';
                            if($property->status != 'available'){
                              // get payment method
                              foreach($solds as $sold){
                                if($sold->property_id == $property->id){
                                  $pyment = $sold->payment_method;
                                  break;
                                }
                              }
                            }
                          @endphp

                          {{$pyment}}
                        </td>

                        <td class="p-4 whitespace-nowrap">
                            <!-- SOLD STATUS -->
                            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">{{$property->status}}</span>
                        </td>
                        @php
                            // VIEW DETAILS THE PAYMENT METHOD
                            if ($property->status != 'available') {
                                echo '
                                    <td>
                                        <!-- IF SOLD (MAKE IT APPROVED)-->
                                        <button type="button" onclick="window.location.href=\''. route('admin.propertydetails', $property->id) .'\'" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-0">Details</button>
                                    </td>
                                ';
                            }
                        @endphp


                      </tr>
                    @endforeach
                    
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>

    {{-- BROKERS --}}
    <br>
     <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
      <!-- Card header -->
      <div class="items-center justify-between lg:flex">
        <div class="mb-4 lg:mb-0">
          <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Brokers</h3>
          <span class="text-base font-normal text-gray-500 dark:text-gray-400">This is a list of registered Brokers</span>
        </div>
      </div>

      <!-- Table -->
      <div class="flex flex-col mt-6">
        <div class="overflow-x-auto rounded-lg">
          <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden shadow sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                <thead class="bg-gray-50 dark:bg-gray-700">
                  <tr>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Broker Name
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Phone Number
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Address
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Sex
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Birthdate
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Email
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                    </th>
                  </tr>
                </thead>

                <tbody class="bg-white dark:bg-gray-800">
                  @foreach ($brokers as $broker)
                    <tr>
                      <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                        <span class="font-semibold">{{$broker->name}}</span>
                      </td>
                      <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{$broker->phone_number}}
                      </td>
                      <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                        {{$broker->address}}
                      </td>
                      <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{$broker->sex}}
                      </td>
                      <td class="inline-flex items-center p-4 space-x-2 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{$broker->birthdate}}
                      </td>
                      <td class="p-4 whitespace-nowrap">
                        @foreach ($users as $user)
                          @if ($broker->user_id == $user->id)
                            @php
                              $brokeremail = $user->email;
                              break;
                            @endphp
                          @endif
                        @endforeach

                        {{$brokeremail}}
                    </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <!-- AGENTS -->
    <br>
     <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
      <!-- Card header -->
      <div class="items-center justify-between lg:flex">
        <div class="mb-4 lg:mb-0">
          <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Agents</h3>
          <span class="text-base font-normal text-gray-500 dark:text-gray-400">This is a list of registered Agents</span>
        </div>
      </div>

      <!-- Table -->
      <div class="flex flex-col mt-6">
        <div class="overflow-x-auto rounded-lg">
          <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden shadow sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                <thead class="bg-gray-50 dark:bg-gray-700">
                  <tr>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Agent Name
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Phone Number
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Address
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Sex
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Birthdate
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Email
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                    </th>
                  </tr>
                </thead>

                <tbody class="bg-white dark:bg-gray-800">
                  @foreach ($agents as $agent)
                    <tr>
                      <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                        <span class="font-semibold">{{$agent->name}}</span>
                      </td>
                      <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{$agent->phone_number}}
                      </td>
                      <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                        {{$agent->address}}
                      </td>
                      <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{$agent->sex}}
                      </td>
                      <td class="inline-flex items-center p-4 space-x-2 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{$agent->birthdate}}
                      </td>
                      <td class="p-4 whitespace-nowrap">
                        @foreach ($users as $user)
                          @if ($agent->user_id == $user->id)
                            @php
                              $agentemail = $user->email;
                              break;
                            @endphp
                          @endif
                        @endforeach

                        {{$agentemail}}
                      </td>
                      {{-- <td>
                          <!-- IF SOLD (MAKE IT APPROVED)-->
                          <button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-0">VERIFY</button>
                      </td> --}}
                    </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>

    @include('common.footer')
</body>
</html>