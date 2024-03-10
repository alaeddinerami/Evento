<x-client-navbar>
    <h1 class="text-center mt-5 text-2xl text-black font-bold ">Categories</h1>
    <div class="m-5 gap-5 flex justify-center flex-wrap">
        @foreach ($categories as $category)
            <form action=" {{ route('client.filter') }}" method="post">
                @csrf

                <button type="submit" value="{{ $category->id }}" name='category'
                    class="px-6 py-2 rounded-full text-black text-sm tracking-wider font-medium outline-none border-2 border-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300">{{ $category->name }}</button>
            </form>
        @endforeach
    </div>
    <h1 class="text-center text-2xl text-black font-bold ">Events</h1>
    <div class="mt-5  flex flex-wrap gap-4">
        @foreach ($events as $event)
            @if (!$event->isValidByAdmin == 'accepted')
                <h1>sdvds</h1>
            @else
                <a href="{{ route('clientevent.show', $event) }}"
                    class="max-w-sm mx-auto min-w-[22rem] group bg-slate-200 rounded-lg hover:no-underline focus:no-underline dark:bg-gray-900 ">

                    <img role="presentation" class="object-cover w-full rounded h-44 dark:bg-gray-500"
                        src="{{ asset('storage/' . $event->image->path) }}">

                    <div class="p-6 space-y-2">
                        <h3 class="text-2xl text-black font-semibold group-hover:underline group-focus:underline">
                            {{ $event->title }}</h3>

                        <span
                            class="text-xs dark:text-gray-400">{{ \Carbon\Carbon::parse($event->date)->formatLocalized('%d %B %Y') }}</span>
                        <p>{{ Str::limit($event->description, 90, '...') }}</p>
                        
                        <div class="flex gap-4">
                            <svg xmlns="" class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                <path d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            <span> {{ $event->lieu }}</span>
                        </div>
                        <div class="flex gap-4">
                            <svg xmlns="" class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                <path d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z"
                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z"
                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z"
                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z"
                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />

                            </svg>
                            <span> {{ $event->categories->name }}</span>
                        </div>
                        <div class="flex gap-4">
                            <svg xmlns="" class="w-5 h-5"
                                viewBox="0 0 1024 1024" class="icon" version="1.1">
                                <path
                                    d="M406.162286 94.061714l12.653714 65.316572a365.933714 365.933714 0 0 0-267.264 501.540571l-61.220571 25.892572a432.420571 432.420571 0 0 1 315.830857-592.749715z m-193.828572 757.028572l42.569143-51.2a364.105143 364.105143 0 0 0 233.764572 84.48c87.771429 0 170.642286-31.012571 236.251428-86.528l43.008 50.761143A430.665143 430.665143 0 0 1 488.594286 950.857143a430.665143 430.665143 0 0 1-276.260572-99.766857z m426.422857-666.331429a135.68 135.68 0 1 1 7.753143-68.754286 432.713143 432.713143 0 0 1 268.873143 332.8c1.462857 9.069714 2.706286 21.065143 3.803429 35.986286a31.451429 31.451429 0 0 1-31.451429 33.718857 34.889143 34.889143 0 0 1-34.816-32.329143 366.153143 366.153143 0 0 0-214.162286-301.348571z m-126.464 29.403429a78.555429 78.555429 0 1 0 0-157.037715 78.555429 78.555429 0 0 0 0 157.037715z m-320.658285 672.914285a135.68 135.68 0 1 1 0-271.286857 135.68 135.68 0 0 1 0 271.36z m0-57.051428a78.555429 78.555429 0 1 0 0-157.110857 78.555429 78.555429 0 0 0 0 157.110857z m640.731428 57.051428a135.68 135.68 0 1 1 0-271.286857 135.68 135.68 0 0 1 0 271.36z m0-57.051428a78.555429 78.555429 0 1 0 0-157.110857 78.555429 78.555429 0 0 0 0 157.110857z"
                                    fill="#000000" />
                            </svg>
                            <span> {{ $event->typeValidation }} </span>
                        </div>
                    </div>

                </a>
            @endif
        @endforeach
    </div>
    <div class="m-5">
        {{ $events->links() }}
    </div>
</x-client-navbar>
