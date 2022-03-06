<x-app-layout>
  <div class="container mx-auto mt-5">
    <h1 class="text-center text-2xl font-semibold text-main work-sans">Lägg till protokoll</h1>
    <div class=" mt-10 pt-8 pb-10 bg-white rounded shadow-xl">
      <div class="p-10">
        <form action="{{ route('protocol.add') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-4">
            <x-forms.text-input id="title" label="Ange vilket möte" :value="old('title')" />
          </div>
          <div class="mb-4">
            <label for="date" class="block text-gray-500 font-bold mb-2">Välj datum</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
              </div>
              <input type="date" id="date" name="date" class="w-full py-2 px-4 appearance-none border-2 rounded text-gray-700 leading-tight focus:outline-none focus:bg-white block pl-10 p-2.5 datepicker-input {{ $errors->first('date') ? 'border-red-200' : 'border-gray-200'  }}" value="{{ old('date') }}">
            </div>
            @error('date')
              <div class="text-red-500">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-4">
            <x-forms.text-input id="pdf" label="Välj pdf-fil" type="file" :value="old('pdf')" />
          </div>
          <button type="submit" class="text-center rounded bg-green-500 text-white px-5 py-2 shadow hover:bg-green-600 focus:bg-green-600">Spara</button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>