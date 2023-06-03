<x-authentication-layout>
    <div class="flex items-center justify-center gap-4">
        <img src="{{ asset('assets/Logo.svg') }}" alt="logo" class="h-20">
        <h1 class="font-extrabold text-primary text-3xl">Sobat Tani</h1>
    </div>
    <h1 class="text-xl text-center py-3">{{ __('Selamat datang di Sobat Tani') }}</h1>
    @if ($errors->any())
    @foreach ($errors->all() as $item)
        @if ($item == 'The no handphone field is required.' || $item == 'The password field is required.')
        <div id="errors" class="flex items-center w-full p-4 text-red-500 bg-red-100 rounded shadow my-4" role="alert">
            <div class="text-sm font-medium">Harap isi seluruh form</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8" data-dismiss-target="#errors" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        @break
        @else
        <div id="required" class="flex items-center w-full p-4 text-red-500 bg-red-100 rounded shadow my-4" role="alert">
            <div class="text-sm font-medium">Nomor handphone atau password tidak valid</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8" data-dismiss-target="#required" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        @endif
    @endforeach
    @endif
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
    </form>
</x-authentication-layout>
