<x-app-layout>
    <div class="bg-main">
        {{-- <hr class="border-t-1 border-white w-4/5 mx-auto" /> --}}
        <h1 class="pt-10 text-center text-4xl font-semibold text-white work-sans">
            Hamnområden
        </h1>
        <div>
            <p class="text-center text-white">
                Munkedals Båtklubb har två hamnområden,
                <a href="#saltkallan" class="underline text-white hover:text-gray-400">Saltkällan</a>
                , som är vår största båthamn, samt
                <a href="#ellingerod" class="underline text-white hover:text-gray-400">Ellingeröd</a>
                , där vi har klubbstuga, båtplatser, kran och uppläggning.
            </p>
        </div>
    </div>
    <div class="wave-holder-bottom h-40"></div> 
    <div class="container mx-auto mt-5">
        {{-- <h1 class="text-center text-4xl font-semibold text-main work-sans">
            Hamnområden
        </h1>
        <div>
            <p class="text-center text-black">
                Munkedals Båtklubb har två hamnområden,
                <a href="#saltkallan" class="underline text-main font-semibold">Saltkällan</a>
                , som är vår största båthamn, samt
                <a href="#ellingerod" class="underline text-main font-semibold">Ellingeröd</a>
                , där vi har klubbstuga, båtplatser, kran och uppläggning.
            </p>
        </div> --}}
        <div class="mt-10 pt-8 rounded">
            <h1 id="saltkallan" class=" text-center font-semibold text-main text-4xl work-sans"> Saltkällan </h1>
            <div class="flex md:flex-row justify-between flex-col py-3 md:py-8">
                <div class="md:w-6/12 sm:mb-5 lg:px-20 px-10 flex flex-col justify-center">
                    <p>
                        Saltkällan är vår största båthamn och finns längst
                        in i Saltkällefjorden. Här ha i sex stycken
                        flytbryggor med totalt 184 båtplatser.
                    </p>
                    <br />
                    <p>
                        Här finns en vaktstuga för oss båtägare, då vi hela
                        den aktiva båtsäsongen går vakt.
                    </p>
                    <br />
                    <p>
                        Det finns en bra sjösättningsramp För nyttjande av
                        den krävs medlemskap och elektronisknyckel som köps
                        till självkostnadspris.
                    </p>
                </div>
                <div class="md:w-6/12 flex">
                    <img class="rounded border shadow max-h-96" src="/web_images/ny-brygga.jpg" alt="" />
                </div>
            </div>
            <div class="flex flex-row invisible md:visible">
                <div>
                    <img class="object-contain rounded px-5" src="/web_images/saltkallan1.jpg" alt="" />
                </div>
                <div>
                    <img class="object-contain rounded px-5" src="/web_images/saltkallan2.jpg" alt="" />
                </div>
                <div>
                    <img class="object-contain rounded px-5" src="/web_images/saltkallan3.jpg" alt= />
                </div>
            </div>
            <div class="text-center md:mt-8">
                <p class="font-bold work-sans">Hamnkapten Leif Karlsson</p>
                <p>
                    När det gäller båtplatser, vaktnätter kontakta Kansliet
                    0524-12333 eller 070-6226674
                </p>
            </div>

            <hr class="my-20 border-t-2 border-main" />

            <h1 id="ellingerod" class=" text-center font-semibold text-main text-4xl work-sans">Elllingeröd</h1>
            <div class="flex md:flex-row justify-between flex-col py-3 md:py-8 " >
                <div class=" md:w-6/12 sm:mb-5 lg:px-20 px-10 flex flex-col justify-center " >
                    <p>
                        Ellingeröd är där vi har klubbstuga, båtplatser,
                        kran och uppläggning. Ellingeröd har liksom Åtorp
                        ett väl skyddat läge i Örekilsälven.
                    </p>
                    <br />
                    <h2 class="font-semibold">
                        Här har vi 63 båtplatser fördelat på
                    </h2>
                    <ul>
                        <li>18 st. 2,2m bredd</li>
                        <li>6 st. 2,5m bredd</li>
                        <li>16 st. 3,0m bredd</li>
                        <li>20 st. 3,5m bredd</li>
                        <li>3 st. 4,0m bredd</li>
                    </ul>
                    <br />
                    <h2 class="font-semibold">Uppläggning</h2>
                    <ul>
                        <li>Vi har 80 st. båthus</li>
                        <li>cirka 60 st. friliggare</li>
                        <li>Det finns eluttag med god täckning</li>
                        <li>
                            Den frostfria delen av året har vi även
                            vattenposter på några platser
                        </li>
                    </ul>
                </div>
                <div class="md:w-6/12 flex justify-center">
                    <img class="rounded border shadow max-h-96" src="/web_images/ellingerod.jpg" alt="" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>