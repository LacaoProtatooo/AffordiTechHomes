<!--FOOTER-->
<footer class="bg-green-900 rounded-lg shadow dark:bg-gray-900 m-4">

    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a 
            @if (isset($customerinfo) && $customerinfo)
                href="{{route('customer.dashboard')}}" 
            @elseif (isset($agentinfo) && $agentinfo)
                href="{{route('agent.dashboard')}}" 
            @elseif (isset($admininfo) && $admininfo)
                href="{{route('admin.dashboard')}}" 
            @else
                href="{{route('home')}}" 
            @endif
            
            class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <img src="../../../storage/Logo_BG_Removed.png" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-yellow-100">AffordiTech Homes</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-yellow-100 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="{{route('welcome')}}" class="hover:underline me-4 md:me-6">About</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                </li>
                <li>
            </ul>
        </div>
        <hr class="my-6 border-yellow-100 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-yellow-100 sm:text-center dark:text-gray-400">© 2024 <a 
            @if (isset($customerinfo) && $customerinfo)
                href="{{route('customer.dashboard')}}" 
            @elseif (isset($agentinfo) && $agentinfo)
                href="{{route('agent.dashboard')}}" 
            @elseif (isset($admininfo) && $admininfo)
                href="{{route('admin.dashboard')}}" 
            @else
                href="{{route('home')}}" 
            @endif
            class="hover:underline">AffordiTech Homes™</a>. All Rights Reserved. Material may not be published or reproduced in any form without prior written permission.</span>
    </div>
</footer>