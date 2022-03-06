<x-app-layout>
  <div class="container mx-auto mt-5">
    <h1 class="text-center text-2xl font-semibold text-main work-sans">Radera aktuell information</h1>
    <div class=" mt-10 pt-8 pb-10 bg-white rounded shadow-xl">
      <div class="p-10">
        <div class="mb-4">
          <h1 class="text-lg font-semibold text-main work-sans">Är du säker på att du vill radera '{{ $currentInformation->header }}'?</h1>
        </div>
        <div x-data="{ btnDisabled: true }">

          <form action="{{ route('current-information.delete') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $currentInformation->id }}">
            <div class="mb-4">
              <input @click="btnDisabled = !btnDisabled" type="checkbox" id="confirm" name="isConfirmed" class="mr-1 appearance-none rounded checked:bg-blue-600 checked:border-transparent">
              <label for="confirm">Ja</label>
            </div>
            <div class="mb-4">
              <button type="submit" x-bind:disabled="btnDisabled" class="transition duration-500 ease-in-out text-center rounded px-5 py-2 shadow" :class="btnDisabled ? 'bg-gray-300' : 'text-white bg-red-500 hover:bg-red-600 focus:bg-red-600'">Radera</button>
            </div>
          </form>
          <div class="mb-4">
            <a href="{{ route('current-information.index') }}" class="text-center rounded px-5 py-2 shadow btn-primary">Tillbaka</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
