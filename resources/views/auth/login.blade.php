<x-authentication-layout>
    <h1 class="text-3xl text-slate-800 font-bold mb-6">{{ __('Selamat datang!') }} ✨</h1>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif   

    <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class='mb-4'>
        <label for='no_handphone' class='ml-1'>No. Handphone</label>
        <input
            type='number'
            class='w-full p-2 border rounded-md outline-none shadow-sm'
            id='no_handphone'
            name='no_handphone'
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
    <x-jet-validation-errors class="mt-4" />   
</form>
    <!-- Footer -->
    <div class="pt-5 mt-6 border-t border-slate-200">
        <div class="text-sm">
            {{ __('Belum punya akun?') }} <a class="font-medium text-indigo-500 hover:text-indigo-600" href="{{ route('register') }}">{{ __('Daftar sekarang!') }}</a>
        </div>
    </div>
</x-authentication-layout>
