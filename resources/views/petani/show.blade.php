<x-app-layout>
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl">
    <div class="py-6 max-w-4xl relative">

        <div class="border border-neutral-500 rounded-md ">
            <div class="p-4">
                <h2 class="mb-3 text-lg font-bold">{{ $post->title }}</h2>
                <p>{!! $post->body !!}</p>
            </div>
        </div>
        <table id="tableId" class="text-left text-sm font-light overflow-hidden rounded-md w-full mt-10">
            <thead
                class="border-b bg-white font-medium">
                <tr>
                    <th class="px-6 py-4">No</th>
                    <th class="px-6 py-4">Judul</th>
                    <th class="px-6 py-4">Category</th>
                    <th class="flex justify-center py-4">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($waiting as $wait)
                    <tr 
                    class="border-b border-neutral-500 bg-neutral-200">
                        <td class="px-6 py-4 text-slate-800 font-medium ">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 text-slate-800">{{ $wait->title }}</td>
                        <td class="px-6 py-4 text-slate-800">{{ $wait->category->name }}</td>
                        <td class="py-4  text-slate-800 flex justify-center gap-2">
                            <form action="#" method="post">
                                @method('put')
                                @csrf
                                <button class="bg-green-500 px-4 py-2 rounded text-white hover:bg-green-600"           
                                onclick="return confirm('Apakah anda yakin akan menerima pemdaftar?')"><span class="fa-solid fa-check mx-auto"></span>
                                </button>
                            </form>                        
                            <form action="#" method="post">
                                @method('delete')
                                @csrf
                                <button class="bg-red-500 px-4 py-2 rounded text-white hover:bg-red-600"           
                                onclick="return confirm('Apakah anda yakin akan menolak pendaftar?')"><span class="fa-solid fa-x mx-auto"></span>
                                </button>
                            </form>                        
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ url('/petani/posts') }}"><x-jet-button class="absolute right-0 mt-4">Kembali</x-jet-button></a>
    </div>
</div>
</x-app-layout>
