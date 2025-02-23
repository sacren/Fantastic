<x-app-layout>
    <section class="text-gray-600 body-font overflow-hidden flex-grow">
        <div class="w-full md:w-1/2 py-24 mx-auto">
            <div class="mb-4">
                <h1 class="text-2xl font-medium text-gray-900 title-font">
                    Create a new listing for only $99.99!
                </h1>
            </div>
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM9 9a1 1 0 012 0v4a1 1 0 01-2 0V9zm1-5a1 1 0 00-1 1v1a1 1 0 002 0V5a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </section>
</x-app-layout>
