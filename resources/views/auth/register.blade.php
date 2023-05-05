<x-authentication-layout>
    <div class="flex items-center justify-center gap-4">
        <img src="{{ asset('assets/Logo.svg') }}" alt="logo" class="h-20">
        <h1 class="font-extrabold text-primary text-3xl">Sobat Tani</h1>
    </div>
    <h1 class="text-xl text-center py-3">{{ __('Selamat datang di Sobat Tani') }}</h1>
    <form method="POST" action="{{ route('register') }}" id="myForm">
        @csrf
        <div class='mb-4'>
            <label htmlFor='name'>Nama</label>
            <input
                type='text'
                class='w-full p-2 border rounded-md outline-none shadow-sm focus:border-green-400'
                id='name'
                name="name"
                autofocus
                />
        </div>
        <div class=' mb-4'>
            <label htmlFor='no_handphone'>No. Handphone</label>
            <input
                type='text'
                class='w-full p-2 border rounded-md outline-none shadow-sm focus:border-green-400'
                id='no_handphone'
                name="no_handphone"
            />
        </div>
        <div class=' mb-4'>
            <label htmlFor='no_rekening'>No. Rekening</label>
            <input
                type='text'
                class='w-full p-2 border rounded-md outline-none shadow-sm focus:border-green-400'
                id='no_rekening'
                name="no_rekening"
            />
        </div>
        <div class=' mb-4 flex flex-col'>
            <label htmlFor='gender_id'>Gender</label>
            <select name="gender_id" id="gender_id" class="w-full p-2 border rounded-md outline-none shadow-sm focus:border-green-400">
                <option value="1" onchange="this.value = parseInt(this.value);">Laki-laki</option>
                <option value="2" onchange="this.value = parseInt(this.value);">Perempuan</option>
            </select>
        </div>
        <div class=' mb-4 flex flex-col'>
            <label htmlFor='profesi'>Profesi</label>
            <select name="profesi" id="profesi" class="w-full p-2 border rounded-md outline-none shadow-sm focus:border-green-400">
                <option value="buruh tani">Buruh tani</option>
                <option value="petani">Petani</option>
            </select>
        </div>
        <div class=' mb-4'>
            <label htmlFor='password'>Password</label>
            <input
                type='password'
                class='w-full p-2 border rounded-md outline-none shadow-sm focus:border-green-400'
                id='password'
                name='password'
            />
        </div>
        <div class=' mb-4'>
            <label htmlFor='password_confirmation'>Konfirmasi Password</label>
            <input
                type='password'
                class='w-full p-2 border rounded-md outline-none shadow-sm focus:border-green-400'
                id='password_confirmation'
                name='password_confirmation'
            />
        </div>
    </form>
    <div class="flex items-center w-full mt-10 gap-2">
        <a href="{{ url('/') }}" class="w-1/2"><button class="btn bg-white border border-primary px-6 py-2 rounded w-full">Batal</button></a>
       <button form="myForm" type="submit" class="btn bg-primary px-6 py-2 rounded w-1/2 text-white">Daftar</button>              
    </div>
    <x-jet-validation-errors class="mt-4" />  
</x-authentication-layout>
