@extends('layouts.main')

@section('content')

    <header class="h-[561px] text-white flex flex-col justify-center items-center text-center" style="background-image: url('{{ asset('assets/header-img.svg') }}')">
        <img src="{{ asset('assets/Logo.svg') }}" alt="" class="">
        <h1 class="font-bold text-5xl">Selamat Datang di Sobat Tani</h1>
        <p class="text-2xl py-2 max-w-4xl">SO-NI merupakan sistem yang kami rancang untuk memudahkan para petani dan buruh tani guna mempermudah keberlangsungan pekerjaan.</p>
    </header>

    <section class=" container mx-auto px-10 py-16 bg-[#]">
        <div class=" flex items-center justify-between">
            <h2 class="font-bold text-3xl">Lowongan</h2>
        </div>

        <div class="grid md:grid-cols-3 lg:grid-cols-6 gap-8 justify-center mt-4">
            @foreach ($posts as $post)
                <div class="rounded-md overflow-hidden shadow-md border bg-white ">
                    <img class="" src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                    <div class="px-4">
                        <h4 class="font-medium text-lg h-12">{{ $post->title }}</h4>
                        <p class="text-primary font-bold text-xl">Rp{{ $post->salary }}/<span class="text-sm">orang</span></p>
                        <div class="flex gap-2 pb-3">
                            <img src="{{ asset('assets/Vector.svg') }}" alt="" class="text-black">
                            <p class="font-medium text-xs">{{ $post->user->name }}</p>
                        </div>
                        <a href="{{ url('/detail/'.$post->slug) }}" class="bg-primary font-semibold text-lg text-white text-center w-full inline-block py-3 rounded-md mb-8">Lihat detail</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-10">
          {{ $posts->links() }}
        </div>
    </section>


    <footer class="bg-white">
        <div class="py-8 shadow-md text-center">
            <p class="text-[#141414]">Copyright 2023 © <span class="text-primary font-bold">Sobat Tani</span></p>
        </div>
    </footer>
@endsection