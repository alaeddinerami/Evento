<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>

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
        <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white text-black">

            <!-- Header -->
            <div class="fixed bg-blue-800 w-full flex items-center justify-between h-14 text-white px-4 z-10">
                <a href="">

                    <x-application-logo class="block h-9 w-auto fill-current text-white" />
                </a>
                <div class="flex justify-end items-center h-14 bg-blue-800 header-right">

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
            <!-- ./Header -->

            <!-- Sidebar -->
            <div
                class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-blue-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
                <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                    <ul class="flex flex-col py-4 space-y-1">
                        <li class="px-5 hidden md:block">
                            <div class="flex flex-row items-center h-8">
                                <div class="text-sm font-light tracking-wide text-white uppercase"></div>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('dashboard') }}"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                        </path>
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                            </a>
                        </li>
                        <li class="px-5 hidden md:block ">
                            <hr class="border-[1.2px] rounded-full">
                        </li>

                        <li>
                            <a href="{{ route('category.index') }}"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        xmlns:serif="http://www.serif.com/" fill="#ffffff" class="w-5 h-5"
                                        viewBox="0 0 64 64" version="1.1" xml:space="preserve"
                                        style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">

                                        <rect id="Icons" x="-384" y="-320" width="1280" height="800"
                                            style="fill:none;" />

                                        <g id="Icons1" serif:id="Icons">

                                            <g id="Strike">

                                            </g>

                                            <g id="H1">

                                            </g>

                                            <g id="H2">

                                            </g>

                                            <g id="H3">

                                            </g>

                                            <g id="list-ul">

                                            </g>

                                            <g id="hamburger-1">

                                            </g>

                                            <g id="hamburger-2">

                                            </g>

                                            <g id="list-ol">

                                            </g>

                                            <g id="list-task">

                                            </g>

                                            <g id="trash">

                                            </g>

                                            <g id="vertical-menu">

                                            </g>

                                            <g id="horizontal-menu">

                                            </g>

                                            <g id="sidebar-2">

                                            </g>

                                            <g id="Pen">

                                            </g>

                                            <g id="Pen1" serif:id="Pen">

                                            </g>

                                            <g id="clock">

                                            </g>

                                            <g id="external-link">

                                            </g>

                                            <g id="hr">

                                            </g>

                                            <g id="info">

                                            </g>

                                            <g id="warning">

                                            </g>

                                            <g id="plus-circle">

                                            </g>

                                            <g id="minus-circle">

                                            </g>

                                            <g id="vue">

                                            </g>

                                            <g id="cog">

                                            </g>

                                            <g id="logo">

                                            </g>

                                            <g id="radio-check">

                                            </g>

                                            <g id="eye-slash">

                                            </g>

                                            <g id="eye">

                                            </g>

                                            <g id="toggle-off">

                                            </g>

                                            <g id="shredder">

                                            </g>

                                            <g>

                                                <path
                                                    d="M9.89,30.496c-1.14,1.122 -1.784,2.653 -1.791,4.252c-0.006,1.599 0.627,3.135 1.758,4.266c3.028,3.028 7.071,7.071 10.081,10.082c2.327,2.326 6.093,2.349 8.448,0.051c5.91,-5.768 16.235,-15.846 19.334,-18.871c0.578,-0.564 0.905,-1.338 0.905,-2.146c0,-4.228 0,-17.607 0,-17.607l-17.22,0c-0.788,0 -1.544,0.309 -2.105,0.862c-3.065,3.018 -13.447,13.239 -19.41,19.111Zm34.735,-15.973l0,11.945c0,0.811 -0.329,1.587 -0.91,2.152c-3.069,2.981 -13.093,12.718 -17.485,16.984c-1.161,1.127 -3.012,1.114 -4.157,-0.031c-2.387,-2.386 -6.296,-6.296 -8.709,-8.709c-0.562,-0.562 -0.876,-1.325 -0.872,-2.12c0.003,-0.795 0.324,-1.555 0.892,-2.112c4.455,-4.373 14.545,-14.278 17.573,-17.25c0.561,-0.551 1.316,-0.859 2.102,-0.859c3.202,0 11.566,0 11.566,0Zm-7.907,2.462c-1.751,0.015 -3.45,1.017 -4.266,2.553c-0.708,1.331 -0.75,2.987 -0.118,4.356c0.836,1.812 2.851,3.021 4.882,2.809c2.042,-0.212 3.899,-1.835 4.304,-3.896c0.296,-1.503 -0.162,-3.136 -1.213,-4.251c-0.899,-0.953 -2.18,-1.548 -3.495,-1.57c-0.031,-0.001 -0.062,-0.001 -0.094,-0.001Zm0.008,2.519c1.105,0.007 2.142,0.849 2.343,1.961c0.069,0.384 0.043,0.786 -0.09,1.154c-0.393,1.079 -1.62,1.811 -2.764,1.536c-1.139,-0.274 -1.997,-1.489 -1.802,-2.67c0.177,-1.069 1.146,-1.963 2.27,-1.981c0.014,0 0.029,0 0.043,0Z" />

                                                <path
                                                    d="M48.625,13.137l0,4.001l3.362,0l0,11.945c0,0.811 -0.328,1.587 -0.909,2.152c-3.069,2.981 -13.093,12.717 -17.485,16.983c-1.161,1.128 -3.013,1.114 -4.157,-0.03l-0.034,-0.034l-1.016,0.993c-0.663,0.646 -1.437,1.109 -2.259,1.389l1.174,1.174c2.327,2.327 6.093,2.35 8.447,0.051c5.91,-5.768 16.235,-15.845 19.335,-18.87c0.578,-0.565 0.904,-1.339 0.904,-2.147c0,-4.227 0,-17.607 0,-17.607l-7.362,0Z" />

                                            </g>

                                            <g id="spinner--loading--dots-" serif:id="spinner [loading, dots]">

                                            </g>

                                            <g id="react">

                                            </g>

                                            <g id="check-selected">

                                            </g>

                                            <g id="turn-off">

                                            </g>

                                            <g id="code-block">

                                            </g>

                                            <g id="user">

                                            </g>

                                            <g id="coffee-bean">

                                            </g>

                                            <g id="coffee-beans">

                                                <g id="coffee-bean1" serif:id="coffee-bean">

                                                </g>

                                            </g>

                                            <g id="coffee-bean-filled">

                                            </g>

                                            <g id="coffee-beans-filled">

                                                <g id="coffee-bean2" serif:id="coffee-bean">

                                                </g>

                                            </g>

                                            <g id="clipboard">

                                            </g>

                                            <g id="clipboard-paste">

                                            </g>

                                            <g id="clipboard-copy">

                                            </g>

                                            <g id="Layer1">

                                            </g>

                                        </g>

                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Category</span>
                            </a>
                        </li>
                        <li>
                            <a href=""
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        fill="#ffffff" version="1.1" id="Capa_1" class="w-5 h-5"
                                        viewBox="0 0 600.111 600.111" xml:space="preserve">
                                        <g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M537.423,52.562h-59.836V21.92c0-11.83-9.59-21.42-21.42-21.42s-21.42,9.59-21.42,21.42v30.642H165.364V21.92     c0-11.83-9.59-21.42-21.42-21.42s-21.42,9.59-21.42,21.42v30.642H62.688c-32.059,0-58.14,26.082-58.14,58.14v430.77     c0,32.059,26.082,58.14,58.14,58.14h474.737c32.059,0,58.139-26.081,58.139-58.14v-430.77     C595.563,78.643,569.481,52.562,537.423,52.562z M47.387,110.702c0-8.45,6.85-15.3,15.3-15.3h59.835v24.444     c0,11.83,9.59,21.42,21.42,21.42c11.83,0,21.42-9.59,21.42-21.42V95.401h269.384v24.444c0,11.83,9.59,21.42,21.42,21.42     s21.42-9.59,21.42-21.42V95.401h59.836c8.449,0,15.301,6.851,15.301,15.3v53.856H47.387V110.702z M552.724,541.471     c0,8.45-6.85,15.301-15.301,15.301H62.688c-8.451,0-15.3-6.851-15.3-15.301V207.397h505.336V541.471L552.724,541.471z" />
                                                    <path
                                                        d="M537.425,600.111H62.688c-32.334,0-58.64-26.306-58.64-58.64v-430.77c0-32.334,26.306-58.64,58.64-58.64h59.336V21.92     c0-12.087,9.833-21.92,21.92-21.92c12.086,0,21.92,9.833,21.92,21.92v30.142h268.383V21.92c0-12.087,9.833-21.92,21.92-21.92     s21.92,9.833,21.92,21.92v30.142h59.336c32.335,0,58.641,26.306,58.641,58.64v430.77     C596.063,573.806,569.758,600.111,537.425,600.111z M62.688,53.062c-31.783,0-57.64,25.857-57.64,57.64v430.77     c0,31.782,25.857,57.64,57.64,57.64h474.737c31.782,0,57.639-25.857,57.639-57.64v-430.77c0-31.783-25.857-57.64-57.641-57.64     h-60.336V21.92c0-11.535-9.385-20.92-20.92-20.92s-20.92,9.385-20.92,20.92v31.142H164.864V21.92     c0-11.535-9.385-20.92-20.92-20.92s-20.92,9.385-20.92,20.92v31.142H62.688z M537.423,557.271H62.688     c-8.712,0-15.8-7.088-15.8-15.801V206.897h506.336v334.573C553.224,550.184,546.136,557.271,537.423,557.271z M47.887,207.897     v333.573c0,8.161,6.639,14.801,14.8,14.801h474.735c8.161,0,14.801-6.64,14.801-14.801V207.897H47.887z M553.224,165.058H46.887     v-54.356c0-8.712,7.088-15.8,15.8-15.8h60.335v24.944c0,11.535,9.385,20.92,20.92,20.92c11.535,0,20.92-9.385,20.92-20.92V94.901     h270.384v24.944c0,11.535,9.385,20.92,20.92,20.92s20.92-9.385,20.92-20.92V94.901h60.336c8.713,0,15.801,7.088,15.801,15.8     V165.058z M47.887,164.058h504.336v-53.356c0-8.161-6.64-14.8-14.801-14.8h-59.336v23.944c0,12.086-9.833,21.92-21.92,21.92     s-21.92-9.833-21.92-21.92V95.901H165.863v23.944c0,12.086-9.833,21.92-21.92,21.92s-21.92-9.833-21.92-21.92V95.901H62.688     c-8.161,0-14.8,6.639-14.8,14.8V164.058z" />
                                                </g>
                                                <g>
                                                    <path
                                                        d="M292.914,534.512h18.691c32.059,0,58.141-26.081,58.141-58.14v-18.691c0-32.058-26.082-58.14-58.141-58.14h-18.691     c-32.058,0-58.14,26.082-58.14,58.14v18.691C234.774,508.431,260.855,534.512,292.914,534.512z M277.614,457.681     c0-8.436,6.864-15.3,15.3-15.3h18.691c8.438,0,15.301,6.864,15.301,15.3v18.691c0,8.437-6.863,15.3-15.301,15.3h-18.691     c-8.436,0-15.3-6.863-15.3-15.3V457.681L277.614,457.681z" />
                                                    <path
                                                        d="M311.604,535.012h-18.691c-32.334,0-58.64-26.306-58.64-58.64v-18.691c0-32.334,26.306-58.64,58.64-58.64h18.691     c32.335,0,58.641,26.306,58.641,58.64v18.691C370.245,508.706,343.939,535.012,311.604,535.012z M292.914,400.041     c-31.783,0-57.64,25.857-57.64,57.64v18.691c0,31.782,25.857,57.64,57.64,57.64h18.691c31.783,0,57.641-25.857,57.641-57.64     v-18.691c0-31.782-25.857-57.64-57.641-57.64H292.914z M311.604,492.172h-18.691c-8.712,0-15.8-7.088-15.8-15.8v-18.691     c0-8.712,7.088-15.8,15.8-15.8h18.691c8.713,0,15.801,7.088,15.801,15.8v18.691C327.405,485.084,320.317,492.172,311.604,492.172     z M292.914,442.881c-8.161,0-14.8,6.64-14.8,14.8v18.691c0,8.16,6.639,14.8,14.8,14.8h18.691c8.161,0,14.801-6.64,14.801-14.8     v-18.691c0-8.16-6.64-14.8-14.801-14.8H292.914z" />
                                                </g>
                                                <g>
                                                    <path
                                                        d="M126.036,534.512h18.691c32.059,0,58.14-26.081,58.14-58.14v-18.691c0-32.058-26.082-58.14-58.14-58.14h-18.691     c-32.059,0-58.14,26.082-58.14,58.14v18.691C67.896,508.431,93.977,534.512,126.036,534.512z M110.735,457.681     c0-8.436,6.864-15.3,15.3-15.3h18.691c8.437,0,15.3,6.864,15.3,15.3v18.691c0,8.437-6.863,15.3-15.3,15.3h-18.691     c-8.437,0-15.3-6.863-15.3-15.3V457.681L110.735,457.681z" />
                                                    <path
                                                        d="M144.727,535.012h-18.691c-32.334,0-58.64-26.306-58.64-58.64v-18.691c0-32.334,26.306-58.64,58.64-58.64h18.691     c32.334,0,58.64,26.306,58.64,58.64v18.691C203.367,508.706,177.061,535.012,144.727,535.012z M126.036,400.041     c-31.783,0-57.64,25.857-57.64,57.64v18.691c0,31.782,25.857,57.64,57.64,57.64h18.691c31.783,0,57.64-25.857,57.64-57.64     v-18.691c0-31.782-25.857-57.64-57.64-57.64H126.036z M144.727,492.172h-18.691c-8.712,0-15.8-7.088-15.8-15.8v-18.691     c0-8.712,7.088-15.8,15.8-15.8h18.691c8.712,0,15.8,7.088,15.8,15.8v18.691C160.526,485.084,153.438,492.172,144.727,492.172z      M126.036,442.881c-8.161,0-14.8,6.64-14.8,14.8v18.691c0,8.16,6.639,14.8,14.8,14.8h18.691c8.161,0,14.8-6.64,14.8-14.8v-18.691     c0-8.16-6.639-14.8-14.8-14.8H126.036z" />
                                                </g>
                                                <g>
                                                    <path
                                                        d="M458.894,534.512h18.691c32.057,0,58.139-26.081,58.139-58.14v-18.691c0-32.058-26.082-58.14-58.139-58.14h-18.691     c-32.059,0-58.141,26.082-58.141,58.14v18.691C400.753,508.431,426.835,534.512,458.894,534.512z M443.593,457.681     c0-8.436,6.863-15.3,15.301-15.3h18.691c8.436,0,15.299,6.864,15.299,15.3v18.691c0,8.437-6.863,15.3-15.299,15.3h-18.691     c-8.438,0-15.301-6.863-15.301-15.3V457.681z" />
                                                    <path
                                                        d="M477.585,535.012h-18.691c-32.335,0-58.641-26.306-58.641-58.64v-18.691c0-32.334,26.306-58.64,58.641-58.64h18.691     c32.333,0,58.639,26.306,58.639,58.64v18.691C536.224,508.706,509.918,535.012,477.585,535.012z M458.894,400.041     c-31.783,0-57.641,25.857-57.641,57.64v18.691c0,31.782,25.857,57.64,57.641,57.64h18.691c31.782,0,57.639-25.857,57.639-57.64     v-18.691c0-31.782-25.856-57.64-57.639-57.64H458.894z M477.585,492.172h-18.691c-8.713,0-15.801-7.088-15.801-15.8v-18.691     c0-8.712,7.088-15.8,15.801-15.8h18.691c8.712,0,15.799,7.088,15.799,15.8v18.691     C493.384,485.084,486.297,492.172,477.585,492.172z M458.894,442.881c-8.161,0-14.801,6.64-14.801,14.8v18.691     c0,8.16,6.64,14.8,14.801,14.8h18.691c8.16,0,14.799-6.64,14.799-14.8v-18.691c0-8.16-6.639-14.8-14.799-14.8H458.894z" />
                                                </g>
                                                <g>
                                                    <path
                                                        d="M292.914,367.742h18.691c32.059,0,58.141-26.082,58.141-58.14v-18.691c0-32.059-26.082-58.14-58.141-58.14h-18.691     c-32.058,0-58.14,26.082-58.14,58.14v18.691C234.774,341.66,260.855,367.742,292.914,367.742z M277.614,290.911     c0-8.437,6.864-15.3,15.3-15.3h18.691c8.438,0,15.301,6.863,15.301,15.3v18.691c0,8.437-6.863,15.3-15.301,15.3h-18.691     c-8.436,0-15.3-6.863-15.3-15.3V290.911L277.614,290.911z" />
                                                    <path
                                                        d="M311.604,368.242h-18.691c-32.334,0-58.64-26.306-58.64-58.64v-18.691c0-32.334,26.306-58.64,58.64-58.64h18.691     c32.335,0,58.641,26.306,58.641,58.64v18.691C370.245,341.937,343.939,368.242,311.604,368.242z M292.914,233.271     c-31.783,0-57.64,25.857-57.64,57.64v18.691c0,31.782,25.857,57.64,57.64,57.64h18.691c31.783,0,57.641-25.857,57.641-57.64     v-18.691c0-31.783-25.857-57.64-57.641-57.64H292.914z M311.604,325.402h-18.691c-8.712,0-15.8-7.088-15.8-15.8v-18.691     c0-8.712,7.088-15.8,15.8-15.8h18.691c8.713,0,15.801,7.088,15.801,15.8v18.691C327.405,318.314,320.317,325.402,311.604,325.402     z M292.914,276.111c-8.161,0-14.8,6.639-14.8,14.8v18.691c0,8.16,6.639,14.8,14.8,14.8h18.691c8.161,0,14.801-6.64,14.801-14.8     v-18.691c0-8.161-6.64-14.8-14.801-14.8H292.914z" />
                                                </g>
                                                <g>
                                                    <path
                                                        d="M458.894,367.742h18.691c32.057,0,58.139-26.082,58.139-58.14v-18.691c0-32.059-26.082-58.14-58.139-58.14h-18.691     c-32.059,0-58.141,26.082-58.141,58.14v18.691C400.753,341.66,426.835,367.742,458.894,367.742z M443.593,290.911     c0-8.437,6.863-15.3,15.301-15.3h18.691c8.436,0,15.299,6.863,15.299,15.3v18.691c0,8.437-6.863,15.3-15.299,15.3h-18.691     c-8.438,0-15.301-6.863-15.301-15.3V290.911z" />
                                                    <path
                                                        d="M477.585,368.242h-18.691c-32.335,0-58.641-26.306-58.641-58.64v-18.691c0-32.334,26.306-58.64,58.641-58.64h18.691     c32.333,0,58.639,26.306,58.639,58.64v18.691C536.224,341.937,509.918,368.242,477.585,368.242z M458.894,233.271     c-31.783,0-57.641,25.857-57.641,57.64v18.691c0,31.782,25.857,57.64,57.641,57.64h18.691c31.782,0,57.639-25.857,57.639-57.64     v-18.691c0-31.783-25.856-57.64-57.639-57.64H458.894z M477.585,325.402h-18.691c-8.713,0-15.801-7.088-15.801-15.8v-18.691     c0-8.712,7.088-15.8,15.801-15.8h18.691c8.712,0,15.799,7.088,15.799,15.8v18.691     C493.384,318.314,486.297,325.402,477.585,325.402z M458.894,276.111c-8.161,0-14.801,6.639-14.801,14.8v18.691     c0,8.16,6.64,14.8,14.801,14.8h18.691c8.16,0,14.799-6.64,14.799-14.8v-18.691c0-8.161-6.639-14.8-14.799-14.8H458.894z" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">valider les événements </span>

                            </a>
                        </li>
                        <li>
                            <a href="{{route('user.index')}}"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" 
                                        class="w-5 h-5" viewBox="0 0 32 32" id="icon">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: none;
                                                }
                                            </style>
                                        </defs>
                                        <title>events</title>
                                        <path
                                            d="M26,14H24v2h2a3.0033,3.0033,0,0,1,3,3v4h2V19A5.0058,5.0058,0,0,0,26,14Z"
                                            transform="translate(0 0)" />
                                        <path d="M24,4a3,3,0,1,1-3,3,3,3,0,0,1,3-3m0-2a5,5,0,1,0,5,5A5,5,0,0,0,24,2Z"
                                            transform="translate(0 0)" />
                                        <path
                                            d="M23,30H21V28a3.0033,3.0033,0,0,0-3-3H14a3.0033,3.0033,0,0,0-3,3v2H9V28a5.0059,5.0059,0,0,1,5-5h4a5.0059,5.0059,0,0,1,5,5Z"
                                            transform="translate(0 0)" />
                                        <path d="M16,13a3,3,0,1,1-3,3,3,3,0,0,1,3-3m0-2a5,5,0,1,0,5,5A5,5,0,0,0,16,11Z"
                                            transform="translate(0 0)" />
                                        <path d="M8,14H6a5.0059,5.0059,0,0,0-5,5v4H3V19a3.0033,3.0033,0,0,1,3-3H8Z"
                                            transform="translate(0 0)" />
                                        <path d="M8,4A3,3,0,1,1,5,7,3,3,0,0,1,8,4M8,2a5,5,0,1,0,5,5A5,5,0,0,0,8,2Z"
                                            transform="translate(0 0)" />
                                        <rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;"
                                            class="cls-1" width="32" height="32" />
                                    </svg>

                                    <g id="User / Users_Group">
                                        <path id="Vector"
                                            d="M17 20C17 18.3431 14.7614 17 12 17C9.23858 17 7 18.3431 7 20M21 17.0004C21 15.7702 19.7659 14.7129 18 14.25M3 17.0004C3 15.7702 4.2341 14.7129 6 14.25M18 10.2361C18.6137 9.68679 19 8.8885 19 8C19 6.34315 17.6569 5 16 5C15.2316 5 14.5308 5.28885 14 5.76389M6 10.2361C5.38625 9.68679 5 8.8885 5 8C5 6.34315 6.34315 5 8 5C8.76835 5 9.46924 5.28885 10 5.76389M12 14C10.3431 14 9 12.6569 9 11C9 9.34315 10.3431 8 12 8C13.6569 8 15 9.34315 15 11C15 12.6569 13.6569 14 12 14Z"
                                            stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">gérer les utilisateurs </span>

                            </a>
                        </li>
                    </ul>
                    <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2024</p>
                </div>
            </div>
            <!-- ./Sidebar -->

            <main class="h-full ml-14 mt-14 mb-10 md:ml-64">
                {{ $slot }}
            </main>
        </div>
    </div>
    @stack('scripts')
</body>

</html>
<!-- component -->
