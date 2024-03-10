<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Styles -->
    <style>
        .bg-custom {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/storage/event.jpg');
        }
    </style>
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900">
    <div class="relative flex justify-center items-center min-h-screen bg-custom bg-cover bg-center bg-no-repeat">
        <div class="absolute top-0 right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="font-semibold text-gray-200 hover:text-gray-900 dark:text-gray-200 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}"
                    class="font-semibold text-gray-200 hover:text-gray-900 border p-2 border-white dark:text-gray-200 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 font-semibold text-gray-200 border p-2 border-white hover:text-gray-900 dark:text-gray-200 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
        <div class="relative z-20 max-w-screen-lg mx-auto grid grid-cols-12 h-full items-center">
            <div class="col-span-6">
                <h1 class="text-white font-extrabold text-5xl mb-8">Upcoming Events</h1>
                <p class="text-stone-100  text-xl mb-10">
                    Stay informed about the latest events hosted by Hospital Consultancy. Whether it's workshops, seminars, or conferences, discover opportunities to enhance your knowledge and network with industry professionals.
                </p>
                {{-- <a href="{{ route('login') }}" class="mt-8 text-white uppercase py-4 text-base font-light px-10 border border-white hover:bg-white hover:bg-opacity-10">log in</a> --}}
            </div>
          </div>
    </div>
</body>

</html>