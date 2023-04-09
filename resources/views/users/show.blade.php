@extends('layouts.main')

@section('content')
<div class="flex justify-center w-full">
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl flex justify-center">
    <div class="py-6 max-w-4xl relative w-full">
        <div class="border border-neutral-500 rounded-md ">
            <div class="p-4">
                <h2 class="mb-3 text-lg font-bold">{{ $post->title }}</h2>
                <div>{!! $post->body !!}</div>
            </div>
        </div>
        <x-jet-button class="absolute right-0 mt-4"><a href="/">Kembali</a></x-jet-button>
    </div>
</div>
</div>
@endsection
