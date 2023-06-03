<x-authentication-layout>
    <div class="flex items-center justify-center gap-4">
        <img src="{{ asset('assets/Logo.svg') }}" alt="logo" class="h-20">
        <h1 class="font-extrabold text-primary text-3xl">Sobat Tani</h1>
    </div>
    <h1 class="text-xl text-center py-3">{{ __('Selamat datang di Sobat Tani') }}</h1>
    @if ($errors->any())
    @foreach ($errors->all() as $item)
        @if ($item == 'hp terdaftar')
        <div id="no_handphone" class="flex items-center w-full p-4 text-red-500 bg-red-100 rounded shadow my-4" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-medium">Nomor telah terdaftar</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8" data-dismiss-target="#no_handphone" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        @elseif ($item == 'rek terdaftar')
        <div id="no_rekening" class="flex items-center w-full p-4 text-red-500 bg-red-100 rounded shadow my-4" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-medium">Nomor rekening telah terdaftar</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8" data-dismiss-target="#no_rekening" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        @else
        <div id="errors" class="flex items-center w-full p-4 text-red-500 bg-red-100 rounded shadow my-4" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-medium">Harap isi seluruh form</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8" data-dismiss-target="#errors" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        @break
        @endif
    @endforeach
    @enderror
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
</x-authentication-layout>
