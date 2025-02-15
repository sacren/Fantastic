<section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
        <div class="text-center lg:w-2/3 w-full">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Fantastic Jobs in the Industry</h1>
            <p class="mb-8 leading-relaxed">Discover amazing career paths at Fantastic Job Board with our fantastic jobs.</p>
            <form action="{{ route('listings.index') }}" method="get" class="flex w-full justify-center items-end">
                <div class="relative mr-4 lg:w-full xl:w-1/2 w-2/4">
                    <input type="text" id="s" name="s" value="{{ request()->get('s') }}"
                        placeholder="Search for jobs..."
                        class="w-full bg-gray-100 rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:bg-white transition duration-200 ease-in-out text-base text-gray-700 px-4 py-2 shadow-sm hover:shadow-md">
                </div>
                <button type="submit"
                    class="text-white bg-indigo-500 border-0 py-2 px-6 hover:bg-indigo-600 rounded-lg text-lg transition duration-200 ease-in-out transform hover:scale-105 shadow-md hover:shadow-lg">
                    Search
                </button>
            </form>
            <p class="text-sm text-gray-500 mt-4 w-full">Popular searches: laravel, php, vuejs, node</p>
        </div>
    </div>
</section>
