<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>client</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('vite')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Custom style */
        .header-right {
            width: calc(100% - 3.5rem);
        }

        .sidebar:hover {
            width: 16rem;
        }

        table.dataTable th.dt-type-numeric,
        table.dataTable th.dt-type-date,
        table.dataTable td.dt-type-numeric,
        table.dataTable td.dt-type-date {
            text-align: left;
        }

        @media only screen and (min-width: 768px) {
            .header-right {
                width: calc(100% - 16rem);
            }
        }
    </style>
</head>

<body>
    <div>
        <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-slate-100 text-black">

            <!-- Header -->
            <div class="fixed bg-blue-800 w-full flex items-center justify-between h-14 text-white sm:px-4 z-10">
                <a href="">
                    <x-application-logo class="block h-9 w-auto fill-current text-white" />
                </a>


                <!-- Mobile Menu Button -->
                <button class="sm:hidden focus:outline-none" id="mobileMenuButton">
                    <svg class="h-6 w-6 fill-current text-white" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M4 6a2 2 0 012-2h12a2 2 0 110 4H6a2 2 0 01-2-2zm0 7a2 2 0 012-2h12a2 2 0 110 4H6a2 2 0 01-2-2zm0 7a2 2 0 012-2h12a2 2 0 110 4H6a2 2 0 01-2-2z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <!-- Mobile Menu -->
                <div class="absolute  top-14 sm:hidden bg-blue-400 w-full text-white px-4 pt-2 pb-4"
                    style="display: none;" id="mobileMenu">
                    <a href="{{ route('client.index') }}" class="block py-2 text-center hover:text-gray-200">Events</a>
                    <a href="{{ route('client.myreservation') }}" class="block text-center py-2 hover:text-gray-200">My
                        reservation</a>
                    <form class="w-full flex justify-center" action="{{ route('client.search') }}" method="GET">
                        <input type="text" name="search" placeholder="Search..."
                            class="px-2 py-1 rounded-lg border-none bg-gray-200 focus:outline-none text-black"
                            id="mobileSearchInput">
                        <button type="submit"
                            class="px-3 py-1 bg-blue-900 text-center text-white rounded-lg ml-2">Search</button>
                    </form>
                    <form class="mt-2 flex justify-center" method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="px-3 py-1  text-center text-white rounded-lg ml-2 hover:text-blue-900 hover:underline">Log out</button>

                    </form>
                </div>

                <div class="hidden sm:flex justify-evenly items-center h-14 bg-blue-800 header-right">
                    <a href="{{ route('client.index') }}">Events</a>
                    <a href="{{ route('client.myreservation') }}">My reservation</a>
                    <form action="{{ route('client.search') }}" method="GET">
                        <input type="text" name="search" placeholder="Search..."
                            class="px-2 py-1 rounded-lg border-none bg-gray-200 focus:outline-none text-black">
                        <button type="submit" class="px-3 py-1 bg-blue-900 text-white rounded-lg ml-2">Search</button>
                    </form>
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-semibold rounded-md text-gray-100 bg-blue-900 hover:text-white focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </div>
            <main class="h-full   mt-14  md:ml-20 md:mr-20">
                {{ $slot }}
            </main>
        </div>
    </div>
    <footer class="bg-blue-900 py-8 px-10 font-[sans-serif]">
        <div class="">
            <div class="lg:flex lg:items-center flex justify-center">
                <a href="">
                    <x-application-logo class="block h-9 w-auto fill-current text-white" />
                </a>
            </div>

        </div>
        <p class='text-gray-300 text-sm mt-8 text-center'>© 2023<a href='' target='_blank'
                class="hover:underline mx-1 text-center">ReadymadeUI</a>All Rights Reserved.
        </p>
    </footer>
    @stack('scripts')
    <script>
        // Toggle mobile menu
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenuButton.addEventListener('click', function() {
            if (mobileMenu.style.display === 'none') {
                mobileMenu.style.display = 'block';
            } else {
                mobileMenu.style.display = 'none';
            }
        });
    </script>
</body>

</html>
