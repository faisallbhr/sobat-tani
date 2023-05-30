<x-app-layout>
<div class="px-4 sm:px-6 lg:px-8 w-full max-w-9xl">
    <div class="max-w-9xl relative mt-10">
        @if ($status)
            @if (($invoice))
            @if ($invoice->status)
            <div id="toast-success" class="flex items-center w-full p-4 text-primary bg-green-100 rounded shadow my-4" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-primary bg-green-100">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-medium">Bukti pembayaran telah disetujui</div>

            </div>
            @endif
            @endif  
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
                                @if ($status)
                                    <h4 class="font-semibold text-2xl text-black pt-4">Deadline Pengerjaan</h4>
                                    <p>{{ $post->deadline->format('d-m-Y') }}</p>
                                @else
                                    <h4 class="font-semibold text-2xl text-black pt-4">Lama Pengerjaan</h4>
                                    <p>{{ $post->work_duration }} hari</p>
                                @endif
                                <h4 class="font-semibold text-2xl pt-4 text-black">Alamat</h4>
                                <p class="text-gray-doang text-lg">{{ $post->address->name }}, {{ $post->address->district->name }}, {{ $post->address->district->regency->name }}, {{ $post->address->district->regency->province->name }}</p>
                                <div class="flex gap-4 justify-end">
                                    <a href="{{ url('/petani/posts') }}"><button class="bg-white border border-primary text-primary px-4 py-2 font-medium rounded text-sm mt-4">Kembali</button></a>
                                    @if ($post->deadline->isPast() && ! $invoice)
                                    <button id="btn" class="mt-4 bg-red-500 hover:bg-red-700 border border-red-800 text-white px-4 py-2 font-medium rounded text-sm">Bayar</button>
                                    @elseif ($invoice && ! $invoice->status)
                                    <button id="btn" class="mt-4 bg-red-500 hover:bg-red-700 border border-red-800 text-white px-4 py-2 font-medium rounded text-sm">Ubah bukti pembayaran</button>
                                    @elseif ($invoice->status)
                                    @else
                                    <p class="mt-4 bg-gray-200 px-4 py-2 rounded font-medium text-gray-400 text-sm">Mulai pekerjaan</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- MODAL KIRIM INVOICE --}}
            <div id="toForm" class="hidden mx-auto my-10 flex z-50 justify-center items-center  bg-white w-full">
                <div class="px-4 py-10 bg-white w-full h-fit rounded shadow-md">
                    <form id="myForm" action="{{ url('invoice/') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" value="{{ $post->id }}" class="hidden" name="vacancies_id">
                        <label class="block mb-2 text-sm font-medium" for="file_input">Upload foto bukti pembayaran</label>
                        <input name="image" id="image" class="block w-full text-sm border border-gray-300 rounded cursor-pointer bg-gray-50 focus:outline-none" type="file">
                        <input type="text" value="{{ $post->id }}" class="hidden" name="vacancy_id">
                    </form>
                    <small class="text-red-500">Total yang harus dibayarkan: @currency((($post->salary)*(count($accept)))+5000)</small>
                    <small>(biaya admin: @currency(5000))</small>
                    <div class="flex justify-end gap-2">
                        <button id="btnBack" class="mt-4 bg-white border border-primary text-primary px-4 py-2 font-medium rounded text-sm">Batal</button>
                        <button form="myForm" class="mt-4 bg-primary border border-primary text-white px-4 py-2 font-medium rounded text-sm">Kirim</button>
                    </div>  
                </div>
            </div>
            {{-- MODAL KIRIM INVOICE --}}
            
            <div class=" mx-auto relative">
                @if ($invoice)
                <div class="bg-white w-full my-10 rounded shadow-md">
                    <h3 class="px-4 pt-8 font-bold text-xl">Bukti pembayaran:</h3>
                    <div class="py-8 mx-4 border-b">
                        <img src="{{ asset('storage/'.$invoice->invoice) }}" class="w-full rounded-md object-contain border p-4 mb-4 h-96" alt="invoice-image">
                        <small class="text-gray-doang absolute bottom-4 right-4">Upload pada tanggal: {{ $invoice->updated_at->format('d-m-Y') }}</small>
                    </div>
                </div>
                @endif
            </div>

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
            {{-- LAPORAN --}}
            @if (count($reports) > 0)
            <div class="bg-white w-full my-10 rounded shadow-md">
                <h3 class="px-4 pt-8 font-bold text-xl">Laporan:</h3>
                @foreach ($reports as $report)
                <div class="flex gap-8 py-8 mx-4 border-b">
                    <img src="{{ asset('storage/'.$report->image) }}" class="max-w-xl w-full rounded-md h-80 object-contain border p-4" alt="report-image">
                    <div class="relative w-full">
                        <p class="font-bold">Nama<span class="ml-[95.5px]">: {{ $report->stat_vacancy->user->name }}</span></p>
                        <p class="font-bold mt-2">Deskripsi laporan : <span>{!! $report->deskripsi !!}</span></p>
                        <small class="text-gray-doang absolute bottom-4">Upload pada tanggal: {{ $report->updated_at->format('d-m-Y') }}</small>
                    </div>
                </div>
                @endforeach
            </div>
            @endif


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
            <div class="flex justify-start w-full ">
                <div class="px-4 sm:px-6 lg:px-8 py-8 max-w-9xl flex justify-center bg-white rounded-md shadow-md">
                    <div class="py-6 max-w-9xl relative w-full"> 
                        <div class="grid grid-cols-2 gap-8 w-full">
                            <img class="rounded-md overflow-hidden h-full" src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                            <div class="text-gray-doang text-lg">
                                <h1 class="font-medium text-5xl text-black">{{ $post->title }}</h1>
                                <h3 class="font-semibold text-4xl pt-4 text-black">@currency($post->salary) <span class="text-2xl text-gray-doang">/orang</span></h3>
                                <small>Upload pada tanggal: {{ $post->created_at->format('d-m-Y') }}</small>
                                <h4 class="font-semibold text-2xl text-black pt-4">Deskripsi Pekerjaan</h4>
                                <p>{!! $post->body !!}</p>
                                <h4 class="font-semibold text-2xl text-black pt-4">Lama Pengerjaan</h4>
                                <p>{{ $post->work_duration }} hari</p>
                                <h4 class="font-semibold text-2xl pt-4 text-black">Alamat</h4>
                                <p class="text-gray-doang text-lg">{{ $post->address->name }}, {{ $post->address->district->name }}, {{ $post->address->district->regency->name }}, {{ $post->address->district->regency->province->name }}</p>
                                <div class="flex gap-4 justify-end">
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

            {{-- LIST PENDAFTAR --}}
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
