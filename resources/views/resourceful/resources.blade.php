

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
<body class="bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 ">
    @include('common.header')
    <br>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 ml-2 mr-2">
        
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold mb-2">Properties Guide</h2>
            <a href="https://www.lumina.com.ph/news-and-blogs/blogs/different-property-types-in-the-philippines-know-which-fits-your-budget-and-lifestyle/" target="_blank" class="block text-blue-500 hover:underline mb-2">Different Property Types</a>
            <a href="https://www.nmadesconstruction.com/types-of-houses-in-the-philippines/" target="_blank" class="block text-blue-500 hover:underline mb-2">Houses Guide</a>
            <a href="https://federalland.ph/articles/types-of-houses-in-the-philippines/" target="_blank" class="block text-blue-500 hover:underline mb-2">Housing</a>
            <a href="https://topnotchconstructionph.com/blogs/defining-the-types-of-house-models-in-the-philippines/" target="_blank" class="block text-blue-500 hover:underline mb-2">House and Lot for Sale</a>
            <a href="https://www.bria.com.ph/articles/your-guide-to-the-different-types-of-house-and-lots-in-the-philippines/" target="_blank" class="block text-blue-500 hover:underline">Affordable Houses</a>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold mb-2">News</h2>
            <a href="https://realestatenews.ph/" target="_blank" class="block text-blue-500 hover:underline mb-2">Real-Estate News</a>
            <a href="https://www.philstar.com/business/real-estate" target="_blank" class="block text-blue-500 hover:underline mb-2">Philstar News - Real Estate</a>
            <a href="https://www.cnbc.com/real-estate/" target="_blank" class="block text-blue-500 hover:underline mb-2">CNBC - Real Estate</a>
            <a href="https://www.worldpropertyjournal.com/real-estate-news/philippines/" target="_blank" class="block text-blue-500 hover:underline mb-2">Philippines Real Estates</a>
            <a href="https://www.cushmanwakefield.com/en/philippines/insights/philippine-property-market-news" target="_blank" class="block text-blue-500 hover:underline">Property Market</a>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold mb-2">Market Analysis</h2>
            <a href="https://www.statista.com/outlook/fmo/real-estate/philippines#:~:text=The%20Real%20Estate%20market%20market,tn%20in%20the%20same%20year" target="_blank" class="block text-blue-500 hover:underline mb-2">Statista</a>
            <a href="https://www.statista.com/topics/8509/real-estate-industry-in-the-philippines/" target="_blank" class="block text-blue-500 hover:underline mb-2">Statista Real Estates</a>
            <a href="https://ownpropertyabroad.com/philippines/real-estate-market-in-the-philippines/" target="_blank" class="block text-blue-500 hover:underline mb-2">Philippines Real Estate 2024</a>
            <a href="https://www.globalpropertyguide.com/asia/philippines/price-history" target="_blank" class="block text-blue-500 hover:underline mb-2">Price History</a>
            <a href="https://www.globalpropertiesconsultants.com/articles/investment-analysis-of-philippine-real-estate-market/" target="_blank" class="block text-blue-500 hover:underline">Investment Analysis</a>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold mb-2">Buying Processes</h2>
            <a href="https://ownpropertyabroad.com/philippines/how-to-sell-property-in-the-philippines/" target="_blank" class="block text-blue-500 hover:underline mb-2">How to Sell Property: Philippines</a>
            <a href="https://filipinohomes.com/blog/real-estate-buying-process-developer/" target="_blank" class="block text-blue-500 hover:underline mb-2">Buying Process Developer</a>
            <a href="https://upsideph.com/sellers-guide-a-complete-list-of-documents-you-need-to-sell-property-in-the-philippines/" target="_blank" class="block text-blue-500 hover:underline mb-2">List of Documents</a>
            <a href="https://www.vistalandinternational.com/blog/selling-my-property-profitably-in-the-philippines/" target="_blank" class="block text-blue-500 hover:underline mb-2">How do I sell my Property</a>
            <a href="https://housinginteractive.com.ph/blog/selling-real-properties-in-the-philippines-101/" target="_blank" class="block text-blue-500 hover:underline">Housing Interactive</a>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold mb-2">Guidelines</h2>
            <a href="https://multilaw.com/Multilaw/Multilaw/RealEstate/Real_Estate_Guide_Philippines.aspx" target="_blank" class="block text-blue-500 hover:underline mb-2">Multilaw</a>
            <a href="https://www.mandanibay.com/blog/real-estate-laws-in-the-philippines/" target="_blank" class="block text-blue-500 hover:underline mb-2">Real Estate Laws</a>
            <a href="https://onepropertee.com/homebuyer-guide-philippine-real-estate-laws-regulations-topic" target="_blank" class="block text-blue-500 hover:underline mb-2">Homebuyers Guide</a>
            <a href="https://oxfordbusinessgroup.com/reports/philippines/2016-report/economy/real-estate-transaction-rules-a-look-at-the-key-regulations-for-real-estate-transactions" target="_blank" class="block text-blue-500 hover:underline mb-2">Real Estate Regulations</a>
            <a href="https://richestph.com/real-estate-rules-in-the-philippines-a-detailed-guide-for-buyers-sellers/" target="_blank" class="block text-blue-500 hover:underline">Buying Real Estate Guide</a>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold mb-2">Documents</h2>
            <a href="https://www.bria.com.ph/articles/list-of-documents-youll-need-when-buying-a-property-in-the-philippines/" target="_blank" class="block text-blue-500 hover:underline mb-2">Documents when Buying Property Guide</a>
            <a href="https://ohmyhome.com/en-ph/blog/7-legal-documents-you-need-buy-home-philippines/" target="_blank" class="block text-blue-500 hover:underline mb-2">Investment Process and Payments</a>
            <a href="https://www.crownasia.com.ph/lifestyle-blog/documents-needed-when-buying-a-property-in-the-philippines/" target="_blank" class="block text-blue-500 hover:underline mb-2">Legal Documents</a>
            <a href="https://www.dotproperty.com.ph/blog/documents-need-buying-land-philippines" target="_blank" class="block text-blue-500 hover:underline mb-2">Land Owning: Necessary Documents</a>
            <a href="https://www.phoenixrealty.com.ph/blogs/checklist-buying-real-estate-philippines" target="_blank" class="block text-blue-500 hover:underline">Checklist before buying a Property</a>
        </div>

       
</div>

    @include('common.footer')
</body>
</html>