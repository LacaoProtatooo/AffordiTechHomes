<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Agents</title>
</head>
<body class="bg-green-200">
    @include('message')
    @include('common.header')

    <div class="px-4 pt-6">
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
                      <td>
                          <!-- VIEW DETAILS -->
                          <button type="button" onclick="location.href='{{route('admin.agentprofile',$agent->id)}}';" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-0">DETAILS</button>
                      </td>
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