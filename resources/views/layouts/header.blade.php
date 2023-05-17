<nav x-data="{ isOpen: false }" class="relative bg-white border-b shadow">
    <div class="container px-4 py-3 mx-auto">
        <div class="flex items-center justify-between">
            <a href="/" class="flex items-center gap-4">
                <img src="{{ asset('assets/logo.png') }}" alt="" class="w-16">
                <p class="font-extrabold text-3xl text-primary">Sobat Tani</p>
            </a>                  
            <div class="flex items-center space-x-3">
              <!-- User button -->
                @if (auth()->user())
                    <x-dropdown-profile/>
                @else
                <ul class="flex gap-5">
                    <a  href="/register" class="border border-primary px-24 py-3 rounded-lg font-semibold"><button>Daftar</button></a>
                    <a  href="/login" class="bg-primary px-24 py-3 rounded-lg text-white font-semibold"><button>Masuk</button></a>
                </ul>
                @endif
            </div>
        </div>
    </div>
</nav>