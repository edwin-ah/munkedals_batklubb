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

    @if (count($albums) > 0) 
      @foreach ($albums as $album)
        <div class="border border-gray-200 rounded-lg my-10 p-5">
          @if (auth()->user())
            <div class="relative">
              <div class="absolute right-0 top-0 flex flex-row">
                <div class="group">
                  <a href="{{ route('album-image.add', ['albumId' => $album->id]) }}">
                    <span class="text-green-500 hover:text-green-700">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" stroke="transparent" fill="currentColor" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 11h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"/></svg>
                    </span>
                    <p class="absolute text-center hidden group-hover:block text-sm tracking-wider bg-black bg-opacity-80 text-white px-2 py-1 rounded">Lägg till bild</p>
                  </a>
                </div>

                <div class="group px-5">
                  <a href="{{ route('album-image.delete', ['albumId' => $album->id]) }}">
                    <span class="text-main hover:text-black">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" stroke="transparent" fill="currentColor" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 11H7v-2h10v2z"/></svg>                    </span>
                    <p class="absolute text-center hidden group-hover:block text-sm tracking-wider bg-black bg-opacity-80 text-white px-2 py-1 rounded">Ta bort bilder</p>
                  </a>
                </div>

                <div class="group px-5">
                  <a href="{{ route('album.edit', ['albumId' => $album->id]) }}">
                    <span class="text-main hover:text-black">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" stroke="transparent" fill="currentColor" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"/></svg>
                    </span>
                    <p class="absolute text-center hidden group-hover:block text-sm tracking-wider bg-black bg-opacity-80 text-white px-2 py-1 rounded">Redigera</p>
                  </a>
                </div>

                <div class="group">
                  <a href="{{ route('album.delete.confirm', ['albumId' => $album->id]) }}">
                    <span class="text-red-500 hover:text-red-700">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" stroke="transparent" fill="currentColor" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M14.12 10.47L12 12.59l-2.13-2.12-1.41 1.41L10.59 14l-2.12 2.12 1.41 1.41L12 15.41l2.12 2.12 1.41-1.41L13.41 14l2.12-2.12zM15.5 4l-1-1h-5l-1 1H5v2h14V4zM6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9z"/></svg>
                    </span>
                    <p class="absolute text-center hidden group-hover:block text-sm tracking-wider bg-black bg-opacity-80 text-white px-2 py-1 rounded">Radera album</p>
                  </a>
                </div>
              </div>
            </div>
          @endif
          <h3 class="text-center text-main text-lg font-bold tracking-wider border-b-2 border-gray-200">{{$album->title}}</h3>
         
          <p>{{ $album->description }}</p>
        
          {{-- Image modal --}}
          <div x-data="{ imgModal : false, imgModalSrc : '', imgModalDesc : '' }">
            <template @img-modal.window="imgModal = true; imgModalSrc = $event.detail.imgModalSrc; imgModalDesc = $event.detail.imgModalDesc;" x-if="imgModal">
              <div x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" x-on:click.away="imgModalSrc = ''" class="p-2 fixed w-full h-full inset-0 z-50 overflow-hidden flex justify-center items-center bg-black bg-opacity-80">
                <div @click.away="imgModal = false" class="flex flex-col w-auto mx-auto bg-white overflow-auto rounded">
                  <div class="z-50">
                    <button @click="imgModal = false" class="float-right pt-2 pr-2 outline-none focus:outline-none">
                      <p class="px-2">
                        Stäng
                        <svg class="fill-current inline" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                          </path>
                        </svg>
                      </p>
                    </button>
                  </div>
                  <div class="p-2">
                    <img :alt="imgModalSrc" class="object-contain h-full mx-auto" :src="imgModalSrc">
                    <p x-text="imgModalDesc" class="text-center"></p>
                  </div>
                </div>
              </div>
            </template>
          </div>
          {{-- Image modal end --}}
          
          <div x-data="{}" class="mt-2 grid grid-cols-2 gap-2 mx-auto md:grid-cols-3 lg:grid-cols-4 ">
            @foreach ($album->albumImage as $image)
              <div class="relative overflow-hidden max-h-48 w-auto border-2 border-gray-200 rounded cursor-pointer">
                <a @click="$dispatch('img-modal', {  imgModalSrc: '{!! url('storage/uploads/images/album_images/'.$image->imageName) !!}', imgModalDesc: '{{ $image->description }}' })" class="cursor-pointer">
                  <img class="w-full h-full object-scale-down transition-all duration-500 ease-in-out transform bg-center bg-cover hover:scale-125" src="{{ url('storage/uploads/images/album_images/'.$image->imageName) }}" alt="">
                </a>
              </div>
            @endforeach
          </div>
          
        </div>
      @endforeach
    @endif
  </div>
</x-app-layout>