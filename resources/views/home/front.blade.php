<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!--Tailwind Utility & Flowbite-->
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>AffordiTech</title>
</head>

<body class="bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 ">
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
        @else
          onclick="location.href='{{route('home')}}';" 
        @endif
        class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:px-6 hover:py-3.5 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Home</button>
        
        <!--Loan Calculator Button-->
        <button type="button" onclick="location.href='{{ route('calculator') }}';" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:px-6 hover:py-3.5 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Loan Calculator</button>
        
        <!--Resources Button-->
        <button type="button" onclick="location.href='{{ route('resources') }}';" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:px-6 hover:py-3.5 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Resources</button>
 
        </div>
    </div>
  </nav>



  <!-- Start block -->
  <section class="bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200  dark:bg-gray-900">
 
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">AffordiTech<br>Homes</h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">A New Horizon in Real Estate Information System. <br> An innovative way in which it can manage real estate properties, reach the right decisions and interact with stakeholders and developers in our community.<br> </p>
            <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
              <button onclick="location.href='{{route('home')}}';"  class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                Browse Properties
                </span>
              </button>
              <button onclick="location.href='{{route('login.loginpage')}}';" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-200 via-red-300 to-yellow-200 group-hover:from-red-200 group-hover:via-red-300 group-hover:to-yellow-200 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                Get Started
                </span>
              </button>
            </div>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <img src="../../../storage/cityscape.jpg" alt="Cityscape" class="rounded-lg">
        </div>                
    </div>
</section>
<!-- End block -->

<!-- Start block -->
<section class="bg-green-500 dark:bg-gray-800">
    <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6">
        <!-- Row -->
        <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
            <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-yellow-100 dark:text-white">Browse Into Available Properties with Ease</h2>
                <p class="mb-8 font-light text-yellow-100 lg:text-xl">This will help to find clients faster and help users with more affordable houses and land, so that they can make early and correct decisions. It will also be easier to communicate or transact with people who are looking for or need other information on the house and unit, it is better to use this system that we call AffodiTech Homes of realty. </p>
                <!-- List -->
                <ul role="list" class="pt-8 space-y-5 border-t border-gray-200 my-7 dark:border-gray-700">
                    <li class="flex space-x-3">
                        <!-- Icon -->
                        <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="text-base font-medium leading-tight text-yellow-200 dark:text-white">Continuous integration and deployment</span>
                    </li>
                    <li class="flex space-x-3">
                        <!-- Icon -->
                        <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="text-base font-medium leading-tight text-yellow-200 dark:text-white">Development workflow</span>
                    </li>
                    <li class="flex space-x-3">
                        <!-- Icon -->
                        <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="text-base font-medium leading-tight text-yellow-200 dark:text-white">Knowledge management</span>
                    </li>
                </ul>
           </div>
            <img class="hidden w-full mb-4 rounded-lg lg:mb-0 lg:flex" src="../../../storage/properties.jpg" alt="dashboard feature image">
        </div>
<!-- Start block -->
<section class="rounded-lg bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200  dark:bg-gray-800">
    <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-24 lg:px-6">
        <figure class="max-w-screen-md mx-auto">
            <svg class="h-12 mx-auto mb-3 text-gray-400 dark:text-gray-600" viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z" fill="currentColor"/>
            </svg> 
            <blockquote>
                <p class="text-xl font-medium text-gray-900 md:text-2xl dark:text-white">"AffordiTech Homes will be of great benefit, not only to real-estate but also to all of us users because it will expand the scope that will use it, and again more professionals will be attracted to use it because it is easier and rapid adoption of modern technology. "</p>
            </blockquote>
            <figcaption class="flex items-center justify-center mt-6 space-x-3">
                <img class="w-6 h-6 rounded-full" src="../../../storage/Logo_BG_Removed.png" alt="afforditech logo">
                <div class="flex items-center divide-x-2 divide-gray-500 dark:divide-gray-700">
                    <div class="pr-3 font-medium text-gray-900 dark:text-white">AffordiTech Homes</div>
                    <div class="pl-3 text-sm font-light text-gray-500 dark:text-gray-400">Dev Team</div>
                </div>
            </figcaption>
        </figure>
    </div>
  </section>
</section>
<!-- End block -->

@include('common.footer')
</body>
</html>