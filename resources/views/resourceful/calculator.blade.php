<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Tailwind Utility & Flowbite-->
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>AffordiTech Loan Calculator</title>
</head>
<body class="bg-green-200 ">
    @include('common.header')

    <div class="container mx-auto mt-10 px-4">
        <h2 class="text-2xl font-semibold text-center mb-6">Home Loan Details</h2>
        <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
            <div class="mb-4">
                <label for="purchase_price" class="block text-sm font-semibold mb-2">Purchase Price</label>
                <input type="number" id="purchase_price" class="w-full py-2 px-3 border border-gray-300 rounded-md"
                    placeholder="₱">
            </div>
            <div class="mb-4">
                <label for="down_payment" class="block text-sm font-semibold mb-2">Down Payment</label>
                <input type="number" id="down_payment" class="w-full py-2 px-3 border border-gray-300 rounded-md"
                    placeholder="₱">
            </div>
            <div class="mb-4">
                <label for="loan_term" class="block text-sm font-semibold mb-2">Loan Term (Years)</label>
                <select id="loan_term"
                    class="w-full py-2 px-3 border border-gray-300 rounded-md">
                    @for ($i = 1; $i <= 20; $i++) <option value="{{ $i }}">{{ $i }} Year(s)</option>
                        @endfor
                </select>
            </div>
            <div class="mb-4">
                <label for="interest_rate" class="block text-sm font-semibold mb-2">Interest Rate (%)</label>
                <input type="text" id="interest_rate" class="w-full py-2 px-3 border border-gray-300 rounded-md"
                    placeholder="%" >
            </div>
            <div class="text-center">
                <button onclick="calculateLoan()"
                    class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Calculate</button>
            </div>
            <div class="mt-6">
                <p class="text-lg font-semibold">Loan Details:</p>
                <p>Purchase price: ₱ <span id="output_purchase_price"></span></p>
                <p>Down payment: ₱ <span id="output_down_payment"></span></p>
                <p>Loan amount: ₱ <span id="output_loan_amount"></span></p>
                <p>Loan Term: <span id="output_loan_term"></span> Year(s) / <span id="output_loan_term_months"></span>
                    months</p>
                <p>Interest rate (fixed for 1 year): <span id="output_interest_rate"></span>%</p>
                <p>Monthly payment: ₱ <span id="monthly_payment"></span></p>
            </div>
        </div>
    </div>

    <script>
        function calculateLoan() {
            // Get input values
            var purchasePrice = parseFloat(document.getElementById('purchase_price').value);
            var downPayment = parseFloat(document.getElementById('down_payment').value);
            var loanTerm = parseInt(document.getElementById('loan_term').value);
            var interestRate = parseFloat(document.getElementById('interest_rate').value);

            // Calculate loan amount
            var loanAmount = purchasePrice - downPayment;

            // Calculate monthly payment
            var monthlyRate = (interestRate / 100) / 12;
            var termInMonths = loanTerm * 12;
            var monthlyPayment = (loanAmount * monthlyRate) / (1 - Math.pow(1 + monthlyRate, -termInMonths));

            // Display result
            document.getElementById('monthly_payment').textContent = monthlyPayment.toFixed(2);
            document.getElementById('output_purchase_price').textContent = purchasePrice.toFixed(2);
            document.getElementById('output_down_payment').textContent = downPayment.toFixed(2);
            document.getElementById('output_loan_amount').textContent = loanAmount.toFixed(2);
            document.getElementById('output_loan_term').textContent = loanTerm;
            document.getElementById('output_loan_term_months').textContent = termInMonths;
            document.getElementById('output_interest_rate').textContent = interestRate;
        }
    </script>

    @include('common.footer')
</body>
</html>