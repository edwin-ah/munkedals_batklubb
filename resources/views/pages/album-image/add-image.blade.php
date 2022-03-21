<x-app-layout>
  <div class="container mx-auto mt-5">
    <h1 class="text-center text-2xl font-semibold text-main work-sans">Lägg till bilder till albumet '{{ $album->title }}'</h1>
    <div class="mt-10 pt-8 pb-10 bg-white rounded shadow-xl">
      <div class="px-10">
        @if ($errors->any())
          <div class="text-center mb-5">
            <p class="font-bold">Fel uppstod när bilderna skulle sparas:</p>
            <ul>
              @foreach ($errors->all() as $error)
                <li class="text-red-500">{{ $error }}</li>   
              @endforeach
            </ul>
          </div>
        
        @endif
        <form action="{{ route('album-image.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="albumId" value="{{ $album->id }}">
          <div class="" x-data="fieldHandler()">  
            <table class="mx-auto border-collapse">
              <thead>
                <tr>
                  <td class="border border-gray-300 p-2 text-white bg-gray-900 font-bold mb-2">*</td>
                  <td class="border border-gray-300 p-2 text-white bg-gray-900 font-bold mb-2">Bild</td>
                  <td class="border border-gray-300 p-2 text-white bg-gray-900 font-bold mb-2">Beskrivning</td>
                  <td class="p-2">
                    <button type="button" @click="addNewField()"><span class="text-black font-bold mb-2">+ Lägg till bild</span></button>
                  </td>
                </tr>
              </thead>
              <tbody>
                <template x-for="(field, index) in fields" :key="index">
                  <tr>
                    <td class="border border-gray-300 p-2">
                      <p x-text="index + 1"></p>
                    </td>
                    <td class="border border-gray-300 p-2">
                      <input type="file" id="image" name="images[]">
                    </td>
                    <td class="border border-gray-300 p-2">
                      <textarea 
                        class="w-full py-2 px-4 appearance-none border-2 rounded text-gray-700 leading-tight focus:outline-none focus:bg-white border-gray-200" name="descriptions[]" cols="30" rows="2" 
                        placeholder="..."
                      ></textarea>
                    </td>
                    <td class="border border-gray-300 p-2">
                      <button type="button">
                        <span class="text-red-500 font-bold" @click="removeField(index)">- Ta bort</span>
                      </button>
                    </td>
                  </tr>
                </template>
              </tbody>
            </table>
          </div>
          <div class="mb-4">
            <button type="submit" class="text-center rounded bg-green-500 text-white px-5 py-2 shadow hover:bg-green-600 focus:bg-green-600">Spara</button>
          </div>
          <div class="mb-4">
            <a class="text-center rounded px-5 py-2 shadow btn-primary" href="{{ route('album-year', ['albumYear' => $album->year]) }}">Tillbaka</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  
</x-app-layout>

<script type="text/javascript">
  function fieldHandler() {
    return {
      fields: [{
        image: null,
        description: ''
      }],
      addNewField() {
        this.fields.push({
          image: null,
          description: ''
          });
      },
      removeField(index) {
          this.fields.splice(index, 1);
      }
    }
  }
</script>