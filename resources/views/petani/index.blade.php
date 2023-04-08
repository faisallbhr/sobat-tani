<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        
        <!-- Cards -->
        <div class="py-6 relative max-w-5xl">
            <table class="text-left text-sm font-light overflow-hidden rounded-md w-full">
                <thead
                    class="border-b bg-white font-medium">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Judul</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="flex justify-center py-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr 
                        class="border-b border-neutral-500 bg-neutral-200">
                            <td class="px-6 py-4 text-slate-800 font-medium">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-slate-800">{{ $post->title }}</td>
                            <td class="px-6 py-4 text-slate-800">{{ $post->category->name }}</td>
                            <td class="px-6 py-4  text-slate-800 flex flex-col md:flex-row gap-2 items-center justify-center">
                                <div>
                                    <button class="bg-blue-600 px-4 py-2 rounded text-white hover:bg-blue-700">
                                        <a href="/petani/posts/{{ $post->slug }}" class="fa-solid fa-eye mx-auto"></a>
                                    </button>
                                </div>
                                <div>
                                    <button class="bg-yellow-400 px-4 py-2 rounded hover:bg-yellow-500">
                                        <a href="/petani/posts/{{ $post->slug }}/edit" class="fa-solid fa-edit mx-auto "></a>
                                    </button>
                                </div>
                                    <form action="/petani/posts/{{ $post->slug }}" method="post">
                                        @method('delete')
                                    @csrf
                                    <button class="bg-red-500 px-4 py-2 rounded text-white hover:bg-red-600"           
                                    onclick="return confirm('Apakah anda yakin akan menghapus postingan?')">
                                        <i class="fa-solid fa-trash mx-auto"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
        <x-jet-button class="absolute right-0 mt-4"><a href="posts/create">Tambah postingan</a></x-jet-button>

    </div>
    
</x-app-layout>