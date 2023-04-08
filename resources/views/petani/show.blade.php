<x-app-layout>
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <div class="py-6 max-w-4xl relative">

        <div class="border border-neutral-500 rounded-md ">
            <div class="p-4">
                <h2 class="mb-3 text-lg font-bold">{{ $post->title }}</h2>
                <p>{!! $post->body !!}</p>
            </div>
        </div>

        <x-jet-button class="absolute right-0 mt-4"><a href="/petani/posts">Kembali</a></x-jet-button>
    </div>
</div>
</x-app-layout>
