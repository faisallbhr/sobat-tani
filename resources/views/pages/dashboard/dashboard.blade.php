<x-app-layout>
    {{-- <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        
        <!-- Welcome banner -->

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Avatars -->

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                <!-- Add view button -->
                <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                    <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    <span class="hidden xs:block ml-2">Add View</span>
                </button>
                
            </div>

        </div>
        
        <!-- Cards -->
        <div class="py-6 relative">
            <table class="text-left text-sm font-light overflow-hidden rounded-md w-full max-w-5xl">
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
                    class="border-b bg-neutral-100">
                        <td class="px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $post->title }}</td>
                        <td class="px-6 py-4">{{ $post->category->name }}</td>
                        <td class="py-4 flex flex-col md:flex-row gap-2 items-center justify-center">
                            <div>
                                <x-jet-button>
                                    <a href="/petani/posts/{{ $post->slug }}" class="fa-solid fa-eye mx-auto"></a>
                                </x-jet-button>
                            </div>
                            <div>
                                <x-jet-secondary-button>
                                    <a href="/petani/posts/{{ $post->slug }}/edit" class="fa-solid fa-edit mx-auto "></a>
                                </x-jet-secondary-button>
                            </div>
                                <form action="/petani/posts/{{ $post->slug }}" method="post">
                                    @method('delete')
                                @csrf
                                <x-jet-danger-button                  
                                onclick="return confirm('Apakah anda yakin akan menghapus postingan?')">
                                    <i class="fa-solid fa-trash mx-auto"></i>
                                </x-jet-danger-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
        </div>

    </div> --}}
    
</x-app-layout>
