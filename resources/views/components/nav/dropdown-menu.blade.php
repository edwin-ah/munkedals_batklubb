@php
     $isIndex = request()->routeIs('index');
     $isLoggedIn = auth()->user();
 @endphp

 <!-- Dropdown Menu -->

  {{-- <div class="h-full absolute {{$isIndex ? 'mobile-menu-background' : 'bg-main'}}"> --}}
  <div class="absolute w-screen bg-gray-200 shadow-md rounded-b-md">
    <div class="py-5 border-b border-gray-300">
      <x-nav.responsive-nav-link :href="route('index')" :active="request()->routeIs('index')">
        {{ __('Hem') }}
      </x-nav.responsive-nav-link>
    </div>
    <div class="py-5 border-b border-gray-300">
      <x-nav.responsive-nav-link :href="route('portAreas')" :active="request()->routeIs('portAreas')">
        {{ __('Hamnområden') }}
      </x-nav.responsive-nav-link>
    </div>
    <div class="py-5 border-b border-gray-300" x-data="{expanded: false}">
      <div class="flex flex-row">
        <x-nav.responsive-nav-link :href="route('information.index')" :active="request()->routeIs('information.index')">
          {{ __('Information') }}
        </x-nav.responsive-nav-link>
        <div class="pr-4 pt-2">
          <button class="border-2 hover:border-gray-300" @click="expanded = !expanded">
            <svg x-show="!expanded"
              xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
              <path d="M24 24H0V0h24v24z" fill="none" opacity=".87"/>
              <path d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6-1.41-1.41z"/>
            </svg>
            <svg x-show="expanded" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
              <path d="M0 0h24v24H0V0z" fill="none"/>
              <path d="M12 8l-6 6 1.41 1.41L12 10.83l4.59 4.58L18 14l-6-6z"/>
            </svg>
          </button>
        </div>
      </div>
      <div x-show="expanded" class="pl-10">
        <p>Hello</p>
      </div>
    </div>
    <div class="py-5 border-b border-gray-300">
      <x-nav.responsive-nav-link :href="route('board-member.index')" :active="request()->routeIs('testRoute')">
        {{ __('Om oss') }}
      </x-nav.responsive-nav-link>
    </div>
    @if ($isLoggedIn)
      <div class="py-5">
        <x-nav.responsive-nav-link :href="route('testRoute')" :active="request()->routeIs('testRoute')">
          {{ __('Hantera konto') }}
        </x-nav.responsive-nav-link>
      </div>
      <div class="py-5">
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
  </div>
