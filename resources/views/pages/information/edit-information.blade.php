<x-app-layout>
  <div class="container mx-auto mt-5">
    <h1 class="text-center text-2xl font-semibold text-main work-sans">Ändra informationsbladet '{{ $information->title }}'</h1>
    <div class=" mt-10 pt-8 pb-10 bg-white rounded shadow-xl">
      <div class="p-10">
        <form action="{{ route('information.update') }}" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{ $information->id }}">
          <div class="mb-4">
            <x-forms.text-input id="title" label="Ange Informations-rubrik" :value="old('title') !=null ? old('title') : $information->title" />
          </div>
          <button type="submit" class="text-center rounded bg-green-500 text-white px-5 py-2 shadow hover:bg-green-600 focus:bg-green-600">Spara</button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
