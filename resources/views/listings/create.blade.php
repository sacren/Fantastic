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
            <form action="{{ route('listings.store') }}" method="post" id="payment-form" enctype="multipart/form-data"
                class="bg-gray-100 p-4">
                @guest
                    <div class="flex flex-wrap mb-4">
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <x-input-label for="email" value="{{ __('Email Address') }}"></x-input-label>
                            <input class="block mt-1 w-full" id="email" type="text" name="email"
                                :value="old('email')" required autofocus autocomplete="username">
                        </div>
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <x-input-label for="name" value="{{ __('Full Name') }}"></x-input-label>
                            <input class="block mt-1 w-full" id="name" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="username">
                        </div>
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <x-input-label for="password" value="{{ __('Password') }}"></x-input-label>
                            <input class="block mt-1 w-full" id="password" type="password" name="password" required
                                autocomplete="new-password">
                        </div>
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <x-input-label for="password_confirmation" value="{{ __('Confirm Password') }}"></x-input-label>
                            <input class="block mt-1 w-full" id="password_confirmation" type="password"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                @endguest
            </form>
        </div>
    </section>
</x-app-layout>
