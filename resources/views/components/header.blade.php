<header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center gap-4 md:gap-0">
        <a href="{{ route('listings.index') }}" aria-label="Fantastic Job Board Homepage"
            class="flex items-center text-gray-900 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full"
                viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl font-medium">Fantastic Job Board</span>
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center mr-5">
            <a href="{{ route('login') }}" class="hover:text-gray-900">Employers</a>
        </nav>
        <a href="#"
            class="inline-flex items-center bg-indigo-500 text-white border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded-lg text-base transition duration-200 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Post Job
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</header>
