@extends('layouts.main')

@section('content')
<div class="flex justify-center w-full ">
    <div class="px-4 sm:px-6 lg:px-8 py-8 max-w-9xl flex flex-col justify-center bg-white mt-10 rounded-md shadow-md">
        @if (session('status'))
            <div id="toast-success" class="flex items-center w-full p-4 mb-4 text-primary bg-green-100 rounded shadow " role="alert">
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
        <div class="py-6 max-w-4xl relative w-full card-content ">
            <div class="grid grid-cols-2 gap-8">
                <img class="rounded-md overflow-hidden h-full" src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                <div class="text-gray-doang text-lg relative">
                    <h1 class="font-medium text-5xl text-black">{{ $post->title }}</h1>
                    <h3 class="font-semibold text-4xl pt-4 text-black">Rp{{ $post->salary }} <span class="text-2xl text-gray-doang">/orang</span></h3>
                    <small>Upload pada tanggal: {{ $post->created_at->format('d-m-Y') }}</small>
                    <h4 class="font-semibold text-2xl text-black pt-4">Deskripsi Pekerjaan</h4>
                    <p>{!! $post->body !!}</p>
                    <h4 class="font-semibold text-2xl text-black pt-4">Lama Pengerjaan</h4>
                    <p>{{ $post->work_duration }} hari</p>
                    <h4 class="font-semibold text-2xl pt-4 text-black">Alamat</h4>
                    <p class="text-gray-doang text-lg">{{ $post->address->name }}, {{ $post->address->district->name }}, {{ $post->address->district->regency->name }}, {{ $post->address->district->regency->province->name }}</p>
                    <div class="flex justify-end gap-2">
                        <a href="{{ url('/') }}"><button class="mt-4 bg-gray-400 px-4 py-2 font-medium rounded text-sm text-black hover:bg-gray-500 hover:text-gray-300">Kembali</button></a>
                            <form action="/detail/{{ $post->slug }}" method="post">
                            @csrf
                                @can('buruh tani') 
                                    @foreach ($check_post as $i)
                                        @if ($i->vacancy_id == $post->id and $i->user_id == $check_user[0]['id'])
                                            <p class="mt-4 bg-gray-200 px-4 py-2 rounded font-medium text-gray-400 text-sm">Daftar Lowongan</p>                           
                                            <p class="hidden">{{ $counter = false }}</p>
                                            @endif
                                    @endforeach 
                                        @if ($counter)
                                            <button onclick="return confirm('Apakah anda yakin akan mendaftar?')" class="btn bg-primary text-white mt-4" type='submit'>Daftar Lowongan</button>   
                                        @endif
                                @endcan
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
