<x-app-layout>
  <div class="bg-main">
    {{-- <hr class="border-t-1 border-white w-4/5 mx-auto" /> --}}
    <h1 class="pt-10 text-center text-xl font-semibold text-white work-sans md:text-2xl lg:text-4xl">
        Bildarkivet
    </h1>
  </div>
  <div class="wave-holder-bottom h-40"></div> 
  <div class="container mx-auto mt-5 px-10">

    @if ($message = Session::get('status'))
      <div x-data="{ show: true }" class="">
        <div x-show="show" class="mt-5 w-1/2 rounded mx-auto flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3 relative" role="alert">
          <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
          <p>{{ $message }}</p>
          <button @click="show = false">  
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
              <svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Stäng</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
          </button>
        </div>
      </div>
    @endif

  <div>
    @if (auth()->user())
      <div>
        <a href="{{ route('album.add') }}">Lägg till album</a>
      </div>
    @endif


    @if (count($years) > 0)
      @foreach ($years as $year)
        <div>
          <a href="{{ route('album-year.details', ['albumYear' => $year->year]) }}">{{$year->year}}</a>
        </div>
      @endforeach

    @else 

      <p class="text-center text-lg font-bold my-20">Ingen bilder har är ännu lagts till.</p>
    
    @endif
  </div>
</x-app-layout>