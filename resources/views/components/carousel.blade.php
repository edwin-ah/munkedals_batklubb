<div x-data="{ activeInformation: {{ $activeInformation }} , informations: {{ $informations }} }">
    <template x-for="(information, index) in informations" :key="information.id">
        <div x-show="activeInformation === information.id">
            <div class="flex flex-row justify-between">
                <div class="self-center">
                    <button x-show="Object.keys(informations).length > 1" 
                        class=" hover:bg-gray-300 disabled:opacity-50" 
                        x-on:click="activeInformation--"
                        x-bind:disabled="index === 0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 h-6 md:h-10 md:w-10" stroke="transparent" fill="currentColor" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.61 7.41L14.2 6l-6 6 6 6 1.41-1.41L11.03 12l4.58-4.59z"/></svg>
                    </button>
                </div>

                <div class="w-full h-auto h-14">                    
                    <p class="text-center font-bold" x-text="information.header"></p>
                    <p class="text-center text-sm md:text-md" x-text="information.description"></p>
                </div>

                <div class="self-center" >
                    <button x-show="Object.keys(informations).length > 1" 
                        class= "hover:bg-gray-300 disabled:opacity-50"
                        x-on:click="activeInformation++"
                        x-bind:disabled="index === informations.length - 1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 h-6 md:h-10 md:w-10" stroke="transparent" fill="currentColor" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>