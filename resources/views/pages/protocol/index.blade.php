<x-app-layout>
  <div class="bg-main">
    <h1 class="pt-10 text-center text-xl font-semibold text-white work-sans md:text-2xl">Medlemsmötesprotokoll</h1>
    <div class="text-center">
      <a href="{{ route('information.index') }}" class="text-gray-200 hover:text-gray-400">
        <span class="underline">Klicka här</span> för att gå till information
      </a>
  </div>
  </div>
  <div class="wave-holder-bottom h-40"></div>

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

  @if (auth()->user())
      <div class="text-center py-2">
        Klicka på
        <span class="text-main">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" stroke="transparent" fill="currentColor" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"/></svg>
        </span>
        ikonen för att ändra informationen om protokollet. <br/> För att radera ett protokoll klickar du på 
        <span class="text-red-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" stroke="transparent" fill="currentColor" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M14.12 10.47L12 12.59l-2.13-2.12-1.41 1.41L10.59 14l-2.12 2.12 1.41 1.41L12 15.41l2.12 2.12 1.41-1.41L13.41 14l2.12-2.12zM15.5 4l-1-1h-5l-1 1H5v2h14V4zM6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9z"/></svg>
        </span>
        ikonen.
      </div>
      <div class="flex justify-center pb-4">
        <a href="{{ route('protocol.add') }}" class="text-center rounded bg-green-500 text-white px-5 py-2 shadow hover:bg-green-600 focus:bg-green-600">Lägg till protokoll</a>  
      </div> 
    @endif

    <div class="container mx-auto mt-5">
      <table class="w-full bg-gray-50 divide-y divide-gray-400 rounded shadow" class="px-6 py-3">
        <thead>
          <tr>
            <td class="px-6 py-3">Möte</td>
            <td class="px-6 py-3">Datum</td>
            <td class="px-6 py-3">Länk</td>
            @if (auth()->user())
              <td class="px-6 py-3"></td>
            @endif
          </tr>
        </thead>
        <tbody class="bg-gray-50 divide-y divide-gray-200">
          @foreach ($protocols as $protocol)
          <tr class="px-6 py-3">
            <td class="px-6 py-3">{{ $protocol->title }} - {{ $protocol->year }}</td>
            <td class="px-6 py-3">{{ $protocol->date }}</td>
            <td class="px-6 py-3"> <a href="{{ $protocol->filePath }}" class="underline text-main" target="_blank" rel="noopener noreferrer">Öppna som pdf</a></td>
            @if (auth()->user())
              <td class="py-3">
                <a href="{{ route('protocol.edit', ['protocolId' => $protocol->id]) }}">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" stroke="transparent" fill="currentColor" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"/></svg>
                </a>
                <a href="{{ route('protocol.delete.confirm', ['protocolId' => $protocol->id]) }}" class="text-red-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" stroke="transparent" fill="currentColor" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M14.12 10.47L12 12.59l-2.13-2.12-1.41 1.41L10.59 14l-2.12 2.12 1.41 1.41L12 15.41l2.12 2.12 1.41-1.41L13.41 14l2.12-2.12zM15.5 4l-1-1h-5l-1 1H5v2h14V4zM6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9z"/></svg>
                </a>
              </td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
      <span>
        {{$protocols->links()}}
      </span>
    </div>
</x-app-layout>