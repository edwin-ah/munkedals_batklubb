<x-app-layout>
  <div class="container mx-auto mt-5">
    <h1 class="text-center text-2xl font-semibold text-main work-sans">Ändra '{{ $currentInformation->header }}'</h1>
    <div class=" mt-10 pt-8 pb-10 bg-white rounded shadow-xl">
      <div class="p-10">
        <form action="{{ route('current-information.update') }}" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{ $currentInformation->id }}">
          <div class="mb-4">
            <x-forms.text-input id="header" label="Ange Informations-rubrik" :value="old('header') !=null ? old('header') : $currentInformation->header" />
          </div>
          <div class="mb4">
            <textarea 
              class="w-full py-2 px-4 appearance-none border-2 rounded text-gray-700 leading-tight focus:outline-none focus:bg-white {{ $errors->first('description') ? 'border-red-200' : 'border-gray-200'  }}" 
              name="description" 
              id="description" 
              cols="30" rows="2" 
              placeholder="..."
            >{{ old('description') != null ? old('description') : $currentInformation->description }}</textarea>
            @error('description')
              <div class="text-red-500">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-4">
            <button type="submit" class="text-center rounded bg-green-500 text-white px-5 py-2 shadow hover:bg-green-600 focus:bg-green-600">Spara</button>
          </div>
          <div class="mb-4">
            <a class="text-center rounded px-5 py-2 shadow btn-primary" href="{{ route('current-information.index') }}">Tillbaka</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
