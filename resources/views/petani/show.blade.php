<x-app-layout>
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl">
    <div class="py-6 max-w-9xl relative">

        <div class="flex justify-start w-full ">
            <div class="px-4 sm:px-6 lg:px-8 py-8 max-w-9xl flex justify-center bg-white mt-10 rounded-md shadow-md">
                <div class="py-6 max-w-9xl relative w-full">
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif   
                    <div class="grid grid-cols-2 gap-8 w-full">
                        <img class="rounded-md overflow-hidden h-full" src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                        <div class="text-gray-doang text-lg">
                            <h1 class="font-medium text-5xl text-black">{{ $post->title }}</h1>
                            <h3 class="font-semibold text-4xl py-4 text-black">Rp{{ $post->salary }} <span class="text-2xl text-gray-doang">/orang</span></h3>
                            <h4 class="font-semibold text-2xl text-black">Deskripsi Pekerjaan</h4>
                            <p>{!! $post->body !!}</p>
                            <h4 class="font-semibold text-2xl pt-4 text-black">Alamat</h4>
                            <p class="text-gray-doang text-lg">{{ $post->address->name }}, {{ $post->address->district->name }}, {{ $post->address->district->regency->name }}, {{ $post->address->district->regency->province->name }}</p>
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

        <a href="{{ url('/petani/posts') }}"><x-jet-button class="absolute right-0 mt-4">Kembali</x-jet-button></a>
    </div>
</div>
</x-app-layout>
