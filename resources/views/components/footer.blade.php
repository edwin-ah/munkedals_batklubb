<footer class="w-full text-center pin-b mt-20 text-white  work-sans">
  <div class="mx-auto px-6 bg-main">
      <div class="sm:flex sm:mt-8">
          <div class="mt-20 w-full sm:px-8 flex flex-col md:flex-row justify-between">
              <div class="flex py-10 md:flex-col justify-center sm:pt-0">
                  <a href="{{ route('index') }}" class="flex items-center hover:bg-gray-700 active-gray-900 pr-1 rounded">
                    <x-application-logo class="block h-14 w-auto" />
                  </a>
              </div>
              <div class="flex flex-col">
                  <h3 class="font-bold text-white text-xl uppercase mb-2">Kontakta oss</h3>
                  <span class="mt-2"><p>Telefon</p></span>
                  <span class="mb-2"><p>0524 12333</p></span>
                  <span class="mt-2"><p>Mobil</p></span>
                  <span class="mb-2"><p>070 6226674</p></span>
                  <span class="mt-2"><p>E-post</p></span>
                  <span class="mb-2"><p>munkedals.batklubb@telia.com</p></span>
              </div>
              <div class="flex flex-col">
                  <h3 class="font-bold text-white text-xl uppercase md:mt-0 mt-10 mb-2">Adress</h3>
                  <span class="my-1"><p>Ellingeröd 22</p></span>
                  <span class="my-1"><p>455 92 Munkedal</p></span>
              </div>
              <div class="flex flex-col">
                  <h3 class="font-bold text-white text-xl uppercase md:mt-0 mt-10 mb-2">Länkar</h3>
                  <span class="my-2"><a href="route('portAreas')" class="text-md border-b border-white uppercase font-bold hover:text-gray-800 px-2 rounded-t-lg hover:bg-white focus:bg-white focus:text-gray-800 focus:outline-none transition duration-150 ease-in-out">Hamnområden</a></span>
                  <span class="my-2"><a href="route('information.index')" class="text-md border-b border-white uppercase font-bold hover:text-gray-800 px-2 rounded-t-lg hover:bg-white focus:bg-white focus:text-gray-800 focus:outline-none transition duration-150 ease-in-out">Information</a></span>
                  <span class="my-2"><a href="#" class="text-md border-b border-white uppercase font-bold hover:text-gray-800 px-2 rounded-t-lg hover:bg-white focus:bg-white focus:text-gray-800 focus:outline-none transition duration-150 ease-in-out">Om oss</a></span>
              </div>
          </div>
      </div>
      <div class="container mx-auto px-6">
          <div class="mt-16 border-t-2 border-white flex flex-col items-center">
              <div class="sm:w-2/3 text-center py-6">
                  <p class="text-sm text-white font-bold uppercase mb-2">
                      © 2021 Munkedals Båtklubb
                  </p>
              </div>
          </div>
      </div>
  </div>
</footer>