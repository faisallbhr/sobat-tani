<x-authentication-layout>
    <h1 class="text-3xl text-slate-800 font-bold mb-6">{{ __('Selamat datang!') }} ✨</h1>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif   
    <!-- Form -->
    {{-- <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="space-y-4">
            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" type="email" name="email" :value="old('email')" required autofocus />                
            </div>
            <div>
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" type="password" name="password" required autocomplete="current-password" />                
            </div>
        </div>
        <div class="flex items-center justify-between mt-6">       
            <x-jet-button class="ml-3">
                {{ __('Sign in') }}
            </x-jet-button>            
        </div>
    </form> --}}
    <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class='mb-4'>
        <label for='no_hp' class='ml-1'>No. Handphone</label>
        <input
            type='number'
            class='w-full p-2 border rounded-md outline-none shadow-sm'
            id='no_hp'
            name='no_hp'
        />
    </div>
    <div class='mb-4'>
        <label for='password' class='ml-1'>Password</label>
        <input
            type='password'
            class='w-full p-2 border rounded-md outline-none shadow-sm'
            id='password'
            name='password'
            />
    </div>
    <div class="flex items-center justify-center mt-6">       
        <x-jet-button class="">
            {{ __('Masuk') }}
        </x-jet-button>            
    </div>
</form>
    <!-- Footer -->
    <div class="pt-5 mt-6 border-t border-slate-200">
        <div class="text-sm">
            {{ __('Belum punya akun?') }} <a class="font-medium text-indigo-500 hover:text-indigo-600" href="{{ route('register') }}">{{ __('Daftar sekarang!') }}</a>
        </div>
    </div>
</x-authentication-layout>
