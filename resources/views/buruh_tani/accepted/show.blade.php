@extends('layouts.main')
@section('content')
<div class="flex justify-center w-full ">
    <div class="px-4 sm:px-6 lg:px-8 py-8 max-w-9xl flex justify-center bg-white mt-10 rounded-md shadow-md">
        <div class="py-6 max-w-4xl relative w-full">
            @if (session('status'))
            <div id="toast-success" class="flex items-center w-full p-4 mb-4 text-primary bg-green-100 rounded shadow -mt-8" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-primary bg-green-100">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-medium">{{ session('status') }}</div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            @endif  
            <div class="grid grid-cols-2 gap-8">
                <img class="rounded-md overflow-hidden h-full" src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                <div class="text-gray-doang text-lg">
                    <h1 class="font-medium text-5xl text-black">{{ $accept->title }}</h1>
                    <h3 class="font-semibold text-4xl py-4 text-black">Rp{{ $accept->salary }} <span class="text-2xl text-gray-doang">/orang</span></h3>
                    <h4 class="font-semibold text-2xl text-black">Deskripsi Pekerjaan</h4>
                    <p>{!! $accept->body !!}</p>
                    <h4 class="font-semibold text-2xl pt-4 text-black">Alamat</h4>
                    <p class="text-gray-doang text-lg">{{ $accept->address->name }}, {{ $accept->address->district->name }}, {{ $accept->address->district->regency->name }}, {{ $accept->address->district->regency->province->name }}</p>

                    <div class="flex justify-end gap-2">
                        <a href="{{ url('buruhtani/accept') }}"><button class="mt-4 bg-white border border-primary text-primary px-4 py-2 font-medium rounded text-sm">Kembali</button></a>
                        <button id="btn" class="mt-4 bg-primary border border-primary text-white px-4 py-2 font-medium rounded text-sm">Kirim Laporan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="toForm" class="hidden flex justify-center items-center absolute bg-black bg-opacity-90 w-full h-[90.8%]">
        <div class="mx-8 p-4 bg-white max-w-xl w-full h-fit rounded-md">
            <form id="myForm" action="{{ url('buruhtani/accept/') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label class="block mb-2 text-sm font-medium" for="file_input">Upload foto <span class="text-xs text-gray-500" id="file_input_help">(max. 2 MB)</span></label>
                <input name="image" id="image" class="block w-full text-sm border border-gray-300 rounded cursor-pointer bg-gray-50 focus:outline-none" type="file">
                
                <label class="block mb-2 text-sm font-medium mt-4" for="deskripsi">Deskripsi</label>
                <div>
                    <input type="text" name="deskripsi" id="deskripsi" class="w-full hidden">
                    <trix-editor input="deskripsi"></trix-editor>
                </div>
            </form>
            <div class="flex justify-end gap-2">
                <button id="btnBack" class="mt-4 bg-white border border-primary text-primary px-4 py-2 font-medium rounded text-sm">Kembali</button>
                <button form="myForm" class="mt-4 bg-primary border border-primary text-white px-4 py-2 font-medium rounded text-sm">Kirim</button>
            </div>  
        </div>
    </div>
</div>

<script>
    // MODAL
    const btn = document.querySelector('#btn')
    const btnBack = document.querySelector('#btnBack')
    const form = document.querySelector('#toForm')
    btn.addEventListener('click', function(){
        let cek = true
        form.classList.toggle('hidden')
    })
    btnBack.addEventListener('click', function(){
        form.classList.toggle('hidden')
    })

    // TRIX EDITOR
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault()
    });

</script>
@endsection
