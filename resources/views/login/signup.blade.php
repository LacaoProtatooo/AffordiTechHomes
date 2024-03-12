<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

    <title>Sign Up</title>
</head>
<body class="bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200">
<div>
    @php
        $url = Request::url();
        $path_segments = explode("/", parse_url($url, PHP_URL_PATH));
        $end_segment = end($path_segments);

        //dd($end_segment);
    @endphp
    @include('message') 
    <br><br>
    <div class="flex flex-col mb-6 items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="http://127.0.0.1:8000/" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white ">
            <img class="w-32 h-32 mr-2 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-1 py-1 text-center me-2 mb-0" src="{{asset('storage/Logo_BG_Removed.png')}}" alt="logo">
            AfforfiTech Homes    
        </a>

        <form action="{{ route('signup.submit', ['role' => request()->segment(2)]) }}" method="POST" class="max-w-md mx-auto bg-white rounded-lg p-6" onsubmit="return validatePasswords()">
            @csrf
            <!--Email-->
            <div class="relative z-0 w-full mb-5 group">
                <input type="email" name="email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
            </div>
            <!--Password-->
            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
            </div>
            <!--Confirm Password-->
            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="repeat_password" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm password</label>
            </div>
            <!--Name-->
            <div class="grid md:grid-cols-2 md:gap-5">
                <!--First Name-->
              <div class="relative z-0 w-full mb-5 group">
                  <input type="text" name="name" id="floating_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                  <label for="floating_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
              </div>
              <div class="relative z-0 w-full mb-5 group">
                    <!--SEX-->
                    <label class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Sex</label>
                    <br>
                    <select id="sex" name="sex" class=" border-black-300 text-gray-900 mb-0 text-sm rounded-lg  block w-40 p-1">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    </div>
            </div>
            <!--Date-->
            <div class="relative z-0 w-full mb-5 group">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                  </svg>
                </div>
                <input datepicker type="text" name="birthdate" id="birthdate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
            </div>
            
            <!-- Phone Number -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="number" name="phone_number" id="floating_phone_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_phone_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone Number</label>
            </div>
            <!-- Address -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="address" id="floating_address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_address" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Address</label>
            </div>

            @if ($end_segment == 'broker')
                @php
                    $properties = $properties = \App\Models\Property::all();
                @endphp

                <select id="property" name="property" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg mb-3 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected disabled>Property Assigned</option>
                @foreach ($properties as $property)
                    <option value="{{ $property->id }}">{{ $property->description }}</option>
                @endforeach
                </select>
            @endif

            <!--Submit-->
            <button type="submit" id="submitBtn" onclick="validatePasswords()" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center hover:px-6 hover:py-3.5 dark:bg-blue-600 dark:hover:bg-blue-700">Submit</button>
          </form>
    </div>
    <br><br>
</div>
@include('common.footer')
    
{{-- JS --}}
<script>
    function validatePasswords() {
        var password = document.getElementById("floating_password").value;
        var confirmPassword = document.getElementById("floating_repeat_password").value;
        var submitBtn = document.getElementById("submitBtn");

        if (password !== confirmPassword) {
            alert("Passwords do not match");
            submitBtn.disabled = true;
            return false; // Prevent form submission
        } else {
            submitBtn.disabled = false;
            return true; // Allow form submission
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        const passwordField = document.getElementById("floating_password");
        const confirmPasswordField = document.getElementById("floating_repeat_password");
        const confirmPasswordLabel = document.querySelector('label[for="floating_repeat_password"]');

        function validatePassword() {
            if (passwordField.value !== confirmPasswordField.value) {
                confirmPasswordLabel.textContent = "Passwords do not match";
                confirmPasswordLabel.classList.add("text-red-500"); // Add red color for error
            } else {
                confirmPasswordLabel.textContent = "Confirm password";
                confirmPasswordLabel.classList.remove("text-red-500"); // Remove red color for error
            }
        }

        // Listen for input changes in both password fields
        passwordField.addEventListener("input", validatePassword);
        confirmPasswordField.addEventListener("input", validatePassword);
    });

    function validatePasswords() {
        var password = document.getElementById("floating_password").value;
        var confirmPassword = document.getElementById("floating_repeat_password").value;

        if (password !== confirmPassword) {
            alert("Passwords do not match");
            return false; // Prevent form submission
        }

        // If passwords match, allow form submission
        return true;
    }
</script>

</body>
</html>