<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 w-full max-w-9xl">
        <div class="max-w-9xl relative mt-10">
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
                @if (session('failed'))
                <div id="toast-success" class="flex items-center w-full p-4 text-red-500 bg-red-100 rounded shadow my-4" role="alert">
                    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ml-3 text-sm font-medium">{{ session('failed') }}</div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                @endif 
                <div class="flex justify-start w-full">
                    <div class="px-4 sm:px-6 lg:px-8 py-8 max-w-9xl flex justify-center bg-white rounded-md shadow-md">
                        <div class="py-6 max-w-9xl relative w-full card-content"> 
                            <div class="grid grid-cols-2 gap-8 w-full">
                                <img class="rounded-md overflow-hidden h-full" src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                                <div class="text-gray-doang text-lg">
                                    <h1 class="font-medium text-5xl text-black">{{ $post->title }}</h1>
                                    <small>Upload pada tanggal: {{ $post->created_at->format('d-m-Y') }}</small>
                                    <h3 class="font-semibold text-4xl py-4 text-black">@currency($post->salary) <span class="text-2xl text-gray-doang">/orang</span></h3>
                                    <h4 class="font-semibold text-2xl text-black">Deskripsi Pekerjaan</h4>
                                    <p>{!! $post->body !!}</p>
                                        <h4 class="font-semibold text-2xl text-black pt-4">Deadline Pengerjaan</h4>
                                        <p>{{ $post->deadline->format('d-m-Y') }}</p>
                                    <h4 class="font-semibold text-2xl pt-4 text-black">Alamat</h4>
                                    <p class="text-gray-doang text-lg">{{ $post->address->name }}, {{ $post->address->district->name }}, {{ $post->address->district->regency->name }}, {{ $post->address->district->regency->province->name }}</p>
                                    <div class="flex gap-4 justify-end">
                                        <a href="{{ url('/admin/posts') }}"><button class="bg-white border border-primary text-primary px-4 py-2 font-medium rounded text-sm mt-4">Kembali</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($invoice)
                <div class="bg-white w-full my-10 rounded shadow-md">
                    <h3 class="px-4 pt-8 font-bold text-xl">Bukti pembayaran:</h3>
                    <div class="grid grid-cols-2 gap-8 py-8 mx-4 border-b">
                        <img src="{{ asset('storage/'.$invoice->invoice) }}" class="max-w-xl w-full rounded-md h-80 object-contain border p-4" alt="invoice-image">
                        <div class="relative w-full">
                            <p class="font-bold mt-2">Total yang harus dibayar: <span class="font-normal">@currency((($post->salary)*(count($accept))+5000))</span></p>
                            <small class="text-gray-doang absolute bottom-4">Upload pada tanggal: {{ $invoice->updated_at->format('d-m-Y') }}</small>
                            <div class="flex gap-4 absolute bottom-12">
                                @if (! $invoice->status)
                                <form action="{{ url('/admin/posts/'.$post->id) }}" method="post">
                                    @method('put')
                                    @csrf
                                    <button id="btn-acc" class="bg-green-500 px-4 py-2 rounded text-white hover:bg-green-600"           
                                    onclick="return confirm('Apakah anda yakin akan menerima pendaftar?')">Setujui bukti pembayaran
                                    </button>
                                </form>                        
                                <form action="{{ url('/admin/posts/'.$post->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button id="btn-reject" class="bg-red-500 px-4 py-2 rounded text-white hover:bg-red-600"           
                                    onclick="return confirm('Apakah anda yakin akan menolak pendaftar?')">Tolak bukti pembayaran
                                    </button>
                                </form>   
                                @else
                                <p class="bg-gray-doang px-4 py-2 rounded text-white">Bukti telah disetujui</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
    
                <div class="bg-white w-full rounded shadow-md px-4 py-10 my-10">
                    <h3 class="font-bold text-xl">Daftar pekerja:</h3>
                    <table class="text-left text-sm font-light overflow-hidden rounded-md w-full my-4">
                        <thead
                            class="border-b bg-neutral-200 font-medium">
                            <tr>
                                <th class="px-6 py-4">No</th>
                                <th class="px-6 py-4">Nama</th>
                                <th class="px-6 py-4">Nomor Rekening</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accept as $acc)
                                <tr 
                                class="border-b border-neutral-500 bg-neutral-100">
                                    <td class="px-6 py-4 text-slate-800 font-medium w-[10px] text-center">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 text-slate-800">{{ $acc->user->name }}</td>
                                    <td class="px-6 py-4 text-slate-800">{{ $acc->user->no_rekening }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    
    <script>
        const btn = document.querySelector('#btn');
        const btnBack = document.querySelector('#btnBack'); 
        const form = document.querySelector('#toForm');
        
        btn.addEventListener('click', function(){
            form.classList.toggle('hidden')
            form.classList.toggle('flex')
        })
        btnBack.addEventListener('click', function(){
            form.classList.toggle('hidden')
            form.classList.toggle('flex')
        })
    </script>
    </x-app-layout>
    