<header class="bg-gray-500 sticky top-0 z-50" x-data="dropdown()">
    <div class="container-j flex items-center h-16 justify-between sm:justify-start">
        <a :class="({'bg-opacity-100 text-blue-500': open})" @click="show()" @click.away="close()"
            class="h-full flex flex-col items-center justify-center px-6 sm:px-4 bg-white bg-opacity-25 
            text-white cursor-pointer font-semibold order-last sm:order-first">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="hidden sm:block">
                Categorías
            </span>
        </a>
        {{-- carrito en pantallas chicas--}}
        <div class="relative block sm:hidden">
            @livewire('dropdown-cart', ['align' => 'left'])
        </div>

        <a href="/" class="mx-6 h-full bg-white w-auto">
            <x-winecup-logo class="block  " />
        </a>
        <div class="flex-1 hidden sm:block">
            @livewire('search')
        </div>

        <div class="ml-6 relative hidden sm:block">
            @auth
                <x-jet-dropdown align="left">
                    <x-slot name="trigger">
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <!-- Account Management
                                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                                        {{ __('Manage Account') }}
                                                    </div> -->
                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            Perfil
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ route('orders.index') }}">
                            Mis ordenes
                        </x-jet-dropdown-link>
                        @can('admin.home')
                            <x-jet-dropdown-link href="{{ route('admin.home') }}">
                                Administración
                            </x-jet-dropdown-link>
                        @endcan
                        <div class="border-t border-gray-100"></div>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                        this.closest('form').submit();">
                                Cerrar sesión
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            @else
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <i class="fas fa-user-circle text-white text-3xl cursor-pointer"></i>
                    </x-slot>
                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ route('login') }}">
                            Iniciar Sesión
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ route('register') }}">
                            Registrarse
                        </x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>
            @endauth
        </div>

        {{-- carrito en pantallas grandes--}}
        <div class="ml-6 relative hidden sm:block">
            <span class="relative inline-block">
                @livewire('dropdown-cart', ['align' => 'right'])
            </span>
        </div>        

    </div>
    <nav id="navegation-menu"
        class="bg-gray-700 bg-opacity-25 w-full absolute hidden"
        :class="{'hidden': !open}"> 
        {{-- Menú pantallas grandes --}}
        <div class="container-j h-full hidden sm:block">
            <div class="grid grid-cols-4 h-full relative" {{-- x-on:click.away="close()" --}}>
                <ul class="bg-white">
                    @foreach ($categories as $category)
                        <li class="navigation-link text-gray-500 hover:bg-blue-500 hover:text-white">
                            <a href="{{route('categories.show',$category)}}" class="py-2 px-4 flex items-center">
                                <span class="flex justify-center w-9">
                                    {!! $category->icon !!}
                                </span>
                                {{ $category->name }}
                            </a>
                            <div class="navigation-submenu bg-gray-100 absolute h-full w-3/4 top-0 right-0 hidden">
                                <x-navigation-subcategories :category="$category" />
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="col-span-3 bg-gray-100">
                    <x-navigation-subcategories :category="$categories->first()" />
                </div>
            </div>
        </div>
        {{-- Menú pantallas chicas --}}
        <div class="bg-white h-30 overflow-y-auto">
            <div class="container-j bg-gray-300 py-3 mb-2 mt-2">
                @livewire('search')
            </div>
            <ul>
                @foreach ($categories as $category)
                    <li class="text-gray-500 hover:bg-blue-500 hover:text-white">
                        <a href="{{route('categories.show',$category)}}" class="py-2 px-4 flex text-sm items-center">
                            <span class="flex justify-center w-9">
                                {!! $category->icon !!}
                            </span>
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <p class="text-gray-500 font-bold px-6 py-4 mt-4">
                USUARIO
            </p>
            @auth
                <a href="{{ route('profile.show') }}"
                    class="text-gray-500 hover:bg-blue-500 hover:text-white py-2 px-4 flex text-sm items-center">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-id-card"></i>
                    </span>
                    <div class="ml-2">Perfil</div>
                </a>
                <a href="{{ route('orders.index') }}"
                    class="text-gray-500 hover:bg-blue-500 hover:text-white py-2 px-4 flex text-sm items-center">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-file-invoice"></i>
                    </span>
                    <div class="ml-2">Mis Ordenes</div>
                </a>

                <a href="" onclick="event.preventDefault();
                                document.getElementById('loguot-form').submit()"
                    class="text-gray-500 hover:bg-blue-500 hover:text-white py-2 px-4 flex text-sm items-center">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>
                    <div class="ml-2">Cerrar Sesión</div>
                </a>
                <form id="loguot-form" method="POST" action="{{ route('logout') }}" class="hidden">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="text-gray-500 hover:bg-blue-500 hover:text-white py-2 px-4 flex text-sm items-center">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-sign-in-alt"></i>
                    </span>
                    <div class="ml-2">Iniciar Sesión</div>
                </a>
                <a href="{{ route('register') }}"
                    class="text-gray-500 hover:bg-blue-500 hover:text-white py-2 px-4 flex text-sm items-center">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-user-plus"></i>
                    </span>
                    <div class="ml-2">Registrarse</div>
                </a>
            @endauth

        </div>
    </nav>
</header>
