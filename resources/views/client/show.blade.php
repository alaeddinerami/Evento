<x-client-navbar>
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
    <div class="font-[sans-serif] text-gray-800 bg-gray-100 px-6 py-12">
        <div class="grid lg:grid-cols-2 gap-8 max-lg:max-w-2xl mx-auto">
          <div class="text-left">
            <h2 class="text-4xl font-extrabold mb-6">{{$event->title}}</h2>
            <p class="mb-4 text-sm">{{$event->description}}</p>
            
            <div class="grid xl:grid-cols-3 sm:grid-cols-2 gap-8 mt-12">
              <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" class="fill-green-500 shrink-0" viewBox="0 0 24 24">
                  <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000"></path>
                </svg>
                <h6 class="text-base font-semibold ml-4">{{$event->lieu}}</h6>
              </div>
              <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" class="fill-green-500 shrink-0" viewBox="0 0 24 24">
                  <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000"></path>
                </svg>
                <h6 class="text-base font-semibold ml-4">{{$event->date}}</h6>
              </div>
              <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" class="fill-green-500 shrink-0" viewBox="0 0 24 24">
                  <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000"></path>
                </svg>
                <h6 class="text-base font-semibold ml-4">{{$event->placesdisponible}}</h6>
              </div>
              <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" class="fill-green-500 shrink-0" viewBox="0 0 24 24">
                  <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000"></path>
                </svg>
                <h6 class="text-base font-semibold ml-4">{{$event->categories->name}}</h6>
              </div>
              <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" class="fill-green-500 shrink-0" viewBox="0 0 24 24">
                  <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000"></path>
                </svg>
                <h6 class="text-base font-semibold ml-4">{{$event->organizers->users->name}}</h6>
              </div>
              <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" class="fill-green-500 shrink-0" viewBox="0 0 24 24">
                  <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000"></path>
                </svg>
                <h6 class="text-base font-semibold ml-4">Communication</h6>
              </div>
              <form action="{{route('reservation.store')}}" method="POST">
                @csrf
                <input type="hidden" name="clientID" value="{{ Auth::user()->clients->id }}">
                <input type="hidden" name="eventID" value="{{ $event->id }}">
              <button  class="inline-block mt-6 px-6 py-2.5 bg-blue-500 text-white text-base font-medium rounded-md hover:bg-green-600">book now</button>
            </form>
          </div>

          </div>
          <div class="flex justify-center items-center">
            <img src="{{ asset('storage/' . $event->image->path) }}" alt="Placeholder Image" class="rounded-lg object-cover w-full h-full" />
          </div>
        </div>
      </div>
</x-client-navbar>