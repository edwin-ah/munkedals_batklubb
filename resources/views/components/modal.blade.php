@props(['hashName'])

<div
  x-cloak
  x-data="{ show: false }" 
  x-show="show"
  x-init="show = (location.hash === '#{{ $hashName }}')"
  @hashchange.window="
    show = (location.hash === '#{{ $hashName }}')
  "
  class="pt-24 h-screen w-screen shadow fixed left-0 top-0 z-10 overflow-auto bg-black bg-opacity-40"
  >


  <div class="w-full max-w-sm mx-auto bg-white">
    <a href="#_" class="float-right text-gray-800 text-xl font-bold mr-4 hover:text-black focus:text-black">
        <span>Stäng &times;</span>
    </a>
      {{ $slot }}
  </div>
      
</div>