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
                <img class="rounded-md overflow-hidden h-full" src="https://source.unsplash.com/400x400/?{{ $wait->category->name == 'Jagung' ? 'corn':'paddy' }}" alt="">
                <div class="text-gray-doang text-lg">
                    <h1 class="font-medium text-5xl text-black">{{ $wait->title }}</h1>
                    <h3 class="font-semibold text-4xl pt-4 text-black">@currency($wait->salary)<span class="text-2xl text-gray-doang">/orang</span></h3>
                    <small>Upload pada tanggal: {{ $wait->created_at->format('d-m-Y') }}</small>
                    <h4 class="font-semibold text-2xl text-black pt-4">Deskripsi Pekerjaan</h4>
                    <p>{!! $wait->body !!}</p>
                    <h4 class="font-semibold text-2xl text-black pt-4">Lama Pengerjaan</h4>
                    <p>{{ $wait->work_duration }} hari</p>
                    <h4 class="font-semibold text-2xl pt-4 text-black">Alamat</h4>
                    <p class="text-gray-doang text-lg">{{ $wait->address->name }}, {{ $wait->address->district->name }}, {{ $wait->address->district->regency->name }}, {{ $wait->address->district->regency->province->name }}</p>

                    <div class="flex justify-end gap-2">
                        <a href="{{ url('buruhtani/wait') }}"><button class="mt-4 bg-gray-400 px-4 py-2 font-medium text-black rounded text-sm hover:bg-gray-500 hover:text-gray-300">Kembali</button></a>
                            <form action="/detail/{{ $wait->slug }}" method="post">
                            @csrf
                                @can('buruh tani') 
                                    @foreach ($check_post as $i)
                                        @if ($i->vacancy_id == $wait->id and $i->user_id == $check_user[0]['id'])
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
