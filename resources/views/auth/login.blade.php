<x-authentication-layout>
    <div class="flex items-center justify-center gap-4">
        <img src="{{ asset('assets/Logo.svg') }}" alt="logo" class="h-20">
        <h1 class="font-extrabold text-primary text-3xl">Sobat Tani</h1>
    </div>
    <h1 class="text-xl text-center py-3">{{ __('Selamat datang di Sobat Tani') }}</h1>
    <form method="POST" action="{{ route('login') }}">
    @csrf
        <div class='mb-4 mt-1'>
            <label for='no_handphone' class='ml-1 text-primary'>No. Handphone</label>
            <input
                type='text'
                class='w-full p-2 border rounded-md shadow-sm focus:border-green-400'
                id='no_handphone'
                name='no_handphone'
                autofocus
            />
        </div>
        <div class='mb-4'>
            <label for='password' class='ml-1 text-primary'>Password</label>
            <input
                type='password'
                class='w-full p-2 border rounded-md shadow-sm focus:border-green-400'
                id='password'
                name='password'
                />
        </div>
        <div class="flex items-center justify-center mt-10">       
            <button class="btn bg-primary px-3 py-2 rounded w-1/2 text-white">Login</button>            
        </div>
        <x-jet-validation-errors class="mt-4" />   
    </form>
</x-authentication-layout>
