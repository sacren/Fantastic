<x-app-layout>
    <section class="text-gray-600 body-font overflow-hidden flex-grow">
        <div class="w-full md:w-1/2 py-24 mx-auto">
            <div class="mb-8">
                <h1 class="text-2xl font-medium text-gray-900 title-font">
                    Create a new listing for only $99.99!
                </h1>
            </div>
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 transition-all duration-300 ease-in-out">
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
                class="bg-gray-100 p-6 rounded-lg">
                @guest
                    <div class="flex flex-wrap mb-6">
                        <!-- Email Field -->
                        <div class="w-full md:w-1/2 px-3 mb-6">
                            <x-input-label for="email" value="{{ __('Email Address') }}"></x-input-label>
                            <input
                                class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                id="email" type="text" name="email" :value="old('email')" required autofocus
                                autocomplete="username">
                        </div>

                        <!-- Full Name Field -->
                        <div class="w-full md:w-1/2 px-3 mb-6">
                            <x-input-label for="name" value="{{ __('Full Name') }}"></x-input-label>
                            <input
                                class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                id="name" type="text" name="name" :value="old('name')" required
                                autocomplete="username">
                        </div>

                        <!-- Password Field -->
                        <div class="w-full md:w-1/2 px-3 mb-6">
                            <x-input-label for="password" value="{{ __('Password') }}"></x-input-label>
                            <input
                                class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                id="password" type="password" name="password" required autocomplete="new-password">
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="w-full md:w-1/2 px-3 mb-6">
                            <x-input-label for="password_confirmation" value="{{ __('Confirm Password') }}"></x-input-label>
                            <input
                                class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                id="password_confirmation" type="password" name="password_confirmation" required
                                autocomplete="new-password">
                        </div>

                        <!-- Job Title Field -->
                        <div class="w-full px-3 mb-6">
                            <x-input-label for="title" value="{{ __('Job Title') }}"></x-input-label>
                            <input
                                class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                id="title" type="text" name="title" required>
                        </div>

                        <!-- Company Name Field -->
                        <div class="w-full px-3 mb-6">
                            <x-input-label for="company" value="{{ __('Company Name') }}"></x-input-label>
                            <input
                                class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                id="company" type="text" name="company" required>
                        </div>

                        <!-- Company Logo Field -->
                        <div class="px-3 mb-6">
                            <x-input-label for="logo" value="{{ __('Company Logo') }}"></x-input-label>
                            <input
                                class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="file" id="logo" name="logo" required>
                        </div>

                        <!-- Location Field -->
                        <div class="w-full px-3 mb-6">
                            <x-input-label for="location" value="{{ __('Location (e.g. San Francisco)') }}"></x-input-label>
                            <input
                                class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="text" id="location" name="location" required>
                        </div>

                        <!-- Apply Link Field -->
                        <div class="w-full px-3 mb-6">
                            <x-input-label for="apply_link" value="{{ __('Apply Link') }}"></x-input-label>
                            <input
                                class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="text" id="apply_link" name="apply_link" required>
                        </div>

                        <!-- Tags Field -->
                        <div class="w-full px-3 mb-6">
                            <x-input-label for="tags" value="{{ __('Tags') }}"></x-input-label>
                            <input
                                class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="text" id="tags" name="tags" required>
                        </div>

                        <!-- Listing Content Field -->
                        <div class="w-full px-3 mb-6">
                            <x-input-label for="content" value="{{ __('Listing Content') }}"></x-input-label>
                            <textarea
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mt-1 w-full min-h-[150px]"
                                id="content" name="content" required></textarea>
                        </div>

                        <!-- Highlight Checkbox -->
                        <div class="w-full px-3 mb-6">
                            <label for="is_highlighted" class="inline-flex items-center">
                                <input id="is_highlighted" type="checkbox" name="is_highlighted" value="yes"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 hover:border-indigo-500"
                                    required>
                                <span
                                    class="ms-2 text-sm text-gray-600">{{ __('Highlight this post (extra $19.99)') }}</span>
                            </label>
                        </div>

                        <!-- Card Element -->
                        <div class="w-full px-3 mb-6">
                            <div id="card-element"></div>
                            <!-- Error message container -->
                            <div id="card-errors" role="alert" class="text-red-500 mt-2 text-sm"></div>
                        </div>

                        <!-- Submit Button -->
                        <div class="w-full px-3 mb-6">
                            @csrf
                            <input id="payment-method" type="hidden" name="payment_method_id" value="">
                            <button type="submit" id="submit-button"
                                class="w-full px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-md text-white transition-all duration-300 ease-in-out">Pay
                                +
                                Continue</button>
                        </div>
                    </div>
                @endguest
            </form>
        </div>
    </section>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('{{ env('STRIPE_KEY') }}');
        const elements = stripe.elements();
        const cardElement = elements.create('card', {
            classes: {
                base: 'StripeElement rounded-md shadow-sm bg-white px-3 py-3 border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full',
            },
            style: {
                base: {
                    lineHeight: '1.5',
                    fontFamily: 'Inter, sans-serif',
                    fontSize: '16px',
                    color: '#374151',
                },
            },
            placeholder: 'Card details',
        });
        cardElement.mount('#card-element');

        document.getElementById('submit-button').addEventListener('click', async (e) => {
            e.preventDefault();

            const {error, paymentMethod} = await stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
            });

            if (error) {
                document.getElementById('card-errors').textContent = error.message;
            } else {
                document.getElementById('payment-method').value = paymentMethod.id;
                document.getElementById('payment-form').submit();
            }
        });
    </script>
</x-app-layout>
