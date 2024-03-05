@if ($properties->isNotEmpty())
@if ($properties)
  @foreach ($properties as $property)

    @php
      $imagePaths = explode(',', $property->image_path);
      
      //dd($properties);
    @endphp

    <!--CARDS -->
    <a href="{{ route('property.info', ['id' => $property->id]) }}" class="flex flex-col items-center mr-4 mb-4 ml-4 h-50 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl dark:border-gray-700 dark:bg-gray-800 hover:bg-gradient-to-br from-teal-200 via-yellow-100 to-lime-300 hover:red-200 hover:red-300 hover:yellow-200 dark:text-white dark:hover:text-gray-900 ">
      @foreach($imagePaths as $index => $imagePath)
        <img class="propertyImage{{ $property->id }}-{{ $index }} object-cover w-full rounded-t-lg h-96 md:h-48 md:w-48 md:rounded-none md:rounded-s-lg {{ $index > 0 ? 'hidden' : '' }}" src="{{ asset(trim($imagePath)) }}" alt="Property">
      @endforeach

      <script>
        const imagePaths{{ $property->id }} = {!! json_encode($imagePaths) !!};
        let currentIndex{{ $property->id }} = 0;

        function transitionImages{{ $property->id }}() {
            const currentImages = document.querySelectorAll('.propertyImage{{ $property->id }}-' + currentIndex{{ $property->id }});
            currentImages.forEach(image => image.classList.add('hidden'));
            currentIndex{{ $property->id }} = (currentIndex{{ $property->id }} + 1) % imagePaths{{ $property->id }}.length;
            const nextImages = document.querySelectorAll('.propertyImage{{ $property->id }}-' + currentIndex{{ $property->id }});
            nextImages.forEach(image => image.classList.remove('hidden'));
            setTimeout(transitionImages{{ $property->id }}, 3000);
        }

        transitionImages{{ $property->id }}();
      </script>

       <div class="flex flex-col justify-between p-4 leading-normal w-72 max-w-lg">
          <!--TITLE-->
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $property->description }}</h5>
          <!--DESCRIPTION-->
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            {{-- Property Type: <b>{{ $property->id }}</b><br> --}}
            Property Type: <b>{{ $property->property_type }}<br></b>
            Address: {{ $property->address }}<br>
            Status: <b>{{ $property->status }}</b>
          </p>
      </div>
    </a>
  @endforeach
@endif

@else
    <div class="flex items-center justify-center h-40">
        <p class="text-gray-600">No houses found.</p>
    </div>
@endif
