<x-app-layout>
  <div class="container mx-auto mt-5">
    <h1 class="text-center text-2xl font-semibold text-main work-sans">Ta bort bilder</h1>
    <div class=" mt-10 pt-8 pb-10 bg-white rounded shadow-xl">
      <div class="p-10">
        <div class="mb-4">
          <h1 class="text-lg font-semibold text-main work-sans">Välj de bilder du vill ta bort ur albumet '{{ $album->title }}'.</h1>
        </div>
        <div x-data="{ btnDisabled: true }">

          <form action="{{ route('album-image.destroy') }}" method="POST">
            @csrf

            @foreach($album->albumImage as $image)
              <div class="flex flex-row py-2">
                <input class="self-center mr-5 appearance-none rounded checked:bg-blue-600 checked:border-transparent" type="checkbox" name="imageId[]" id="{{ $image->id }}" value="{{ $image->id }}">
                <label for="{{ $image->id }}">
                  <img class="h-48" src="{{ url('storage/uploads/images/album_images/'.$image->imageName) }}" alt="{{ $image->name }}">
                </label>
              </div>
            @endforeach

            <input type="hidden" name="id" value="{{ $album->id }}">
            <div class="my-4">
              <p>Är du säker på att du vill radera dessa bilder?</p>
              <input @click="btnDisabled = !btnDisabled" type="checkbox" id="confirm" name="isConfirmed" class="mr-1 appearance-none rounded checked:bg-blue-600 checked:border-transparent">
              <label for="confirm">Ja</label>
            </div>
            <div class="mb-4">
              <button type="submit" x-bind:disabled="btnDisabled" class="transition duration-500 ease-in-out text-center rounded px-5 py-2 shadow" :class="btnDisabled ? 'bg-gray-300' : 'text-white bg-red-500 hover:bg-red-600 focus:bg-red-600'">Radera</button>
            </div>
          </form>
          <div class="mb-4">
            <a href="{{ route('board-member.index') }}" class="text-center rounded px-5 py-2 shadow btn-primary">Tillbaka</a>
          </div>
        </div>
      </div>
    </div>
  </div> 
</x-app-layout>