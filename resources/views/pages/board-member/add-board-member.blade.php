<x-app-layout>
  <div class="container mx-auto mt-5">
    <h1 class="text-center text-2xl font-semibold text-main work-sans">Lägg till person</h1>
    <div class=" mt-10 pt-8 pb-10 bg-white rounded shadow-xl">
      <div class="p-10">
        <form action="{{ route('board-member.add') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-4">
            <x-forms.text-input id="role" label="Ange Roll" placeholder="Ordförande" :value="old('role')" />
          </div>
          <div class="mb-4">
            <x-forms.text-input id="name" label="Ange Förnamn och Efternamn" placeholder="Magnus Andersson" :value="old('name')" />
          </div>
          <div class="mb-4">
            <x-forms.text-input id="homePhone" label="Ange hemtelefon (frivillig)" placeholder="0524 12345" :value="old('homePhone')" />
          </div>
          <div class="mb-4">
            <x-forms.text-input id="mobile" label="Ange mobil (frivillig)" placeholder="070 123 45 67" :value="old('mobile')" />
          </div>
          <div class="mb-4">
            <x-forms.text-input id="email" type="email" label="Ange epost (frivillig)" placeholder="example@gmail.com" :value="old('email')" />
          </div>

          <div class="mb-4">
            <x-forms.text-input id="image" type="file" label="Välj bild (frivillig)" :value="old('image')" />
          </div>
          
          <div class="mb-4">
            <button type="submit" class="text-center rounded bg-green-500 text-white px-5 py-2 shadow hover:bg-green-600 focus:bg-green-600">Spara</button>
          </div>
          <div class="mb-4">
            <a class="text-center rounded px-5 py-2 shadow btn-primary" href="{{ route('board-member.index') }}">Tillbaka</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>