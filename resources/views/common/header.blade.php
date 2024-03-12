<?php
use App\Models\Customer;
use App\Models\Agent;
use App\Models\Admin;
use App\Models\Broker;
use Carbon\Carbon;
$currentUser = Auth::user();

$customerinfo = null;
$brokerinfo = null;
$agentinfo = null;
$admininfo = null;

if ($currentUser) {
    $customerinfo = Customer::where('user_id', $currentUser->id)->first();
    $agentinfo = Agent::where('user_id', $currentUser->id)->first();
    $brokerinfo = Broker::where('user_id', $currentUser->id)->first();
    $admininfo = Admin::where('user_id', $currentUser->id)->first();
}

?>

<nav class="bg-green-900 border-gray-200 dark:bg-gray-900">

    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-0">

        <!--ICON AND NAME-->
        @if (isset($customerinfo) && $customerinfo)
        <a href="{{route('customer.dashboard')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="../../../storage/Logo_BG_Removed.png" class="h-32" alt="logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap text-yellow-100">AffordiTech Homes</span>
        </a>

        @elseif (isset($agentinfo) && $agentinfo)
        <a href="{{route('agent.dashboard')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="../../../storage/Logo_BG_Removed.png" class="h-32" alt="logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap text-yellow-100">AffordiTech Homes</span>
        </a>

        @elseif (isset($admininfo) && $admininfo)
        <a href="{{route('admin.dashboard')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="../../../storage/Logo_BG_Removed.png" class="h-32" alt="logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap text-yellow-100">AffordiTech Homes</span>
        </a>

        @else
        <a href="{{route('home')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="../../../storage/Logo_BG_Removed.png" class="h-32" alt="logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap text-yellow-100">AffordiTech Homes</span>
        </a>
        @endif

        <!--GET STARTED / LOGIN/REGISTER BUTTON-->
    <div class="flex md:order-2">
        
        @if (isset($customerinfo) && $customerinfo)
        @php
          $brokerinfo = NULL;
          $agentinfo = NULL;
          $admininfo = NULL;
        @endphp
        <button type="button" onclick="location.href='{{route('customer.profile')}}';" class="flex items-center justify-center text-white bg-gradient-to-br from-green-400 to-blue-600 hover:px-6 hover:py-3.5 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
          Welcome: {{ $customerinfo->name }}
          <span class="ml-1"></span>
          <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4H1m3 4H1m3 4H1m3 4H1m6.071.286a3.429 3.429 0 1 1 6.858 0M4 1h12a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Zm9 6.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
          </svg>
        </button>
        
        @elseif (isset($agentinfo) && $agentinfo)
        @php
          $brokerinfo = NULL;
          $customerinfo = NULL;
          $admininfo = NULL;
        @endphp
        <button type="button" onclick="location.href='{{route('agent.profile')}}';" class="flex items-center justify-center text-white bg-gradient-to-br from-green-400 to-blue-600 hover:px-6 hover:py-3.5 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
          Agent: {{ $agentinfo->name }}
          <span class="ml-1"></span>
          <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4H1m3 4H1m3 4H1m3 4H1m6.071.286a3.429 3.429 0 1 1 6.858 0M4 1h12a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Zm9 6.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
          </svg>
        </button>

        @elseif (isset($brokerinfo) && $brokerinfo)
        @php
          $customerinfo = NULL;
          $agentinfo = NULL;
          $admininfo = NULL;
        @endphp
        <button type="button" onclick="location.href='{{route('broker.profile')}}';" class="flex items-center justify-center text-white bg-gradient-to-br from-green-400 to-blue-600 hover:px-6 hover:py-3.5 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
          Broker: {{ $brokerinfo->name }}
          <span class="ml-1"></span>
          <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4H1m3 4H1m3 4H1m3 4H1m6.071.286a3.429 3.429 0 1 1 6.858 0M4 1h12a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Zm9 6.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
          </svg>
        </button>

        @elseif (isset($admininfo) && $admininfo)
        @php
          $brokerinfo = NULL;
          $agentinfo = NULL;
          $customerinfo = NULL;
        @endphp
        <button type="button" onclick="location.href='{{route('admin.profile')}}';" class="flex items-center justify-center text-white bg-gradient-to-br from-green-400 to-blue-600 hover:px-6 hover:py-3.5 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
          Administrator: {{ $admininfo->name }}
          <span class="ml-1"></span>
          <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4H1m3 4H1m3 4H1m3 4H1m6.071.286a3.429 3.429 0 1 1 6.858 0M4 1h12a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Zm9 6.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
          </svg>
        </button>

        @else
        <button type="button" onclick="location.href='{{route('login.loginpage')}}';" class="flex items-center justify-center text-white bg-gradient-to-br from-green-400 to-blue-600 hover:px-6 hover:py-3.5 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
          GET STARTED
        </button>
        @endif
        
    </div>

      <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
        <div class="relative mt-3 md:hidden"></div>
        
        <!--BUTTONS-->
        <!--Home-->
        <button type="button" 
        @if (isset($customerinfo) && $customerinfo)
          onclick="location.href='{{route('customer.dashboard')}}';" 
        @elseif (isset($agentinfo) && $agentinfo)
          onclick="location.href='{{route('agent.dashboard')}}';" 
        @elseif (isset($admininfo) && $admininfo)
          onclick="location.href='{{route('admin.dashboard')}}';"
        @elseif (isset($brokerinfo) && $brokerinfo)
          onclick="location.href='{{route('broker.dashboard')}}';"  
        @else
          onclick="location.href='{{route('home')}}';" 
        @endif
        class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:px-6 hover:py-3.5 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Home</button>
        
        <!--Loan Calculator Button-->
        <button type="button" onclick="location.href='{{ route('calculator') }}';" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:px-6 hover:py-3.5 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Loan Calculator</button>
        <!--Resources Button-->
        <button type="button" onclick="location.href='{{ route('resources') }}';" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:px-6 hover:py-3.5 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Resources</button>

        <!--2ND BUTTON-->
        @if (isset($customerinfo) && $customerinfo)
        {{-- 2ND BUTTON FOR THE CUSTOMERS: --}}
        {{-- <button type="button" onclick="location.href='{{route('login.loginpage')}}';" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:px-6 hover:py-3.5 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Schedules</button> --}}
      
        @elseif (isset($agentinfo) && $agentinfo)
        {{-- 2ND BUTTON FOR THE AGENTS: --}}
        {{-- <button type="button" onclick="location.href='{{route('login.loginpage')}}';" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:px-6 hover:py-3.5 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Customers</button> --}}
      
        @elseif (isset($admininfo) && $admininfo)
        {{-- 2ND BUTTON FOR THE ADMIN: ADMIN VIEW AGENTS HERE --}}
        <button type="button" onclick="location.href='{{route('admin.brokers')}}';" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:px-6 hover:py-3.5 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Brokers</button>

        @else
        {{-- LOGOUT --}}
        <button type="button" onclick="location.href='{{route('logout')}}';" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:px-6 hover:py-3.5 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Schedules</button>

        @endif

        <!--3RD BUTTON-->
        @if (isset($customerinfo) && $customerinfo)
          {{-- 3RD BUTTON FOR THE CUSTOMERS: --}}
          <button type="button" onclick="location.href='{{route('customer.dashboard')}}';" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:px-6 hover:py-3.5 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Properties</button>   
        @elseif (isset($agentinfo) && $agentinfo)
          {{-- 3RD BUTTON FOR THE AGENTS: --}}
          <button type="button" onclick="location.href='{{route('agent.dashboard')}}';"  class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:px-6 hover:py-3.5 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Properties</button>   
        @elseif (isset($admininfo) && $admininfo)
          {{-- 3RD BUTTON FOR THE ADMIN: ADMIN VIEW PROPERTIES HERE --}}
          <button type="button" onclick="location.href='{{route('admin.properties')}}';"  class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:px-6 hover:py-3.5 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Properties</button>   
        @else
          {{-- <button type="button" onclick="location.href='{{route('logout')}}';"  class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:px-6 hover:py-3.5 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Properties</button>    --}}
        @endif

        @auth
        <!--LOGOUT-->
        <button type="button" onclick="location.href='{{ route('logout') }}';" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:px-6 hover:py-3.5 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Logout</button>
        @endauth

        <script>
          @if(session('successproperty'))
              var successMessage = "Property created successfully.";
              alert(successMessage);
          @endif
        </script>

        </div>
    </div>
  </nav>