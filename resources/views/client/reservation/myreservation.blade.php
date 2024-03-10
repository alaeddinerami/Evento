<x-client-navbar>
    
        
    <div class="w-11/12 mx-auto flex flex-col items-start justify-start mt-8 text-gray-900">
        <div class="flex items-center flex-wrap">
            <ul class="flex items-center">
                <li class="inline-flex items-center">
                    <div class="hover:text-blue-500">
                        <svg class="w-5 h-auto fill-current " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="#000000">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path
                                d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z" />
                        </svg>
                    </div>
                    <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
                </li>
                <li class="inline-flex items-center">
                    <a href="" class="hover:text-blue-500">{{ Auth::user()->name }}</a>
                    <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
                </li>
                <li class="inline-flex items-center">
                    <a href="" class="hover:text-blue-500">My reservatios</a>
                </li>
            </ul>
        </div>
        <div class="shadow-lg border-t-2 rounded-lg w-full p-2 mt-8">
            {{-- table copy it from actors --}}
            <table id="table" class="min-w-full divide-y divide-gray-200 stripe hover"
                style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1"
                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID</th>
                        <th data-priority="1"
                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Events Titel</th>
                        <th data-priority="1"
                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Event datee</th>
                        <th data-priority="1"
                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            organiser Name</th>
                        <th data-priority="1"
                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Acceptation</th>

                        <th data-priority="1"
                            class="px-6 py-3 bg-gray-50 text-left  text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action</th>

                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $reservation->id }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $reservation->events->title }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $reservation->events->date }}
                                </div>
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $reservation->events->organizers->users->name }}
                                </div>
                            </td>
                            @if($reservation->status == 0)
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    pendding
                                </div>
                            </td>
                            @else
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    Accepted
                                </div>
                            </td>
                            @endif

                            <td class="px-8 py-4  whitespace-nowrap text-center text-sm font-medium">
                                @if ($reservation->status == 1)
                                    <a href="{{ route('reservation.show', $reservation) }}"
                                         class="inline-block">
                                       
                                        <button type="submit" class="text-green-600 hover:text-green-500 mr-4">
                                           get tecket</button>
                                    </a>
                                @endif
                                

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var table = $('#table').DataTable({
                    responsive: true,
                    pageLength: 5,
                    lengthMenu: [
                        [5],
                        [5]
                    ]
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
</x-client-navbar>
