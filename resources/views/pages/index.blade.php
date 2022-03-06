<x-app-layout>
    <x-slot name="jumbotronStart">
        <div class="wave-holder-top h-40 flex">
          <div class="container mx-auto align-text-bottom text-center">
            <h1 class="md:text-2xl lg:text-4xl text-xl text-white mb-5 font-bold">Välkommen Till Munkedals Båtklubb</h1>
          </div>
        </div>
    </x-slot>
    <div class="bg-main">
        <div class="container mx-auto">
            <div class="flex flex-wrap justify-center items-center text-white">
                <p class="sm:w-9/12 md:w-6/12 lg:w-3/12 px-5 md:px-0">
                    Denna välordnade båtklubb ligger i anslutning till Göta Älv strax norr om Stallbackabron.
                    <br><br>
                    Vi bedriver vinterförvaring av både segel, motorbåtar och trailer-båtar. Klubbområdet omfattar en yta av ca. 17000 m2 med egen hamn och erbjuder vinterförvaring av förnärvarande ca 300 stycken båtar.  Klubben tillhandahåller service till medlemmarna i form av..
                </p>
                <a href="{{ route('index') }}" class="px-10 my-5 py-2 rounded bg-blue-500 md:my-0 md:ml-10 hover:bg-blue-600 focus:bg-blue-600">
                    Läs mer om oss
                </a>
            </div>
        </div>
    </div>
    <div class="wave-holder-bottom h-40"></div>
    
    <div 
    x-data="{
        hasErrors: '{{ count($errors) > 0 }}',
        showModal: false,
        get modalIsOpen() { 
            return this.showModal 
        },
        toggleModal() { 
            this.showModal = ! this.showModal
        }
    }" 
    @keydown.escape="showModal = false" 
    x-cloak
    >
        
        <div class="container mx-auto">
            
            @if (auth()->user())
                <div class="text-center p-5 md:mb-10">
                    @if (!$holidayClosedDate->isVisible)
                        <div class="text-xl">(Visas inte för besökare)</div>
                    @endif
                    <h2 class="text-xl text-gray-900 font-semibold md:text-2xl">Semesterstängt  {{ $holidayClosedDate->year }} </h2>
                    <h4 class="text-xl">Vecka  {{ $holidayClosedDate->startWeek }} - {{ $holidayClosedDate->endWeek }} </h4>
                    <p class="pb-2">
                        Vid akuta ärenden kontakta 
                        <a href="{{ route('index') }}" class="text-blue-900 hover:underline focus:underline">
                            styrelsen
                        </a>
                    </p>
                    <button @click="toggleModal()" class="rounded bg-green-500 text-white px-5 py-2 shadow hover:bg-green-600 focus:bg-green-600">Ändra</button>
                </div>
                
            @elseif ($holidayClosedDate->isVisible)
                <div class="text-center p-5 md:mb-10">
                    <h2 class="text-xl text-gray-900 font-semibold md:text-2xl">Semesterstängt  {{ $holidayClosedDate->year }} </h2>
                    <h4 class="text-xl">Vecka  {{ $holidayClosedDate->startWeek }} - {{ $holidayClosedDate->endWeek }} </h4>
                    <p class="pb-2">
                        Vid akuta ärenden kontakta 
                        <a href="{{ route('index') }}" class="text-blue-900 hover:underline focus:underline">
                            styrelsen
                        </a>
                    </p>
                </div>
            @endif
                
            <div class="flex flex-col p-10 justify-between md:flex-row">
                <div class="text-center my-10 md:my-0">
                    <h2 class="text-xl text-gray-900 font-bold md:text-2xl">Mer information om oss?</h2>
                    <ul>
                        <li>
                            <a href="route('portAreas')" class="text-blue-900 text-lg md:text-xl rounded hover:underline hover:text-blue-darker focus:underline">Våra hamnområden</a>
                        </li>
                        <li>
                            <a href="{{ route('information.index') }}" class="text-blue-900 text-lg md:text-xl rounded hover:underline hover:text-blue-darker focus:underline">Informationsblad</a>
                        </li>
                        <li>
                            <a href="#" class="text-blue-900 text-lg md:text-xl rounded hover:underline hover:text-blue-darker focus:underline">Avgifter</a>
                        </li> 
                        <li>
                            <a href="#" class="text-blue-900 text-lg md:text-xl rounded hover:underline hover:text-blue-darker focus:underline">Bildarkivet</a>
                        </li>
                    </ul>
                </div>

                <div class="flex justify-center">
                    <div class="text-center">
                        <h1 class="md:text-2xl text-xl text-gray-900 font-bold mb-3">Är du medlem?</h1>
                        <a href="#" class="btn-primary text-lg px-5 py-3 rounded-lg shadow-2xl">Fyll i dina båtuppgifter här</a>
                    </div>
                </div>
            </div>
        </div>

        @if (auth()->user())
            <div x-show="!showModal ^ !hasErrors" class="pt-24 h-screen w-screen shadow fixed left-0 top-0 z-10 overflow-auto bg-black bg-opacity-40">
                <div class="w-full max-w-sm mx-auto">
                    <button @click="toggleModal()" class="float-right text-gray-700 text-xl font-bold bg-white mr-4 hover:text-black focus:text-black">
                        <span>&times;</span>
                    </button>
                    <form method="POST" action="{{ route('date.update') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        @csrf
                        <input type="hidden" name="id" value="{{ $holidayClosedDate->id }}">
                        <div class="mb-4">
                            <x-forms.text-input id="year" label="Ange År" type="number" :value="old('year')!=null ? old('year') : $holidayClosedDate->year"/>
                        </div>
                        <div class="mb-4">
                            <x-forms.text-input id="startWeek" label="Från och med vecka" type="number" :value="old('startWeek')!=null ? old('startWeek') : $holidayClosedDate->startWeek"/>
                        </div>
                        <div class="mb-4">
                            <x-forms.text-input id="endWeek" label="Till och med vecka" type="number" :value="old('endWeek')!=null ? old('endWeek') : $holidayClosedDate->endWeek"/>
                        </div>
                        <div class="mb-4">
                            <input type="checkbox" id="isVisible" name="visible" checked class="appearance-none rounded checked:bg-blue-600 checked:border-transparent">
                            <label for="isVisible">Visa Semesterstängt<label>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="rounded bg-green-500 text-white px-5 py-2 shadow hover:bg-green-600 focus:bg-green-600 focus:outline-none">Ändra</button>
                        </div>
                    </form>
                </div>
            </div>

        @endif
    </div>
</x-app-layout>