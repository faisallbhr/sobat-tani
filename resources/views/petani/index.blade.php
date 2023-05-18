<x-app-layout>
    <div id="tabs" class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl">
        @if (session('status'))
        <div id="toast-success" class="flex items-center max-w-5xl w-full p-4 mb-4 text-primary bg-green-100 rounded shadow " role="alert">
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

        <ul class="flex gap-4">
            <li onclick="openCity(event, 'tabs-1')" class="tablinks text-slate-900 text-slate-400 cursor-pointer px-2 py-1 rounded-md mb-2 bg-white shadow">Lowongan buka</li>
            <li onclick="openCity(event, 'tabs-2')" class="tablinks text-slate-400 cursor-pointer px-2 py-1 rounded-md mb-2">Lowongan tutup</li>
        </ul>
        <!-- Cards -->
        <div id="tabs-1" class="tabcontent relative max-w-5xl">
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
                                    <a href="{{ url('/petani/posts/'.$post->slug) }}" >
                                    <button class="bg-primary px-4 py-2 rounded text-white"><span class="fa-solid fa-eye mx-auto"></span>
                                    </button>
                                    </a>
                                </div>
                                <div>
                                    <a href="/petani/posts/{{ $post->slug }}/edit" >
                                    <button class="bg-yellow-500 px-4 py-2 rounded">
                                        <span class="fa-solid fa-edit mx-auto "></span>
                                    </button>
                                    </a>
                                </div>
                                    <form action="/petani/posts/{{ $post->slug }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="bg-red-600 px-4 py-2 rounded text-white"           
                                        onclick="return confirm('Apakah anda yakin akan menghapus postingan?')"><span class="fa-solid fa-trash mx-auto"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="mt-4">
                {{ $posts->links() }}
            </div> --}}
            <a href="{{ url('/petani/posts/create') }}"><button class="bg-primary border border-primary text-white px-4 py-2 font-medium rounded text-sm absolute right-0 mt-4">Tambah postingan</button></a>
        </div>
        <div id="tabs-2" class="tabcontent relative max-w-5xl hidden">
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
                    @foreach ($started as $post)
                        <tr 
                        class="border-b border-neutral-500 bg-neutral-200">
                            <td class="px-6 py-4 text-slate-800 font-medium">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-slate-800">{{ $post->title }}</td>
                            <td class="px-6 py-4 text-slate-800">{{ $post->category->name }}</td>
                            <td class="px-6 py-4  text-slate-800 flex flex-col md:flex-row gap-2 items-center justify-center">
                                <a href="{{ url('/petani/posts/'.$post->slug) }}" >
                                    <button class="bg-primary px-4 py-2 rounded text-white">Lihat detail</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="mt-4">
                {{ $started->links() }}
            </div> --}}
        </div>
    </div>

    <script>
        function openCity(evt, btnName) {
        // Declare all variables
        // let i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        const tabcontent = document.getElementsByClassName("tabcontent");
        for (let i = 0; i < tabcontent.length; i++) {
            tabcontent[i].classList.add('hidden')
        }

        // Get all elements with class="tablinks" and remove the class "active"
        const tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove('bg-white')
            tablinks[i].classList.remove('text-slate-900')
            tablinks[i].classList.remove('shadow')
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        // document.getElementById(btnName).classList.add('flex');
        document.getElementById(btnName).classList.remove('hidden');
        evt.currentTarget.className += " bg-white text-slate-900 shadow";
        }
    </script>
</x-app-layout>
