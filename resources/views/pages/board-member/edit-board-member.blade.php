<x-app-layout>
  <div class="container mx-auto mt-5">
    <h1 class="text-center text-2xl font-semibold text-main work-sans">Ändra information om '{{ $boardMember->name }}'</h1>
    <div class=" mt-10 pt-8 pb-10 bg-white rounded shadow-xl">
      <div class="px-10">
        <div class="flex flex-col items-center">
          <img class="h-28 w-28 rounded-full shadow-xl" src="{{ url('storage/uploads/images/board_members/'.$boardMember->imageName) }}" alt="">

          @if ($boardMember->hasImage)
            <form method="POST" action="{{ route('board-member.delete-image') }}">
              @csrf
              <input type="hidden" name="id" value="{{ $boardMember->id }}">
              <button type="submit">Ta bort bild</button>
            </form> 
          @endif
          
        </div>
        <form action="{{ route('board-member.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{ $boardMember->id }}">
          <div class="mb-4">
            <x-forms.text-input id="role" label="Roll" :value="old('role') !=null ? old('role') : $boardMember->role" />
          </div>
          <div class="mb-4">
            <x-forms.text-input id="name" label="För och efternamn" :value="old('name') !=null ? old('name') : $boardMember->name" />
          </div>
          <div class="mb-4">
            <x-forms.text-input id="homePhone" label="Hemtelefon (frivillig)" :value="old('homePhone') !=null ? old('homePhone') : $boardMember->homePhone" />
          </div>
          <div class="mb-4">
            <x-forms.text-input id="mobile" label="Mobil (frivillig)" :value="old('mobile') !=null ? old('mobile') : $boardMember->mobile" />
          </div>
          <div class="mb-4">
            <x-forms.text-input id="email" label="Email (frivillig)" :value="old('email') !=null ? old('email') : $boardMember->email" />
          </div>
          <div class="mb-4">
            <x-forms.text-input id="image" type="file" label="Byt bild (frivillig)" :value="old('image')" />
          </div>
          
          <button type="submit" class="text-center rounded bg-green-500 text-white px-5 py-2 shadow hover:bg-green-600 focus:bg-green-600">Spara</button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>