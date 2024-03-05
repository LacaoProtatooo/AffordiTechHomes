

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Tailwind Utility & Flowbite-->
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>AffordiTech</title>
</head>
<body class="bg-green-200 ">
    @include('common.header')
    <br>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 ml-2 mr-2">
        
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold mb-2">Container 1 Title</h2>
            <a href="" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 1</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 2</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 3</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 4</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline">Link 5</a>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold mb-2">Container 1 Title</h2>
            <a href="" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 1</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 2</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 3</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 4</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline">Link 5</a>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold mb-2">Container 1 Title</h2>
            <a href="" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 1</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 2</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 3</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 4</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline">Link 5</a>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold mb-2">Container 1 Title</h2>
            <a href="" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 1</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 2</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 3</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 4</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline">Link 5</a>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold mb-2">Container 1 Title</h2>
            <a href="" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 1</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 2</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 3</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 4</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline">Link 5</a>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold mb-2">Container 1 Title</h2>
            <a href="" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 1</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 2</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 3</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline mb-2">Link 4</a>
            <a href="#" target="_blank" class="block text-blue-500 hover:underline">Link 5</a>
        </div>

       
</div>

    @include('common.footer')
</body>
</html>