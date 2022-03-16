<x-app-layout>
    <div class="bg-main">
      {{-- <hr class="border-t-1 border-white w-4/5 mx-auto" /> --}}
      <h1 class="pt-10 text-center text-xl font-semibold text-white work-sans md:text-2xl lg:text-4xl">
          Om oss
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
  
      <section>
        <div class="flex flex-col lg:flex-row">
          <div class="lg:w-2/3 ">
            <h2 class="text-2xl font-semibold text-main work-sans">Vår historia</h2>
            <p class="pr-5">
              Munkedals båtklubb bildadres den 14 november år 1937.
              Vi är cirka 700 medlemmar med cirka 245 båtplatser och omkring 140 uppläggningsplatser. Munkedals båtklubb bildadres den 14 november år 1937.
              Vi är cirka 700 medlemmar med cirka 245 båtplatser och omkring 140 uppläggningsplatser. Munkedals båtklubb bildadres den 14 november år 1937.
              Vi är cirka 700 medlemmar med cirka 245 båtplatser och omkring 140 uppläggningsplatser. Munkedals båtklubb bildadres den 14 november år 1937.
              Vi är cirka 700 medlemmar med cirka 245 båtplatser och omkring 140 uppläggningsplatser.
            </p>
          </div>
          <div class="px-5 pt-10 lg:pt-0 lg:w-1/3">
            Hej här ska bild vara
            <div>
              <a href="{{ route('album.index') }}">Klicka här för att komma till vårat bildarkiv</a>
            </div>
          </div>
          
        </div>
      </section>
  
      <div class="pt-10">
        <h2 class="text-2xl font-semibold text-main work-sans">Vår Styrelse och funktionärer</h2>
        @if (auth()->user())
            <div class="mt-4 mb-2">
                <a href="{{ route('board-member.add') }}" class="text-center rounded bg-green-500 text-white px-5 py-2 shadow hover:bg-green-600 focus:bg-green-600">Lägg till person</a>  
            </div>
        @endif
        @if (count($boardMembers) > 0)
            <div class="flex flex-col">
                @foreach($boardMembers as $boardMember)
                <div class="mb-5 py-5 bg-white rounded flex flex-row px-2 relative">

                  @if (auth()->user())
                    <div class="absolute top-0 right-0 flex flex-row">
                      <div class="group">
                        <a href="{{ route('board-member.edit', ['boardMemberId' => $boardMember->id]) }}">
                          <span class="text-main">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" stroke="transparent" fill="currentColor" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"/></svg>
                          </span>
                          <p class="absolute -left-5 text-center hidden group-hover:block text-sm tracking-wider bg-black bg-opacity-80 text-white px-2 py-1 rounded">Ändra</p>
                        </a>
                      </div>
                      |
                      <div class="group">
                        <a href="{{ route('board-member.delete.confirm', ['boardMemberId' => $boardMember->id]) }}">
                          <span class="text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" stroke="transparent" fill="currentColor" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M14.12 10.47L12 12.59l-2.13-2.12-1.41 1.41L10.59 14l-2.12 2.12 1.41 1.41L12 15.41l2.12 2.12 1.41-1.41L13.41 14l2.12-2.12zM15.5 4l-1-1h-5l-1 1H5v2h14V4zM6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9z"/></svg>
                          </span>
                          <p class="absolute -left-5 text-center hidden group-hover:block text-sm tracking-wider bg-black bg-opacity-80 text-white px-2 py-1 rounded">Radera</p>
                        </a>
                      </div>
                    </div>
                  @endif

                  <img class="h-16 w-16 rounded-full shadow-xl" src="{{ url('storage/uploads/images/board_members/'.$boardMember->imageName) }}" alt="">
                  <div class="flex flex-col w-full pl-2 lg:px-10">
                    <p class="font-bold text-lg tracking-wider">{{ $boardMember->role }}</p>
                    <p class="border-b-2 border-gray-200">{{ $boardMember->name }}</p>
                    <div class=" pt-2 text-sm flex flex-col lg:flex-row lg:justify-between tracking-wide">
        
                        <p class="inline font-bold lg:w-1/3">Telefon: <span class="tracking-normal font-normal">{{ $boardMember->homePhone != null ? $boardMember->homePhone : '-' }}</span></p>
        
                        <p class="inline font-bold lg:w-1/3">Mobil: <span class="tracking-normal font-normal">{{ $boardMember->mobile != null ? $boardMember->mobile : '-' }}</span></p>
        
                        <p class="inline font-bold lg:w-1/3">Epost: <span class="tracking-normal font-normal">{{ $boardMember->email != null ? $boardMember->email : '-' }}</span></p>
        
                    </div>
                  </div>
                </div>
                @endforeach
            </div>
        @else
            <p class="text-md font-bold">Ingen styrelsemedlem är ännu tillagd.</p>
        @endif
        
    </div>
  </div>
</x-app-layout>