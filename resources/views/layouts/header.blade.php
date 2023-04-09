<nav x-data="{ isOpen: false }" class="relative bg-white border-b">
    <div class="container px-4 py-6 mx-auto">
        <div class="flex items-center justify-between">
            <div class="text-xl font-semibold text-gray-700">
                <a class="text-2xl font-medium  transition-colors flex items-center duration-300 transform text-sky-400 hover:text-sky-300" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
                    </svg>

                    <h3 class="mx-2">Blog</h3>
                </a>
            </div>                    
            <div class="flex items-center space-x-3">
              <!-- User button -->
                @if (auth()->user())
                    <x-dropdown-profile/>
                @else
                <ul class="flex gap-2">
                    <li><a href="/login">Masuk</a></li>
                    <li><a href="/register">Daftar</a></li>
                </ul>
                @endif
            </div>
        </div>
    </div>
</nav>