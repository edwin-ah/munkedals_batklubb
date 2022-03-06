 @php
     $isIndex = request()->routeIs('index');
     $isLoggedIn = auth()->user();
 @endphp

 <div class="h-auto work-sans {{ $isIndex ? 'navbar-background' : 'bg-main' }}">
  <nav x-data="{ dropdownIsOpen: false }" class="py-1">
    <div class="xl:max-w-7xl max-w-full mx-auto sm:px-6 md:px-4 lg:px-2 xl:px-0">
      <div class="flex justify-between">
        
        <!-- Logo -->
        <div class="flex">
          <a href="{{ route('index') }}" class="group logo-link flex items-center text-white pt-1 focus:ring-2 focus:ring-gray-300">
            <x-application-logo class="block h-14 w-auto" />
            <h3 class="ml-1 font-bold text-lg uppercase leading-5 border-b-2 border-transparent group-hover:border-gray-300 transition duration-150 ease-in-out">munkedals båtklubb</h3>
          </a>
        </div>

        <!-- Navlinks -->
        <div class="items-center lg:space-x-3 space-x-1 uppercase hidden pr-5 {{ $isLoggedIn ? 'lg:flex' : 'md:flex' }}">
          <div>
            <x-nav.nav-link :href="route('index')" :active="request()->routeIs('index')">
              {{ __('Hem') }}
            </x-nav.nav-link>
          </div>
          <div class="group">
            <x-nav.nav-link :href="route('information.index')" :active="request()->routeIs('information.index')">
              {{ __('Information') }}
              <span class="text-white">
                <svg
                  xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                  <path d="M24 24H0V0h24v24z" fill="none"/>
                  <path d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6-1.41-1.41z"/>
                </svg>
              </span>
            </x-nav.nav-link>
            <div class="px-4 py-2 bg-black bg-opacity-95 absolute hidden flex group-hover:block">
              <div class="flex flex-col justify-center">
                <a href="" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-gray-300 hover:border-gray-300 focus:text-gray-300 focus:border-gray-300 transition duration-150 ease-in-out">Medlemsmötesprotokoll</a>
                <a href="" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-gray-300 hover:border-gray-300 focus:text-gray-300 focus:border-gray-300 transition duration-150 ease-in-out">HELLO</a>
                <a href="" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-gray-300 hover:border-gray-300 focus:text-gray-300 focus:border-gray-300 transition duration-150 ease-in-out">HELLO</a>
                <a href="" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-gray-300 hover:border-gray-300 focus:text-gray-300 focus:border-gray-300 transition duration-150 ease-in-out">HELLO</a>
              </div>
            </div>
          </div>
          <div>
            <div class="group">
              <x-nav.nav-link :href="route('board-member.index')" :active="request()->routeIs('testRoute')">
                {{ __('Om oss') }}
                <span class="text-white hover:text-gray-300">
                  <svg
                    xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                    <path d="M24 24H0V0h24v24z" fill="none" opacity=".87"/>
                    <path d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6-1.41-1.41z"/>
                  </svg>
                </span>
              </x-nav.nav-link>
              <div class="px-4 py-2 bg-black bg-opacity-95 absolute hidden flex group-hover:block">
                <div class="flex flex-col justify-center">
                  <a href="" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-gray-300 hover:border-gray-300 focus:text-gray-300 focus:border-gray-300 transition duration-150 ease-in-out">Bildarkivet</a>
                  <a href="" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-gray-300 hover:border-gray-300 focus:text-gray-300 focus:border-gray-300 transition duration-150 ease-in-out">HELLO</a>
                  <a href="" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-gray-300 hover:border-gray-300 focus:text-gray-300 focus:border-gray-300 transition duration-150 ease-in-out">HELLO</a>
                  <a href="" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-gray-300 hover:border-gray-300 focus:text-gray-300 focus:border-gray-300 transition duration-150 ease-in-out">HELLO</a>
                </div>
              </div>
            </div>
          </div>
          <div>
            <x-nav.nav-link :href="route('portAreas')" :active="request()->routeIs('portAreas')">
              {{ __('Hamnområden') }}
            </x-nav.nav-link>
          </div>
          @if($isLoggedIn)
            <x-nav.nav-link :href="route('testRoute')" :active="request()->routeIs('testRoute')">
              {{ __('Hantera konto') }}
            </x-nav.nav-link>
            <form method="POST" action="{{ route('logout') }}" id="logoutForm">
              @csrf

              <x-nav.nav-link :href="route('logout')"
                      onclick="event.preventDefault(); document.getElementById('logoutForm').submit();
                              ">
                  {{ __('Logga ut') }}
              </x-nav.nav-link>
            </form>
          @endif
        </div>

        <!-- Hamburger -->
        <div class="mr-2 flex items-center {{ $isLoggedIn ? 'lg:hidden' : 'md:hidden' }}">
          <button @click="dropdownIsOpen = !dropdownIsOpen" class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 bg-gray-100 hover:text-gray-500 hover:bg-gray-300 focus:outline-none focus:bg-gray-300 focus:text-gray-700 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path :class="{'hidden': dropdownIsOpen, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              <path :class="{'hidden': ! dropdownIsOpen, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Dropdown Menu -->
    <div :class="{ 'block': dropdownIsOpen, 'hidden': !dropdownIsOpen }">
      <x-nav.dropdown-menu />
      {{-- <div class="h-full absolute {{$isIndex ? 'mobile-menu-background' : 'bg-main'}}">
        <div class="pt-5">
          <x-nav.responsive-nav-link :href="route('index')" :active="request()->routeIs('index')">
            {{ __('Hem') }}
          </x-nav.responsive-nav-link>
        </div>
        <div class="pt-5">
          <x-nav.responsive-nav-link :href="route('portAreas')" :active="request()->routeIs('portAreas')">
            {{ __('Hamnområden') }}
          </x-nav.responsive-nav-link>
        </div>
        <div class="pt-5">
          <x-nav.responsive-nav-link :href="route('information.index')" :active="request()->routeIs('information.index')">
            {{ __('Information') }}
          </x-nav.responsive-nav-link>
        </div>
        <div class="pt-5">
          <x-nav.responsive-nav-link :href="route('testRoute')" :active="request()->routeIs('testRoute')">
            {{ __('Om oss') }}
          </x-nav.responsive-nav-link>
        </div>
        @if ($isLoggedIn)
          <div class="pt-5">
            <x-nav.responsive-nav-link :href="route('testRoute')" :active="request()->routeIs('testRoute')">
              {{ __('Hantera konto') }}
            </x-nav.responsive-nav-link>
          </div>
          <div class="pt-5">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <x-nav.responsive-nav-link :href="route('logout')"
                      onclick="event.preventDefault();
                                  this.closest('form').submit();">
                  {{ __('Logga ut') }}
              </x-nav.responsive-nav-link>
            </form>
          </div>
        @endif
      </div> --}}
    </div>
  </nav>

  @if ($isIndex)
    <div>
      {{ $jumbotronStart }}
    </div>
  @endif
</div>