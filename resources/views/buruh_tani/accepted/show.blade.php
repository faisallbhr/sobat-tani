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
            @if (session('failed'))
            <div id="toast-success" class="flex items-center w-full p-4 mb-4 text-red-500 bg-red-100 rounded shadow -mt-8" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-medium">{{ session('failed') }}</div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            @endif  
            @if (count($invoice) > 0)
            @if ($invoice[0]->status)
            <div id="toast-success" class="flex items-center w-full p-4 text-primary bg-green-100 rounded shadow my-4 -mt-8" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-primary bg-green-100">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-medium">Pembayaran telah selesai</div>

            </div>
            @endif
            @endif  
            <div class="grid grid-cols-2 gap-8">
                <img class="rounded-md overflow-hidden h-full" src="https://source.unsplash.com/400x400/?{{ $accept->category->name == 'Jagung' ? 'corn':'paddy' }}" alt="">
                <div class="text-gray-doang text-lg">
                    <h1 class="font-medium text-5xl text-black">{{ $accept->title }}</h1>
                    <h3 class="font-semibold text-4xl pt-4 text-black">@currency($accept->salary) <span class="text-2xl text-gray-doang">/orang</span></h3>
                    <small>Upload pada tanggal: {{ $accept->created_at->format('d-m-Y') }}</small>
                    <h4 class="font-semibold text-2xl text-black pt-4">Deskripsi Pekerjaan</h4>
                    <p>{!! $accept->body !!}</p>
                    <h4 class="font-semibold text-2xl text-black pt-4">Deadline</h4>
                    <p>{{ $deadline }}</p>
                    <h4 class="font-semibold text-2xl pt-4 text-black">Alamat</h4>
                    <p class="text-gray-doang text-lg">{{ $accept->address->name }}, {{ $accept->address->district->name }}, {{ $accept->address->district->regency->name }}, {{ $accept->address->district->regency->province->name }}</p>

                    <div class="flex justify-end gap-2">
                        <a href="{{ url('buruhtani/accept') }}"><button class="mt-4 bg-white border border-primary text-primary px-4 py-2 font-medium rounded text-sm">Kembali</button></a>
                        @if (! $counter)
                        <button id="btn" class="mt-4 bg-primary border border-primary text-white px-4 py-2 font-medium rounded text-sm">Kirim Laporan</button>
                        @elseif (count($invoice)>0 && $invoice[0]->status)
                        @else
                        <button id="btn" class="mt-4 bg-primary border border-primary text-white px-4 py-2 font-medium rounded text-sm">Ubah Laporan</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- MODAL KIRIM LAPORAN --}}
<div id="toForm" class="hidden max-w-5xl mx-auto my-10 flex z-50 justify-center items-center  bg-white w-full">
    <div class="px-4 py-10 bg-white w-full h-fit rounded shadow-md">
        <form id="myForm" action="{{ url('buruhtani/accept/') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label class="block mb-2 text-sm font-medium" for="file_input">Upload foto</label>
            <input name="image" id="image" class="block w-full text-sm border border-gray-300 rounded cursor-pointer bg-gray-50 focus:outline-none" type="file">
            <label class="block mb-2 text-sm font-medium mt-4" for="deskripsi">Deskripsi</label>
            <div>
                <input type="text" name="deskripsi" id="deskripsi" class="w-full hidden">
                <trix-editor input="deskripsi"></trix-editor>
            </div>
        </form>
        <div class="flex justify-end gap-2">
            <button id="btnBack" class="mt-4 bg-white border border-primary text-primary px-4 py-2 font-medium rounded text-sm">Batal</button>
            <button form="myForm" class="mt-4 bg-primary border border-primary text-white px-4 py-2 font-medium rounded text-sm">Kirim</button>
        </div>  
    </div>
</div>

{{-- LAPORAN --}}
<div class="max-w-5xl mx-auto relative">
    @if (count($reports) > 0)
    <div class="bg-white w-full my-10 rounded shadow-md">
        <h3 class="px-4 pt-8 font-bold text-xl">Laporan:</h3>
        @foreach ($reports as $report)
        <div class="grid grid-cols-2 gap-8 py-8 mx-4 border-b">
            <img src="{{ asset('storage/'.$report->image) }}" class="w-full rounded-md h-80 object-contain border p-4" alt="report-image">
            <div class="relative w-full">
                <p class="font-bold">Nama<span class="ml-[95.5px]">: {{ $report->stat_vacancy->user->name }}</span></p>
                <p class="font-bold mt-2">Deskripsi laporan : <span>{!! $report->deskripsi !!}</span></p>
                <small class="text-gray-doang absolute bottom-4">Upload pada tanggal: {{ $report->updated_at->format('d-m-Y') }}</small>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

<script>
    // TRIX EDITOR
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault()
    });

    // MODAL
    const btn = document.querySelector('#btn');
    const btnBack = document.querySelector('#btnBack'); 
    const form = document.querySelector('#toForm');
    
    btn.addEventListener('click', function(){
        form.classList.toggle('hidden')
        form.classList.toggle('flex')
    })
    btnBack.addEventListener('click', function(){
        form.classList.toggle('hidden')
        form.classList.toggle('flex')
    })
    
</script>
@endsection
