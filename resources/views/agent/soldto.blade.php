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

<div class="max-w-3xl mx-auto mt-8 p-8 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold mb-4">Property Details</h2>
    <div class="grid grid-cols-2 gap-4">
        <div>
            <p><span class="font-semibold">Property ID:</span> {{ $property->id }}</p>
            <p><span class="font-semibold">Address:</span> {{ $property->address }}</p>
        </div>
        <div>
            <p><span class="font-semibold">Customer Name:</span> {{ $customer->name }}</p>
            <p><span class="font-semibold">Customer Phone Number:</span> {{ $customer->phone_number }}</p>
        </div>
    </div>
    <div class="mt-8">
        <h2 class="text-2xl font-semibold mb-4">Payment Details</h2>
        <form action="{{ route('agent.sold', ['property_id' => $property->id, 'customer_id' => $customer->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex items-center mb-4">
                <label for="payment_method" class="mr-2 font-semibold">Payment Method:</label>
                <select id="payment_method" name="payment_method" class="py-2 px-4 border border-gray-300 rounded">
                    <option value="cash">Cash</option>
                    <option value="bank">Bank</option>
                    <option value="gcash">GCash</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="proof_of_payment" class="font-semibold">Proof of Payment:</label>
                <input type="file" id="proof_of_payment" name="proof_of_payment" class="border border-gray-300 rounded px-4 py-2 block w-full mt-2">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
        </form>
    </div>
</div>

@include('common.footer')
</body>
</html>
