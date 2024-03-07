<x-organiser-dashboard>
    <form class="p-4 md:p-5" method="post" action="{{ route('event.update', $event) }} "
                    enctype="multipart/form-data" onsubmit="return validateForm()">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-6 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Event
                                Title</label>
                            <input value="{{$event->title}}" type="text" name="title" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="event title" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Event
                                description</label>
                            <input type="text"  value="{{$event->description}}" name="description" id="description"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="event description" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="lieu" class="block mb-2 text-sm font-medium text-gray-900">Event
                                lieu</label>
                            <input type="text" value="{{$event->lieu}}" name="lieu" id="lieu"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="event lieu" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900">Event
                                Date</label>
                            <input type="date" name="date" id="date" value="{{$event->date}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="event date" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="placesdisponible" class="block mb-2 text-sm font-medium text-gray-900">Event
                                places</label>
                            <input type="number" name="placesdisponible" id="placesdisponible" value="{{$event->placesdisponible}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="number of place" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="typeValidation" class="block mb-2 text-sm font-medium text-gray-900">Validate</label>
                            <select name="typeValidation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                              <option  value="automatic">Auto</option>
                              <option value="manual">Manual</option>
                            </select>
                        </div>

                        <div class="col-span-2">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900">calegory</label>
                            <select name="categoryID" id="category" style="width: full;" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                <option selected="">Select category</option>
                                @unless (count($categories ) == 0)
                                    @foreach ($categories  as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @else
                                    <option value="" disabled >No category found</option>
                                @endunless
                        </select>
                        </div>
                        <input type="hidden" name="organizerID" value="{{ Auth::user()->organisateurs->id }}">
                        <div class="col-span-2">
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Poster</label>
                            <input type="file" name="image" :value="old('image')" id="image"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Poster">
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex justify-center items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <p>Edit event</p>
                    </button>
                </form>
</x-organiser-dashboard>