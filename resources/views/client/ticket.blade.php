<x-client-navbar>
    <div class="font-staatliches text-black text-sm">
        <div class=" m-5 md:min-h-screen flex items-center justify-center">
            <div class="ticket bg-blue-100 flex flex-col md:flex-row shadow-lg">
                <div class="left flex flex-col md:flex-row">
                    <div class="rounded-xl md:h-96 md:w-96 h-64 md:bg-cover md:bg-center relative"
                        style="background-image: url('{{ asset('storage/' . $reservation->events->image->path) }}');">
                        <div class="admit-one absolute top-0 left-0 text-darkgray h-full px-10 flex flex-col justify-around items-center text-center writing-mode-vertical-rl transform -rotate-180">
                           
                        </div>
                        <div class="ticket-number h-full w-full flex justify-end items-end p-5">
                            <p class="text-black">#20030220</p>
                        </div>
                    </div>
                    <div class="ticket-info p-10 flex flex-col justify-between text-center md:text-left">
                        <div class="show-name mb-5">
                            <h2 class="text-black text-3xl">{{$reservation->events->title }}</h2>
                            <h1 class="text-blue-600 text-5xl font-nanumpenscript"></h1>
                        </div>
                        <p class="border-t border-b border-gray-400 py-5 flex items-center justify-around">
                            <span class="text-black text-xl">{{ \Carbon\Carbon::parse($reservation->events->date)->formatLocalized('%d %B %Y') }}</span>
                        </p>
                        <div class="py-5">
                            <pre class="mb-3 font-bold text-black">Name:  {{$reservation->clients->users->name }}</pre>
                            <pre class="mb-3 font-bold text-black">Email: {{$reservation->clients->users->email }}</pre>
                            <pre class="mb-3 font-bold text-black">Location: {{$reservation->events->lieu }}</pre>
                        </div>
                        <p class="flex justify-around items-start border-t border-gray-400 pt-2">
                            <span class="separator text-4xl text-black"><i class="far fa-smile"></i></span>
                            <span>Created by: {{$reservation->events->organizers->users->name }}</span>
                        </p>
                    </div>
                </div>
                <div class="right w-full md:w-72 md:border-l md:border-dashed md:border-gray-400">
                    <div class="right-info-container p-10 flex flex-col justify-around items-center">
                        <div class="show-name">
                            <h1 class="text-black text-2xl">EVENT CREATIVE</h1>
                        </div>
                        <div class="time mb-5">
                            <p class="font-bold text-purple-800">8:00 PM <span class="text-black">TO</span> 11:00 PM</p>
                            <p class="font-bold text-purple-800">DOORS <span class="text-black">@</span> 7:00 PM</p>
                        </div>
                        <div class="barcode mb-5">
                            <img src="https://external-preview.redd.it/cg8k976AV52mDvDb5jDVJABPrSZ3tpi1aXhPjgcDTbw.png?auto=webp&s=1c205ba303c1fa0370b813ea83b9e1bddb7215eb" alt="QR code" class="h-24">
                        </div>
                        <p class="ticket-number text-gray-500">#20030220</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-client-navbar>
