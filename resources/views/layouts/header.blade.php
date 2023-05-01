<nav x-data="{ isOpen: false }" class="relative bg-[#84B68C] border-b">
    <div class="container px-4 py-3 mx-auto">
        <div class="flex items-center justify-between">
            <div class="">
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="" class="w-16">
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