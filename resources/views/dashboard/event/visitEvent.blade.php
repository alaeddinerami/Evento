<x-dashboard>
    @push('vite')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
    @endpush
    @if (session()->has('message'))
        @push('scripts')
            <script>
                Swal.fire({
                    title: '{{ session('operationSuccessful') ? 'Success' : 'Error' }}!',
                    icon: '{{ session('operationSuccessful') ? 'success' : 'error' }}',
                    confirmButtonText: 'Ok',
                    html: '{{ session('message') }}'
                })
            </script>
        @endpush
    @endif
    <div class="font-[sans-serif] m-5 text-gray-800 bg-gray-200 mt-5 rounded-2xl  px-6 py-12">
        <div class="grid lg:grid-cols-2 gap-8 max-lg:max-w-2xl mx-auto">
            <div class="text-left">
                <h2 class="text-4xl font-extrabold mb-6">{{ $event->title }}</h2>
                <p class="mb-4 text-sm">{{ $event->description }}</p>

                <div class="grid xl:grid-cols-3 sm:grid-cols-2 gap-8 mt-12">
                    <div class="flex items-center">
                        <svg xmlns="" class="w-7 h-7" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <h6 class="text-base font-semibold ml-4">{{ $event->lieu }}</h6>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7"
                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="_x32_"
                            viewBox="0 0 512 512" xml:space="preserve">
                            <style type="text/css">
                                .st0 {
                                    fill: #000000;
                                }
                            </style>
                            <g>
                                <rect x="119.256" y="222.607" class="st0" width="50.881" height="50.885" />
                                <rect x="341.863" y="222.607" class="st0" width="50.881" height="50.885" />
                                <rect x="267.662" y="222.607" class="st0" width="50.881" height="50.885" />
                                <rect x="119.256" y="302.11" class="st0" width="50.881" height="50.885" />
                                <rect x="267.662" y="302.11" class="st0" width="50.881" height="50.885" />
                                <rect x="193.46" y="302.11" class="st0" width="50.881" height="50.885" />
                                <rect x="341.863" y="381.612" class="st0" width="50.881" height="50.885" />
                                <rect x="267.662" y="381.612" class="st0" width="50.881" height="50.885" />
                                <rect x="193.46" y="381.612" class="st0" width="50.881" height="50.885" />
                                <path class="st0"
                                    d="M439.277,55.046h-41.376v39.67c0,14.802-12.195,26.84-27.183,26.84h-74.025   c-14.988,0-27.182-12.038-27.182-26.84v-39.67h-67.094v39.297c0,15.008-12.329,27.213-27.484,27.213h-73.424   c-15.155,0-27.484-12.205-27.484-27.213V55.046H72.649c-26.906,0-48.796,21.692-48.796,48.354v360.246   c0,26.661,21.89,48.354,48.796,48.354h366.628c26.947,0,48.87-21.692,48.87-48.354V103.4   C488.147,76.739,466.224,55.046,439.277,55.046z M453.167,462.707c0,8.56-5.751,14.309-14.311,14.309H73.144   c-8.56,0-14.311-5.749-14.311-14.309V178.089h394.334V462.707z" />
                                <path class="st0"
                                    d="M141.525,102.507h53.392c4.521,0,8.199-3.653,8.199-8.144v-73.87c0-11.3-9.27-20.493-20.666-20.493h-28.459   c-11.395,0-20.668,9.192-20.668,20.493v73.87C133.324,98.854,137.002,102.507,141.525,102.507z" />
                                <path class="st0"
                                    d="M316.693,102.507h54.025c4.348,0,7.884-3.513,7.884-7.826V20.178C378.602,9.053,369.474,0,358.251,0H329.16   c-11.221,0-20.349,9.053-20.349,20.178v74.503C308.81,98.994,312.347,102.507,316.693,102.507z" />
                            </g>
                        </svg>
                        <h6 class="text-base font-semibold ml-4">
                            {{ \Carbon\Carbon::parse($event->date)->formatLocalized('%d %B %Y') }}</h6>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none">
                            <path d="M17 21V16M7 21V16" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                            <path
                                d="M15.4998 12H8.49977C6.84985 12 6.02489 12 5.51233 12.5858C5.22645 12.9125 5.10002 13.3503 5.0441 14.0008C4.96666 14.9018 4.92793 15.3523 5.22514 15.6762C5.52235 16 6.01482 16 6.99977 16H16.9998C17.9847 16 18.4772 16 18.7744 15.6762C19.0716 15.3523 19.0329 14.9018 18.9554 14.0008C18.8995 13.3503 18.7731 12.9125 18.4872 12.5858C17.9746 12 17.1497 12 15.4998 12Z"
                                stroke="#1C274C" stroke-width="1.5" />
                            <path
                                d="M7 8C7 6.13077 7 5.19615 7.40192 4.5C7.66523 4.04394 8.04394 3.66523 8.5 3.40192C9.19615 3 10.1308 3 12 3C13.8692 3 14.8038 3 15.5 3.40192C15.9561 3.66523 16.3348 4.04394 16.5981 4.5C17 5.19615 17 6.13077 17 8V12H7V8Z"
                                stroke="#1C274C" stroke-width="1.5" />
                        </svg>
                        <h6 class="text-base font-semibold ml-4">{{ $event->placesdisponible }}</h6>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="" class="w-7 h-7" viewBox="0 0 24 24" fill="none">
                            <path d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />

                        </svg>
                        <h6 class="text-base font-semibold ml-4">{{ $event->categories->name }}</h6>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M11 15C10.1183 15 9.28093 14.8098 8.52682 14.4682C8.00429 14.2315 7.74302 14.1131 7.59797 14.0722C7.4472 14.0297 7.35983 14.0143 7.20361 14.0026C7.05331 13.9914 6.94079 14 6.71575 14.0172C6.6237 14.0242 6.5425 14.0341 6.46558 14.048C5.23442 14.2709 4.27087 15.2344 4.04798 16.4656C4 16.7306 4 17.0485 4 17.6841V19.4C4 19.9601 4 20.2401 4.10899 20.454C4.20487 20.6422 4.35785 20.7951 4.54601 20.891C4.75992 21 5.03995 21 5.6 21H8.4M15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7ZM12.5898 21L14.6148 20.595C14.7914 20.5597 14.8797 20.542 14.962 20.5097C15.0351 20.4811 15.1045 20.4439 15.1689 20.399C15.2414 20.3484 15.3051 20.2848 15.4324 20.1574L19.5898 16C20.1421 15.4477 20.1421 14.5523 19.5898 14C19.0376 13.4477 18.1421 13.4477 17.5898 14L13.4324 18.1574C13.3051 18.2848 13.2414 18.3484 13.1908 18.421C13.1459 18.4853 13.1088 18.5548 13.0801 18.6279C13.0478 18.7102 13.0302 18.7985 12.9948 18.975L12.5898 21Z"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <h6 class="text-base font-semibold ml-4">{{ $event->organizers->users->name }}</h6>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="" class="w-7 h-7" viewBox="0 0 1024 1024" class="icon" version="1.1">
                            <path
                                d="M406.162286 94.061714l12.653714 65.316572a365.933714 365.933714 0 0 0-267.264 501.540571l-61.220571 25.892572a432.420571 432.420571 0 0 1 315.830857-592.749715z m-193.828572 757.028572l42.569143-51.2a364.105143 364.105143 0 0 0 233.764572 84.48c87.771429 0 170.642286-31.012571 236.251428-86.528l43.008 50.761143A430.665143 430.665143 0 0 1 488.594286 950.857143a430.665143 430.665143 0 0 1-276.260572-99.766857z m426.422857-666.331429a135.68 135.68 0 1 1 7.753143-68.754286 432.713143 432.713143 0 0 1 268.873143 332.8c1.462857 9.069714 2.706286 21.065143 3.803429 35.986286a31.451429 31.451429 0 0 1-31.451429 33.718857 34.889143 34.889143 0 0 1-34.816-32.329143 366.153143 366.153143 0 0 0-214.162286-301.348571z m-126.464 29.403429a78.555429 78.555429 0 1 0 0-157.037715 78.555429 78.555429 0 0 0 0 157.037715z m-320.658285 672.914285a135.68 135.68 0 1 1 0-271.286857 135.68 135.68 0 0 1 0 271.36z m0-57.051428a78.555429 78.555429 0 1 0 0-157.110857 78.555429 78.555429 0 0 0 0 157.110857z m640.731428 57.051428a135.68 135.68 0 1 1 0-271.286857 135.68 135.68 0 0 1 0 271.36z m0-57.051428a78.555429 78.555429 0 1 0 0-157.110857 78.555429 78.555429 0 0 0 0 157.110857z"
                                fill="#000000" />
                        </svg>
                        <h6 class="text-base font-semibold ml-4">{{ $event->typeValidation }}</h6>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="w-7 h-7" viewBox="0 0 512 512" version="1.1">
                            <title>validate</title>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Combined-Shape" fill="#000000" transform="translate(64.000000, 63.999974)">
                                    <path d="M336.9,-1.42108547e-14 L306.419,42.666 L42.6666667,42.6666928 L42.6666667,341.333359 L341.333333,341.333359 L341.333,140.606 L384,80.872 L384,384.000026 L1.42108547e-14,384.000026 L1.42108547e-14,2.61499954e-05 L336.9,-1.42108547e-14 Z M345.307019,24.9336114 L380.026314,49.7331076 L205.714356,293.769849 L65.2539169,159.416386 L94.7460831,128.583667 L199.616,228.885359 L345.307019,24.9336114 Z M357.333333,2.61499954e-05 L357.333,7.308 L347.102,-1.42108547e-14 L357.333333,2.61499954e-05 Z">
                        
                        </path>
                                </g>
                            </g>
                        </svg>
                        <h6 class="text-base font-semibold ml-4">{{ $event->isValidByAdmin}}</h6>
                    </div>
                   

                </div>
                <Div class="flex mt-10 justify-evenly">
                <form method="POST" action="{{ route('admin.validateEvent', $event) }}">
                    @csrf
                    @method('put')
                    <button type="submit"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Accept
                    </button>
                </form>
                <form action="{{ route('admin.rejectEvent', $event->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('put')
                    <button type="submit"
                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Reject</button>
                </form>
            </Div>
            </div>
            <div class="flex justify-center items-center">
                <img src="{{ asset('storage/' . $event->image->path) }}" alt="Placeholder Image"
                    class="rounded-lg object-cover w-full h-full" />
            </div>
        </div>
    </div>
</x-dashboard>
