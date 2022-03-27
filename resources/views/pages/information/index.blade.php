<x-app-layout>
  <div class="bg-main">
    <h1 class="pt-10 text-center text-xl font-semibold text-white work-sans md:text-2xl lg:text-4xl">Information</h1>
    <div class="text-center">
        <a href="{{ route('protocol.index') }}" class="text-gray-200 hover:text-gray-400">
          <span class="underline">Klicka här</span> för att läsa våra medlemsmötes-protokoll
        </a>
    </div>
</div>
<div class="wave-holder-bottom h-40 "></div>
  <div class="container mx-auto mt-5">
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

    

    @if (isset($currentInformation) && $currentInformation)
      <div class="pt-4 pb-6">
        <h2 class="text-center text-2xl font-semibold text-main work-sans">Aktuell Information</h2>
        <x-carousel :activeInformation="$activeInformationId" :informations="$currentInformation" />
      </div>
    @endif

    @if (auth()->user())
      <div class="text-center">
        <a href="{{ route('current-information.index') }}" class="btn-primary text-lg px-5 py-3 rounded-lg shadow-2xl">Hantera aktuell information</a>
      </div>
    @endif

   
    
    <div class="mt-10 pt-8 pb-10">
      <div class="pb-10 flex flex-col lg:justify-between lg:items-start lg:flex-row">
        <div class="px-10 flex flex-col justify-center mb-5 xl:px-20">
          <section> 
          <h2 id="information" class="text-center text-2xl font-semibold text-main work-sans pb-2">Informationsblad</h2>
            @if (auth()->user())
              <div class="text-center py-2">
                Klicka på
                <span class="text-main">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" stroke="transparent" fill="currentColor" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"/></svg>
                </span>
                ikonen för att ändra informations-titel. <br/> För att radera viss information klickar du på 
                <span class="text-red-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" stroke="transparent" fill="currentColor" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M14.12 10.47L12 12.59l-2.13-2.12-1.41 1.41L10.59 14l-2.12 2.12 1.41 1.41L12 15.41l2.12 2.12 1.41-1.41L13.41 14l2.12-2.12zM15.5 4l-1-1h-5l-1 1H5v2h14V4zM6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9z"/></svg>
                </span>
                ikonen.
              </div>
              <div class="flex justify-center pb-4">
                <a href="{{ route('information.add') }}" class="text-center rounded bg-green-500 text-white px-5 py-2 shadow hover:bg-green-600 focus:bg-green-600">Lägg till information</a>  
              </div> 
            @endif

            <table class="w-full bg-gray-50 divide-y divide-gray-400 rounded shadow">
              <thead>
                <tr>
                  <td class="px-6 py-3">Information</td>
                  <td class="px-6 py-3">Länk</td>
                  @if (auth()->user())
                    <td class="px-6 py-3"></td>
                  @endif
                </tr>
              </thead>
              <tbody class="bg-gray-50 divide-y divide-gray-200">
                @foreach ($informationSheets as $infoSheet)
                <tr>
                  <td class="px-6 py-3">
                    <p>{{ $infoSheet->title }}</p>
                  </td>
                  <td class="px-6 py-3">
                    <a href="{{ $infoSheet->filePath }}" class="underline text-main" target="_blank" rel="noopener noreferrer">Öppna som pdf</a>
                  </td>
                  @if (auth()->user())
                  <td class="px-6 py-3">
                    <div class="flex flex-row">
                      <div class="group">
                        <span>
                          <a href="{{ route('information.edit', ['informationId' => $infoSheet->id]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" stroke="transparent" fill="currentColor" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"/></svg>
                          </a>
                        </span>
                        <p class="absolute text-center z-50 hidden group-hover:block text-sm tracking-wider bg-black bg-opacity-80 text-white px-2 py-1 rounded">Ändra</p>
                      </div>
                      |
                      <div class="group">
                        <span>
                          <a href="{{ route('information.delete.confirm', ['informationId' => $infoSheet->id]) }}" class="text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" stroke="transparent" fill="currentColor" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M14.12 10.47L12 12.59l-2.13-2.12-1.41 1.41L10.59 14l-2.12 2.12 1.41 1.41L12 15.41l2.12 2.12 1.41-1.41L13.41 14l2.12-2.12zM15.5 4l-1-1h-5l-1 1H5v2h14V4zM6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9z"/></svg>
                          </a>
                        </span>
                        <p class="absolute text-center z-50 hidden group-hover:block text-sm tracking-wider bg-black bg-opacity-80 text-white px-2 py-1 rounded">Radera</p>
                      </div>
                    </div>
                  </td>
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
            <span>
              {{ $informationSheets->fragment('information')->links() }}
            </span>
          </section>
        </div>
      
        <div class="px-10 my-10 flex flex-col justify-center sm:mb-5 xl:px-20 lg:my-0">
          <div class="pb-2">
            <h2 class="text-center text-2xl font-semibold text-main work-sans">Sjökort över älven</h2>
            <p class="text-center text-black">Klicka på bilden för att förstora den</p>
          </div>
          <div class="flex justify-center">
          <a href="#sjokort">
            <img src="/web_images/sjokort-alv-small.jpg" alt="Sjökort över älven" >
          </a>
        </div>
        </div>
      </div>

      <div class="flex justify-center my-10">
        <div class="text-center">
            <h1 class="md:text-xl text-lg text-gray-900 font-bold pb-2">Är du medlem?</h1>
            <a href="#" class="btn-primary text-md px-5 py-3 rounded-lg shadow-2xl">Fyll i dina båtuppgifter här</a>
        </div>
      </div>

      <hr class="my-20 border-t-2 border-main" />

      <section>
        <div class="flex flex-col justify-center" id="contact">
          <div class="pb-2">
              <h1 class="pl-5 text-2xl font-semibold text-main work-sans lg:text-center lg:pl-0">Kontakta oss</h1>
          </div>

          <div class="flex flex-col justify-between lg:flex-row px-10 pt-5">
            <div class="py-5 lg:pt-0">
              <h3 class="md:text-xl text-lg text-gray-900 font-bold lg:text-center">Kontaktuppgifter</h3>
              <div>
                <div>
                  <div class="py-2 border-b border-gray-200 text-md tracking-wider">
                    <span class="">
                      <svg xmlns="http://www.w3.org/2000/svg" class="inline" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M6.54 5c.06.89.21 1.76.45 2.59l-1.2 1.2c-.41-1.2-.67-2.47-.76-3.79h1.51m9.86 12.02c.85.24 1.72.39 2.6.45v1.49c-1.32-.09-2.59-.35-3.8-.75l1.2-1.19M7.5 3H4c-.55 0-1 .45-1 1 0 9.39 7.61 17 17 17 .55 0 1-.45 1-1v-3.49c0-.55-.45-1-1-1-1.24 0-2.45-.2-3.57-.57-.1-.04-.21-.05-.31-.05-.26 0-.51.1-.71.29l-2.2 2.2c-2.83-1.45-5.15-3.76-6.59-6.59l2.2-2.2c.28-.28.36-.67.25-1.02C8.7 6.45 8.5 5.25 8.5 4c0-.55-.45-1-1-1z"/></svg>
                    </span>
                    <p class="inline font-bold">Telefon: <span class="tracking-normal font-normal">0524 12333</span></p>
                  </div>
                  <div class="py-2 border-b border-gray-200 text-md tracking-wider">
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" class="inline" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M6.54 5c.06.89.21 1.76.45 2.59l-1.2 1.2c-.41-1.2-.67-2.47-.76-3.79h1.51m9.86 12.02c.85.24 1.72.39 2.6.45v1.49c-1.32-.09-2.59-.35-3.8-.75l1.2-1.19M7.5 3H4c-.55 0-1 .45-1 1 0 9.39 7.61 17 17 17 .55 0 1-.45 1-1v-3.49c0-.55-.45-1-1-1-1.24 0-2.45-.2-3.57-.57-.1-.04-.21-.05-.31-.05-.26 0-.51.1-.71.29l-2.2 2.2c-2.83-1.45-5.15-3.76-6.59-6.59l2.2-2.2c.28-.28.36-.67.25-1.02C8.7 6.45 8.5 5.25 8.5 4c0-.55-.45-1-1-1z"/></svg>
                    </span>
                    <p class="inline font-bold">Mobil: <span class="tracking-normal font-normal">070 6226674</span></p>
                  </div>
                  <div class="py-2 border-b border-gray-200 text-md tracking-wider">
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" class="inline" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5-8-5h16zm0 12H4V8l8 5 8-5v10z"/>
                      </svg>
                    </span>
                    <p class="inline font-bold">
                      E-post: 
                      <a href="mailto:munkedals.batklubb@telia.com" class="hover:underline tracking-normal font-normal">munkedals.batklubb@telia.com</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="py-5 lg:pt-0">
              <h3 class="md:text-xl text-lg text-gray-900 font-bold lg:text-center">Hitta hit</h3>
              <div class="py-2 border-b border-gray-200 text-md tracking-wider">
                <span class="">
                  <svg xmlns="http://www.w3.org/2000/svg" class="inline" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 12c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm6-1.8C18 6.57 15.35 4 12 4s-6 2.57-6 6.2c0 2.34 1.95 5.44 6 9.14 4.05-3.7 6-6.8 6-9.14zM12 2c4.2 0 8 3.22 8 8.2 0 3.32-2.67 7.25-8 11.8-5.33-4.55-8-8.48-8-11.8C4 5.22 7.8 2 12 2z"/></svg>
                </span>
                <p class="inline font-bold">Adress: <span class="tracking-normal font-normal">Ellingeröd 22, 455 92 Munkedal</span></p>
                <p class="pt-2 text-black text-sm lg:text-center ">Säkrast att nå kontoret mellan 8.00-9.00 mån-fre.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      

      
    </div>
  </div>

  <x-modal hashName="sjokort">
    <div class="bg-white p-px">
      <img src="/web_images/sjokort-alv.jpg" alt="Sjökort över älven" class="rounded">
    </div>            
  </x-modal>


</x-app-layout>