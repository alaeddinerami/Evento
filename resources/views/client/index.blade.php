<x-client-navbar>



    <div class="mt-5  flex flex-wrap gap-4">
        @foreach ($events as $event)
            @if (!$event->isValidByAdmin == 'accepted')
                <h1>sdvds</h1>
            @else
                <a href=""
                    class="max-w-sm mx-auto min-w-[22rem] group bg-slate-200 rounded-lg hover:no-underline focus:no-underline dark:bg-gray-900 ">

                    <img role="presentation" class="object-cover w-full rounded h-44 dark:bg-gray-500"
                        src="{{ asset('storage/' . $event->image->path) }}">

                    <div class="p-6 space-y-2">
                        <h3 class="text-2xl font-semibold group-hover:underline group-focus:underline">
                            {{ $event->titel }}</h3>
                        <span class="text-xs dark:text-gray-400">{{ $event->date }}</span>
                        <p>{{ Str::limit($event->description, 90, '...') }}</p>
                        <p>{{ $event->lieu }}</p>
                        <p>{{ $event->categories->name }}</p>
                    </div>

                </a>
            @endif
        @endforeach
    </div>
    <div class="m-5">
        {{ $events->links() }}
    </div>
</x-client-navbar>
