@extends('layouts.main')

@section('content')

    <header class=" h-[28rem] bg-slate-100">
        <div class=" container mx-auto px-4 flex h-full py-6 items-center">
            <div class=" max-w-xl">
                <p class=" text-sky-500 uppercase tracking-wider">knowleddge base</p>

                <h2 class=" text-3xl xl:text-4xl font-bold mt-4 text-gray-800 capitalize">All Resurece You Need to grow</h2>

                <p class=" text-gray-500 mt-4 text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta error odit vel minima optio consequuntur atque omnis, repellendus eos, rerum totam quas vitae voluptatibus, facere distinctio fugit? Nam, iure expedita!</p>
            </div>
        </div>
    </header>

    <section class=" container mx-auto px-10 py-16">
        <div class=" flex items-center justify-between">
            <h2 class=" text-gray-800 font-bold text-3xl">Latest Articles</h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 justify-center">
          @foreach ($posts as $post)
            <a href="/detail/{{ $post->slug }}">
                <div class="max-w-sm border border-slate-200 rounded-md">
                <div class="p-4 shadow-lg ">
                    <img class="object-cover object-center rounded-md" src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">

                    <div class="mt-8">

                        <h1 class="mt-4 text-xl font-semibold text-gray-800 h-10 md:h-20 overflow-y-hidden">
                            {{ $post->title }}
                        </h1>

                        <div class="mt-4 text-gray-500 h-40 overflow-y-hidden">
                            {!! $post->body !!}
                        </div>
                    </div>
                </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="mt-10">
          {{ $posts->links() }}
        </div>
    </section>


    <footer class="bg-white mt-12 dark:bg-gray-900">
        <div class="container px-4 py-12 mx-auto">
            
            <div class="flex flex-col items-center justify-between sm:flex-row">
                <a class="text-2xl font-medium text-sky-500 transition-colors flex items-center duration-300 transform dark:text-sky-400 hover:text-sky-400 dark:hover:text-sky-300" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
                    </svg>

                    <h3 class="mx-2">Blog</h3>
                </a>
                <p class="mt-4 text-sm text-gray-500 sm:mt-0 dark:text-gray-300">© Copyright 2021. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
@endsection