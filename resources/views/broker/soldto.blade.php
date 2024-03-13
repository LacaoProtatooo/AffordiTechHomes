<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Tailwind Utility & Flowbite-->
    @vite(['resources/css/app.css','resources/js/app.js'])

    <title>AffordiTech</title>
</head>
<body class="bg-green-200 ">
    @include('message') 
@include('common.header')
<div class="max-w-3xl mx-auto mt-8 mb-8 p-8 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold mb-4">Property Details</h2>
    <div class="grid grid-cols-2 gap-4">
        <div>
            <p><span class="font-semibold">Property ID:</span> {{$property->id}}</p>
            <p><span class="font-semibold">Property Description:</span> {{$property->description}}</p>
            <p><span class="font-semibold">Address:</span> {{$property->address}}</p>
        </div>
        <div>
            <p><span class="font-semibold">Customer Name:</span> {{$customer->name}}</p>
            <p><span class="font-semibold">Customer Phone Number:</span> {{$customer->phone_number}}</p>
        </div>
        <div>
            <p><span class="font-semibold">Agent Name: {{$agent->name}}</span></p>
            <p><span class="font-semibold">Agent Phone Number: {{$agent->phone_number}}</span></p>
        </div>
        <div>
            <p><span class="font-semibold">Broker Name:</span> {{$broker->phone_number}}</p>
            <p><span class="font-semibold">Broker Phone Number:</span> {{$broker->phone_number}}</p>
        </div>
    </div>
    <div class="mt-8">
        <h2 class="text-2xl font-semibold mb-4">Payment Details</h2>
        <form action="{{ route('broker.sold', ['property_id' => $property->id, 'customer_id' => $customer->id, 'agent_id' => $agent->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="flex items-center mb-4">
                <label for="payment_method" class="mr-2 font-semibold">Payment Method:</label>
                <select id="payment_method" name="payment_method" class="py-2 px-4 border border-gray-300 rounded">
                    <option value="cash">Cash</option>
                    <option value="bank">Bank Transfer</option>
                    <option value="check">Check</option>
                </select>
            </div><br>
            <div class="mb-4">
                                
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input"><b>Proof of Payment:</b></label>
                <input id="proof_of_payment" name="proof_of_payment" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file">

            </div><br>
            <button type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Submit
                </span>
            </button>
        </form>
    </div>
</div>

@include('common.footer')
</body>
</html>
