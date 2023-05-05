@extends('layouts.main')

@section('content')
<div class="flex justify-center w-full ">
    <div class="px-4 sm:px-6 lg:px-8 py-8 max-w-9xl flex justify-center bg-white mt-10 rounded-md shadow-md">
        <div class="py-6 max-w-4xl relative w-full">
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif   
            <div class="grid grid-cols-2 gap-8">
                <img class="rounded-md overflow-hidden h-full" src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                <div class="text-gray-doang text-lg">
                    <h1 class="font-medium text-5xl text-black">{{ $acc->title }}</h1>
                    <h3 class="font-semibold text-4xl py-4 text-black">Rp{{ $acc->salary }} <span class="text-2xl text-gray-doang">/orang</span></h3>
                    <h4 class="font-semibold text-2xl text-black">Deskripsi Pekerjaan</h4>
                    <p>{!! $acc->body !!}</p>
                    <h4 class="font-semibold text-2xl pt-4 text-black">Alamat</h4>
                    <p class="text-gray-doang text-lg">{{ $acc->address->name }}, {{ $acc->address->district->name }}, {{ $acc->address->district->regency->name }}, {{ $acc->address->district->regency->province->name }}</p>

                    <div class="flex justify-end gap-2">
                        <a href="{{ url('buruhtani/accept') }}"><button class="mt-4 bg-gray-400 px-4 py-2 font-medium rounded text-sm text-black hover:bg-gray-500 hover:text-gray-300">Kembali</button></a>
                            <form action="/detail/{{ $acc->slug }}" method="post">
                            @csrf
                                @can('buruh tani') 
                                    @foreach ($check_post as $i)
                                        @if ($i->vacancy_id == $acc->id and $i->user_id == $check_user[0]['id'])
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
