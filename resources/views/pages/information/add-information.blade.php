<x-app-layout>
  <div class="container mx-auto mt-5">
    <h1 class="text-center text-2xl font-semibold text-main work-sans">Lägg till informationsblad</h1>
    <div class=" mt-10 pt-8 pb-10 bg-white rounded shadow-xl">
      <div class="p-10">
        <form action="{{ route('information.add') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-4">
            <x-forms.text-input id="title" label="Ange Informations-rubrik" :value="old('title')" />
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