@extends('layouts.main')

@section('content')
<div class="flex justify-center w-full">
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl flex justify-center">
    <div class="py-6 max-w-4xl relative w-full">
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif   
        <div class="border border-neutral-500 rounded-md ">
            <div class="p-4">
                <h2 class="mb-3 text-lg font-bold">{{ $post->title }}</h2>
                <div>{!! $post->body !!}</div>
            </div>
        </div>
        <div class="flex justify-end gap-2">
            <a href="{{ url('/') }}"><button class="mt-4 bg-gray-400 px-4 py-2 text-gray-700 font-medium rounded text-sm hover:bg-gray-500 hover:text-gray-300">Kembali</button></a>
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
                                <x-jet-button class="mt-4" type='submit'>Daftar Lowongan</x-jet-button>   
                            @endif
                    @endcan
                </form>
            </div>
    </div>
</div>
</div>
@endsection
