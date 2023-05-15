<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl">
        
        <!-- Cards -->
        <div class="py-6 relative max-w-5xl">
            @if (session('status'))
            <div id="toast-success" class="flex items-center w-full p-4 mb-4 text-primary bg-green-100 rounded shadow " role="alert">
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
            <table class="text-left text-sm font-light overflow-hidden rounded-md w-full">
                <thead
                    class="border-b bg-white font-medium">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Aktivitas</th>
                        <th class="px-6 py-4">Biaya</th>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="flex justify-center py-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr 
                        class="border-b border-neutral-500 bg-neutral-200">
                            <td class="px-6 py-4 text-slate-800 font-medium">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-slate-800">{{ $book->activity }}</td>
                            <td class="px-6 py-4 text-slate-800">{{ $book->cost }}</td>
                            <td class="px-6 py-4 text-slate-800">{{ $book->date }}</td>
                            <td class="px-6 py-4  text-slate-800 flex flex-col md:flex-row gap-2 items-center justify-center">
                                <div>
                                    <a href="/petani/books/{{ $book->slug }}/edit" >
                                    <button class="bg-yellow-400 px-4 py-2 rounded hover:bg-yellow-500">
                                        <span class="fa-solid fa-edit mx-auto "></span>
                                    </button>
                                    </a>
                                </div>
                                <form action="/petani/books/{{ $book->slug }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="bg-red-500 px-4 py-2 rounded text-white hover:bg-red-600"           
                                    onclick="return confirm('Apakah anda yakin akan menghapus catatan?')"><span class="fa-solid fa-trash mx-auto"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{-- {{ $books->links() }} --}}
            </div>
            <a href="{{ url('/petani/books/create') }}"><x-jet-button class="absolute right-0 mt-4">Tambah catatan</x-jet-button></a>
        </div>
    </div>
</x-app-layout>