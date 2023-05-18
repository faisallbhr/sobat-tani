<x-app-layout>
<div class="px-4 sm:px-6 lg:px-8 w-full max-w-9xl">

    <div class="max-w-9xl relative mt-10">
        @if ($status)
            @if (session('status'))
            <div id="toast-success" class="flex items-center w-full p-4 text-primary bg-green-100 rounded shadow my-4" role="alert">
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
            <div class="flex justify-start w-full">
                <div class="px-4 sm:px-6 lg:px-8 py-8 max-w-9xl flex justify-center bg-white rounded-md shadow-md">
                    <div class="py-6 max-w-9xl relative w-full"> 
                        <div class="grid grid-cols-2 gap-8 w-full">
                            <img class="rounded-md overflow-hidden h-full" src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                            <div class="text-gray-doang text-lg">
                                <h1 class="font-medium text-5xl text-black">{{ $post->title }}</h1>
                                <h3 class="font-semibold text-4xl py-4 text-black">Rp{{ $post->salary }} <span class="text-2xl text-gray-doang">/orang</span></h3>
                                <h4 class="font-semibold text-2xl text-black">Deskripsi Pekerjaan</h4>
                                <p>{!! $post->body !!}</p>
                                <h4 class="font-semibold text-2xl pt-4 text-black">Alamat</h4>
                                <p class="text-gray-doang text-lg">{{ $post->address->name }}, {{ $post->address->district->name }}, {{ $post->address->district->regency->name }}, {{ $post->address->district->regency->province->name }}</p>
                                <div class="flex gap-4 absolute right-0 bottom-0">
                                    <a href="{{ url('/petani/posts') }}"><button class="bg-white border border-primary text-primary px-4 py-2 font-medium rounded text-sm mt-4">Kembali</button></a>
                                    <p class="mt-4 bg-gray-200 px-4 py-2 rounded font-medium text-gray-400 text-sm">Mulai pekerjaan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($reports as $report)
                <img src="{{ asset('storage/'.$report->image) }}" class="max-w-xl" alt="report-image">
                <p>{!! $report->deskripsi !!}</p>
            @endforeach
        @else
            @if (session('status'))
            <div id="toast-success" class="flex items-center w-full p-4 text-primary bg-green-100 rounded shadow my-4" role="alert">
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
            <div class="flex justify-start w-full">
                <div class="px-4 sm:px-6 lg:px-8 py-8 max-w-9xl flex justify-center bg-white rounded-md shadow-md">
                    <div class="py-6 max-w-9xl relative w-full"> 
                        <div class="grid grid-cols-2 gap-8 w-full">
                            <img class="rounded-md overflow-hidden h-full" src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                            <div class="text-gray-doang text-lg">
                                <h1 class="font-medium text-5xl text-black">{{ $post->title }}</h1>
                                <h3 class="font-semibold text-4xl py-4 text-black">Rp{{ $post->salary }} <span class="text-2xl text-gray-doang">/orang</span></h3>
                                <h4 class="font-semibold text-2xl text-black">Deskripsi Pekerjaan</h4>
                                <p>{!! $post->body !!}</p>
                                <h4 class="font-semibold text-2xl pt-4 text-black">Alamat</h4>
                                <p class="text-gray-doang text-lg">{{ $post->address->name }}, {{ $post->address->district->name }}, {{ $post->address->district->regency->name }}, {{ $post->address->district->regency->province->name }}</p>
                                <div class="flex gap-4 absolute right-0 bottom-0">
                                    <a href="{{ url('/petani/posts') }}"><button class="bg-white border border-primary text-primary px-4 py-2 font-medium rounded text-sm mt-4">Kembali</button></a>
                                    <form action="{{ url('petani/posts/'.$post->slug)}}" method="POST">
                                        @method('patch')
                                        @csrf
                                        <button class="mt-4 bg-primary border border-primary text-white px-4 py-2 font-medium rounded text-sm"           
                                        onclick="return confirm('Apakah anda yakin akan mengubah status menjadi memulai pekerjaan?')">Mulai pekerjaan
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (count($accept) !== 0)
            <table class="text-left text-sm font-light overflow-hidden rounded-md w-full mt-10">
                <thead
                    class="border-b bg-white font-medium">
                    <tr>
                        <th class="py-4 text-center">No</th>
                        <th class="px-6 py-4">Nama</th>
                        <th class="py-4 text-center">Gender</th>
                        <th class="flex justify-center py-4">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accept as $acc)
                        <tr 
                        class="border-b border-neutral-500 bg-neutral-200">
                            <td class="py-4 text-slate-800 font-medium text-center">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-slate-800">{{ $acc->user->name }}</td>
                            <td class="py-4 text-slate-800 text-center">{{ $acc->user->gender->name }}</td>
                            <td class="py-4 text-slate-800 flex justify-center">
                                <p class="bg-green-500 text-xs px-4 py-2 font-semibold rounded">Telah disetujui</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            
            @if (count($waiting) !== 0)
            <table id="tableId" class="text-left text-sm font-light overflow-hidden rounded-md w-full mt-10">
                <thead
                    class="border-b bg-white font-medium">
                    <tr>
                        <th class="py-4 text-center">No</th>
                        <th class="px-6 py-4">Nama</th>
                        <th class="py-4 text-center">Gender</th>
                        <th class="flex justify-center py-4">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($waiting as $wait)
                        <tr 
                        class="border-b border-neutral-500 bg-neutral-200">
                            <td class="py-4 text-slate-800 font-medium text-center">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-slate-800">{{ $wait->user->name }}</td>
                            <td class="py-4 text-slate-800 text-center">{{ $wait->user->gender->name }}</td>
                            <td class="py-4 text-slate-800 flex justify-center gap-2">
                                <form action="{{ url('/petani/accept/'. $wait->id) }}">
                                    @method('put')
                                    @csrf
                                    <button id="btn-acc" class="bg-green-500 px-4 py-2 rounded text-white hover:bg-green-600"           
                                    onclick="return confirm('Apakah anda yakin akan menerima pendaftar?')"><span class="fa-solid fa-check mx-auto"></span>
                                    </button>
                                </form>                        
                                <form action="{{ url('/petani/reject/'. $wait->id) }}" >
                                    @method('delete')
                                    @csrf
                                    <button id="btn-reject" class="bg-red-500 px-4 py-2 rounded text-white hover:bg-red-600"           
                                    onclick="return confirm('Apakah anda yakin akan menolak pendaftar?')"><span class="fa-solid fa-x mx-auto"></span>
                                    </button>
                                </form>                        
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        @endif
    </div>
</div>
</x-app-layout>
