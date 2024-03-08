<x-client-navbar>
    <div class="m-5 gap-5 flex justify-center">
        @foreach($categories as $category)
        <form action=" {{ route('client.filter') }}" method="post">
            @csrf
            
        <button type="submit" value="{{ $category->id }}" name='category'
            class="px-6 py-2 rounded-full text-black text-sm tracking-wider font-medium outline-none border-2 border-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300">{{$category->name}}</button>
           </form>
            @endforeach
        </div>
    <h1 class="text-center text-3xl text-black font-semibold ">Events</h1>
    <div class="mt-5  flex flex-wrap gap-4">
        @foreach ($events as $event)
            @if (!$event->isValidByAdmin == 'accepted')
                <h1>sdvds</h1>
            @else
                <a href="{{route('client.show',$event)}}"
                    class="max-w-sm mx-auto min-w-[22rem] group bg-slate-200 rounded-lg hover:no-underline focus:no-underline dark:bg-gray-900 ">

                    <img role="presentation" class="object-cover w-full rounded h-44 dark:bg-gray-500"
                        src="{{ asset('storage/' . $event->image->path) }}">

                    <div class="p-6 space-y-2">
                        <h3 class="text-2xl text-black font-semibold group-hover:underline group-focus:underline">
                            {{ $event->title }}</h3>
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
