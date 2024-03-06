<x-dashboard>
    <div class="w-11/12 mx-auto flex flex-col items-start justify-start mt-8 text-gray-900">
        <div class="flex items-center flex-wrap">
            <ul class="flex items-center">
                <li class="inline-flex items-center">
                    <a href="/dashboard" class="hover:text-blue-500">
                        <svg class="w-5 h-auto fill-current " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="#000000">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path
                                d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z" />
                        </svg>
                    </a>
                    <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
                </li>
                <li class="inline-flex items-center">
                    <a href="" class="hover:text-blue-500">Dashboard</a>
                    <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
                </li>
                <li class="inline-flex items-center">
                    <a href="" class="hover:text-blue-500">users</a>
                </li>
            </ul>
        </div>
        
        <div class="shadow-lg border-t-2 rounded-lg w-full p-2 mt-8">
            <h3>Client</h3>
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
                            Name</th>
                        <th data-priority="1"
                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status</th>
                        <th data-priority="1"
                            class="px-6 py-3 bg-gray-50 text-left  text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action</th>

                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($clients as $client)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $client->id }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $client->users->name }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                            @if($client->isBanned)
                            <p>banned</p>
                            @else
                            <p>permitted</p>
                            @endif
                        <td class="px-8 py-4 whitespace-nowrap text-center text-sm font-medium">
                            @if(!$client->isBanned)                            
                            <button data-modal-target="ban-modal" data-modal-toggle="ban-modal" class="text-white bg-green-800   font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2" onclick="openEditModal({{ $client->id }})">
                                Ban
                            </button>
                            @else
                            <button  class="text-white bg-red-800   font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2" onclick="openEditModal({{ $client->id }})">
                                Unban
                            </button>
                            @endif                         
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- ban model --}}
    <form id="ban-modal" method="post" action="" tabindex="-1"  class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        
        @csrf
        @method('patch')
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="ban-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you ?</h3>
                    <button data-modal-hide="ban-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="ban-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                </div>
            </div>
        </div>
    </form>
    @stack('scripts')
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
     @push('vite')
     @vite('resources/js/client_ban_modal.js')
     @endpush
</x-dashboard>