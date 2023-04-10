<x-authentication-layout>
    <h1 class="text-3xl text-slate-800 font-bold mb-6">{{ __('Daftar akun') }} ✨</h1>
    <!-- Form -->
    {{-- <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="space-y-4">
            <div>
                <x-jet-label for="name">{{ __('Full Name') }} <span class="text-rose-500">*</span></x-jet-label>
                <x-jet-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-jet-label for="email">{{ __('Email Address') }} <span class="text-rose-500">*</span></x-jet-label>
                <x-jet-input id="email" type="email" name="email" :value="old('email')" required />
            </div>

            <div>
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div>
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
        </div>
        <div class="flex items-center justify-between mt-6">
           <x-jet-button>
                {{ __('Sign Up') }}
            </x-jet-button>                
        </div>
        
    </form> --}}
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class='mb-4'>
            <label htmlFor='name' class='ml-1'>Nama</label>
            <input
                type='text'
                class='w-full p-2 border rounded-md outline-none shadow-sm'
                id='name'
                name="name"
                />
        </div>
        <div class=' mb-4'>
            <label htmlFor='no_hp' class='ml-1'>No. Handphone</label>
            <input
                type='number'
                step="1"
                onchange="this.value = parseInt(this.value);"
                class='w-full p-2 border rounded-md outline-none shadow-sm'
                id='no_hp'
                name="no_hp"
            />
        </div>
        <div class=' mb-4 flex flex-col'>
            <label htmlFor='no_hp' class='ml-1'>Profesi</label>
            <select name="profesi" id="profesi" class="w-full p-2 border rounded-md outline-none shadow-sm">
                <option value="buruh tani">Buruh tani</option>
                <option value="petani">Petani</option>
            </select>
        </div>
        <div class=' mb-4'>
            <label htmlFor='password' class='ml-1'>Password</label>
            <input
                type='password'
                class='w-full p-2 border rounded-md outline-none shadow-sm'
                id='password'
                name='password'
            />
        </div>
        <div class=' mb-4'>
            <label htmlFor='password_confirmation' class='ml-1'>Konfirmasi Password</label>
            <input
                type='password'
                class='w-full p-2 border rounded-md outline-none shadow-sm'
                id='password_confirmation'
                name='password_confirmation'
            />
        </div>
        <div class="flex items-center justify-center mt-6">
           <x-jet-button>
                {{ __('Daftar') }}
            </x-jet-button>                
        </div>
    </form>
    <x-jet-validation-errors class="mt-4" />  
    <!-- Footer -->
    <div class="pt-5 mt-6 border-t border-slate-200">
        <div class="text-sm">
            {{ __('Sudah punya akun?') }} <a class="font-medium text-indigo-500 hover:text-indigo-600" href="{{ route('login') }}">{{ __('Masuk sekarang!') }}</a>
        </div>
    </div>
</x-authentication-layout>
