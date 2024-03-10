<x-organiser-dashboard>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
        <div
            class="bg-blue-500 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 text-white font-medium group">
            <div
                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="stroke-current text-blue-800 transform transition-transform duration-500 ease-in-out">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
            </div>
            <div class="text-right">
                @if ($reservationTotals > 0)
                    <p class="text-2xl">{{ $reservationTotals }}</p>
                @else
                    0
                @endif
                <p>Resevation number</p>
            </div>
        </div>
    </div>
    <div class="font-[sans-serif] m-5 text-gray-800 bg-gray-100 px-6 py-12">
        <div class="grid lg:grid-cols-2 gap-8 max-lg:max-w-2xl mx-auto">
            <div class="text-left">
                <h2 class="text-4xl font-extrabold mb-6">{{ $event->title }}</h2>
                <p class="mb-4 text-sm">{{ $event->description }}</p>

                <div class="grid xl:grid-cols-3 sm:grid-cols-2 gap-8 mt-12">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" class="fill-green-500 shrink-0"
                            viewBox="0 0 24 24">
                            <path
                                d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"
                                data-original="#000000"></path>
                        </svg>
                        <h6 class="text-base font-semibold ml-4">{{ $event->lieu }}</h6>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" class="fill-green-500 shrink-0"
                            viewBox="0 0 24 24">
                            <path
                                d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"
                                data-original="#000000"></path>
                        </svg>
                        <h6 class="text-base font-semibold ml-4">{{ $event->date }}</h6>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" class="fill-green-500 shrink-0"
                            viewBox="0 0 24 24">
                            <path
                                d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"
                                data-original="#000000"></path>
                        </svg>
                        <h6 class="text-base font-semibold ml-4">{{ $event->placesdisponible }}</h6>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" class="fill-green-500 shrink-0"
                            viewBox="0 0 24 24">
                            <path
                                d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"
                                data-original="#000000"></path>
                        </svg>
                        <h6 class="text-base font-semibold ml-4">{{ $event->categories->name }}</h6>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" class="fill-green-500 shrink-0"
                            viewBox="0 0 24 24">
                            <path
                                d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"
                                data-original="#000000"></path>
                        </svg>
                        <h6 class="text-base font-semibold ml-4">{{ $event->organizers->users->name }}</h6>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" class="fill-green-500 shrink-0"
                            viewBox="0 0 24 24">
                            <path
                                d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"
                                data-original="#000000"></path>
                        </svg>
                        <h6 class="text-base font-semibold ml-4">{{ $event->typeValidation }}</h6>
                    </div>

                </div>

            </div>
            <div class="flex justify-center items-center">
                <img src="{{ asset('storage/' . $event->image->path) }}" alt="Placeholder Image"
                    class="rounded-lg object-cover w-full h-full" />
            </div>
        </div>
    </div>





</x-organiser-dashboard>
