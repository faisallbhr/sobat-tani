<x-app-layout>
<div class="flex justify-center w-full ">
    <div class="px-4 sm:px-6 lg:px-8 py-8 max-w-9xl flex flex-col justify-center bg-white mt-10 rounded-md shadow-md">
        <div class="py-6 max-w-4xl relative w-full card-content ">
            <div class="grid grid-cols-2 gap-8">
                <img class="rounded-md overflow-hidden h-full" src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                <div class="text-gray-doang text-lg relative">
                    <h1 class="font-medium text-5xl text-black">{{ $post->title }}</h1>
                    <h3 class="font-semibold text-4xl pt-4 text-black">@currency($post->salary)<span class="text-2xl text-gray-doang">/orang</span></h3>
                    <small>Upload pada tanggal: {{ $post->created_at->format('d-m-Y') }}</small>
                    <h4 class="font-semibold text-2xl text-black pt-4">Deskripsi Pekerjaan</h4>
                    <p>{!! $post->body !!}</p>
                    <h4 class="font-semibold text-2xl text-black pt-4">Lama Pengerjaan</h4>
                    <p>{{ $post->work_duration }} hari</p>
                    <h4 class="font-semibold text-2xl pt-4 text-black">Alamat</h4>
                    <p class="text-gray-doang text-lg">{{ $post->address->name }}, {{ $post->address->district->name }}, {{ $post->address->district->regency->name }}, {{ $post->address->district->regency->province->name }}</p>
                    <div class="flex justify-end gap-2">
                        <a href="{{ url('/admin/posts') }}"><button class="mt-4 bg-gray-400 px-4 py-2 font-medium rounded text-sm text-black hover:bg-gray-500 hover:text-gray-300">Kembali</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>
