<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Tailwind Utility & Flowbite-->
    @vite(['resources/css/app.css','resources/js/app.js'])

    <title>Login</title>
</head>
<body class="bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
    @include('message')   
    <br><br>
    <section class="bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="{{route('home')}}" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white hover:text-white ">
                <img class="w-32 h-32 mr-2 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-1 py-1 text-center me-2 mb-0" src="{{ asset('storage/Logo_BG_Removed.png')}} " alt="logo">
                AfforfiTech Homes    
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>
                    <form action="{{ route('login.submit') }}" method="POST" class="space-y-4 md:space-y-6" action="#">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Username / Email</label>
                            <!--EMAIL / USERNAME INPUT HERE-->
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <!--PASSWORD INPUT HERE-->
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div class="flex items-center justify-between">

                        </div>
                        <button type="submit" class="w-full text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:px-6 hover:py-3.5 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Don’t have an account yet? 
                            <br>
                            <!--SIGN UP-->
                            <a href="{{ route('signup.show', ['role' => 'customer']) }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up as a Customer</a>
                            <br>
                            <a href="{{ route('signup.show', ['role' => 'agent']) }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up as a Agent</a>
                            <br>
                            <a href="{{ route('signup.show', ['role' => 'admin']) }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up as a Admin</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>

      </section>
      <br>
      <br>

      <script>
        @if(session('successregister'))
            var successMessage = "Registered Successfully. Please Login";
            alert(successMessage); // Displaying the success message using JavaScript alert
        @endif
      </script>

</body>
</html>