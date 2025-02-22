<x-app-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-12 mx-auto">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 title-font mb-4">
                    {{ $listing->title }}
                </h1>
                <div class="flex flex-wrap items-center gap-2">
                    @foreach ($listing->tags as $tag)
                        <span
                            class="inline-block bg-indigo-100 text-indigo-800 text-sm font-semibold px-2.5 py-0.5 rounded-full uppercase">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>
            </div>

            <div class="-my-6">
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="w-full md:w-3/4 pr-0 md:pr-4 leading-relaxed text-lg text-gray-700">
                        {!! $listing->content !!}
                    </div>

                    <div class="w-full md:w-1/4 pl-0 md:pl-4">
                        <div class="mb-6">
                            <img src="/storage/{{ $listing->logo }}" alt="{{ $listing->company }} logo"
                                class="w-full h-auto max-w-[200px] mx-auto rounded-lg shadow-sm">
                        </div>

                        <div class="mb-6">
                            <p class="text-gray-700 mb-3">
                                <strong class="block text-gray-900">Location:</strong>
                                {{ $listing->location }}
                            </p>
                            <p class="text-gray-700">
                                <strong class="block text-gray-900">Company:</strong>
                                {{ $listing->company }}
                            </p>
                        </div>

                        <a href="{{ route('listings.apply', $listing) }}"
                            class="inline-block w-full text-center bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition duration-300 uppercase font-semibold shadow-md hover:shadow-lg">
                            Apply Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
