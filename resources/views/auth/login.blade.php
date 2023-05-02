<x-authentication-layout>
    <h1 class="text-3xl text-slate-800 font-bold mb-6">{{ __('Selamat datang!') }} ✨</h1>
    <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class='mb-4'>
        <label for='no_handphone' class='ml-1'>No. Handphone</label>
        <input
            type='text'
            class='w-full p-2 border rounded-md shadow-sm focus:border-green-400'
            id='no_handphone'
            name='no_handphone'
            autofocus
        />
    </div>
    <div class='mb-4'>
        <label for='password' class='ml-1'>Password</label>
        <input
            type='password'
            class='w-full p-2 border rounded-md shadow-sm focus:border-green-400'
            id='password'
            name='password'
            />
    </div>
    <div class="flex items-center justify-center mt-6">       
        <button class="btn bg-[#56964C] px-3 py-2 rounded hover:bg-[#4D8C43]">Login</button>            
    </div>
    <x-jet-validation-errors class="mt-4" />   
</form>
</x-authentication-layout>
