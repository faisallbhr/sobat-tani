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
    <form method="POST" action="{{ route('register') }}" id="myForm">
        @csrf
        <div class='mb-4'>
            <label htmlFor='name' class='ml-1'>Nama</label>
            <input
                type='text'
                class='w-full p-2 border rounded-md outline-none shadow-sm focus:border-green-400'
                id='name'
                name="name"
                autofocus
                />
        </div>
        <div class=' mb-4'>
            <label htmlFor='no_handphone' class='ml-1'>No. Handphone</label>
            <input
                type='text'
                class='w-full p-2 border rounded-md outline-none shadow-sm focus:border-green-400'
                id='no_handphone'
                name="no_handphone"
            />
        </div>
        <div class=' mb-4'>
            <label htmlFor='no_rekening' class='ml-1'>No. Rekening</label>
            <input
                type='text'
                class='w-full p-2 border rounded-md outline-none shadow-sm focus:border-green-400'
                id='no_rekening'
                name="no_rekening"
            />
        </div>
        <div class=' mb-4 flex flex-col'>
            <label htmlFor='gender_id' class='ml-1'>Gender</label>
            <select name="gender_id" id="gender_id" class="w-full p-2 border rounded-md outline-none shadow-sm focus:border-green-400">
                <option value="1" onchange="this.value = parseInt(this.value);">Laki-laki</option>
                <option value="2" onchange="this.value = parseInt(this.value);">Perempuan</option>
            </select>
        </div>
        <div class=' mb-4 flex flex-col'>
            <label htmlFor='profesi' class='ml-1'>Profesi</label>
            <select name="profesi" id="profesi" class="w-full p-2 border rounded-md outline-none shadow-sm focus:border-green-400">
                <option value="buruh tani">Buruh tani</option>
                <option value="petani">Petani</option>
            </select>
        </div>
        <div class=' mb-4'>
            <label htmlFor='password' class='ml-1'>Password</label>
            <input
                type='password'
                class='w-full p-2 border rounded-md outline-none shadow-sm focus:border-green-400'
                id='password'
                name='password'
            />
        </div>
        <div class=' mb-4'>
            <label htmlFor='password_confirmation' class='ml-1'>Konfirmasi Password</label>
            <input
                type='password'
                class='w-full p-2 border rounded-md outline-none shadow-sm focus:border-green-400'
                id='password_confirmation'
                name='password_confirmation'
            />
        </div>
    </form>
    <div class="flex items-center justify-center mt-6 gap-20">
        <a href="{{ url('/') }}"><button class="btn bg-red-500 px-6 py-2 rounded hover:bg-red-600">Batal</button></a>
       <button form="myForm" type="submit" class="btn bg-[#56964C] px-6 py-2 rounded hover:bg-[#4D8C43]">Daftar</button>              
    </div>
    <x-jet-validation-errors class="mt-4" />  
</x-authentication-layout>
