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
                        <td class="px-8 py-4 whitespace-nowrap text-center text-sm font-medium">

                            <div class="text-teal-500 hover:text-teal-700">
                                <div class="m-8 space-y-4">
                                    <div class="flex items-baseline">
                                        <div>
                                            <div class="flex space-x-4 items-baseline">
                                                <div class="rounded-full flex bg-gray-500 border border-gray-300 py-2 px-4 space-x-4">
                                                    <div>
                                                        <input type="radio" name="rdo2" id="yes2" class="peer hidden">
                                                        <label for="yes2" class="cursor-pointer peer-checked:text-red-700 peer-checked:cursor-default text-gray-400">Yes</label>
                                                    </div>
                                                    <div>
                                                        <input type="radio" name="rdo2" id="no2" class="peer hidden">
                                                        <label for="no2" class="cursor-pointer peer-checked:text-green-700 peer-checked:cursor-default text-gray-400">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
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
</x-dashboard>