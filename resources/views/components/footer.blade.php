<footer class="text-gray-600 body-font bg-gray-50">
    <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
        <!-- Logo and Brand Name -->
        <a href="{{ route('listings.index') }}" class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900 hover:text-indigo-500 transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full hover:bg-indigo-600 transition-colors duration-200" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl">Fantastic Job Board</span>
        </a>

        <!-- Credits -->
        <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">
            Built with <a href="https://laravel.com" class="text-indigo-500 hover:text-indigo-600 transition-colors duration-200" target="_blank" rel="noopener">Laravel</a>
            &mdash; Styled with <a href="https://tailblocks.cc" class="text-indigo-500 hover:text-indigo-600 transition-colors duration-200" target="_blank" rel="noopener">tailblocks.cc</a>
        </p>

        <!-- Social Links -->
        <div class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start space-x-4">
            <a href="https://github.com/sacren/Fantastic" target="_blank" rel="noopener" class="text-gray-500 hover:text-gray-900 transition-colors duration-200">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                </svg>
            </a>
            <!-- Add more social links here if needed -->
        </div>
    </div>

    <!-- Additional Footer Content -->
    <div class="bg-gray-100">
        <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
            <p class="text-gray-500 text-sm text-center sm:text-left">© {{ date('Y') }} Fantastic Job Board. All rights reserved.</p>
            <span class="sm:ml-auto sm:mt-0 mt-2 sm:w-auto w-full sm:text-left text-center text-gray-500 text-sm">Crafted with ❤️ by <a href="https://github.com/sacren" class="text-indigo-500 hover:text-indigo-600 transition-colors duration-200" target="_blank" rel="noopener">Jean Scren</a></span>
        </div>
    </div>
</footer>
