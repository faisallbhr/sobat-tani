<div>
    <!-- Sidebar -->
    <div
        id="sidebar"
        class="flex flex-col absolute z-50 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-white p-4 transition-all duration-200 ease-in-out"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'"
        @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false"
        x-cloak="lg"
    >

        <!-- Sidebar header -->
        <div class="flex justify-center mb-10 pr-3 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-slate-500 hover:text-slate-400" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
            <!-- Logo -->
            <a href="/" class="flex items-center gap-1">
                <img src="{{ asset('assets/logo.png') }}" alt="" class="w-16">
                <p class="font-extrabold text-xl text-primary">Sobat Tani</p>
            </a> 
        </div>

        <!-- Links -->
        <div class="space-y-8">
            <!-- Pages group -->
            <div>
                <h3 class="text-xs uppercase text-slate-100 font-semibold pl-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block text-slate-900">Pages</span>
                </h3>
                <ul class="mt-3">
                    <!-- Dashboard -->
                    <li class="px-3 py-2 rounded mb-0.5 last:mb-0 {{ request()->segment(1) === 'dashboard' ? 'bg-gray-300 rounded':'' }}">
                        <a class="block text-slate-900 hover:text-black truncate transition duration-100 @if(in_array(Request::segment(1), ['dashboard'])){{ 'text-black' }}@endif" href="{{ route('dashboard') }}" >
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path class="fill-current @if(in_array(Request::segment(1), ['dashboard'])){{ 'text-primary' }}@else{{ 'text-slate-400' }}@endif" d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z" />
                                    <path class="fill-current @if(in_array(Request::segment(1), ['dashboard'])){{ 'text-green-600' }}@else{{ 'text-slate-600' }}@endif" d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z" />
                                    <path class="fill-current @if(in_array(Request::segment(1), ['dashboard'])){{ 'text-indigo-200' }}@else{{ 'text-slate-400' }}@endif" d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z" />
                                </svg>
                                <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-100">Dashboard</span>
                            </div>
                        </a>
                    </li>

                    
                    <!-- Petani -->
                    @can('petani')
                    <li class="px-3 py-2 rounded mb-0.5 last:mb-0 @if(in_array(Request::segment(1), ['petani'])){{ 'bg-gray-300 rounded' }}@endif" x-data="{ open: {{ in_array(Request::segment(1), ['petani']) ? 1 : 0 }} }">
                        <a class="block text-slate-900 hover:text-black truncate transition duration-100 @if(in_array(Request::segment(1), ['petani'])){{ 'text-black' }}@endif" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current @if(in_array(Request::segment(1), ['petani'])){{ 'text-green-500' }}@else{{ 'text-slate-600' }}@endif" d="M18.974 8H22a2 2 0 012 2v6h-2v5a1 1 0 01-1 1h-2a1 1 0 01-1-1v-5h-2v-6a2 2 0 012-2h.974zM20 7a2 2 0 11-.001-3.999A2 2 0 0120 7zM2.974 8H6a2 2 0 012 2v6H6v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5H0v-6a2 2 0 012-2h.974zM4 7a2 2 0 11-.001-3.999A2 2 0 014 7z" />
                                        <path class="fill-current @if(in_array(Request::segment(1), ['petani'])){{ 'text-primary' }}@else{{ 'text-slate-400' }}@endif" d="M12 6a3 3 0 110-6 3 3 0 010 6zm2 18h-4a1 1 0 01-1-1v-6H6v-6a3 3 0 013-3h6a3 3 0 013 3v6h-3v6a1 1 0 01-1 1z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-100">Petani</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-100">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if(in_array(Request::segment(1), ['#'])){{ 'rotate-180' }}@endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1 @if(!in_array(Request::segment(1), ['petani'])){{ 'hidden' }}@endif" :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-700 transition duration-100 truncate @if(Route::is('posts.*')){{ '!text-slate-800' }}@endif" href="{{ url('/petani/posts') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-100">Posting Lowongan</span>
                                    </a>
                                </li>
                                {{-- <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-700 transition duration-100 truncate @if(Route::is('tasks-list')){{ '!text-slate-800' }}@endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-100">Pembayaran</span>
                                    </a>
                                </li> --}}
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-700 transition duration-100 truncate @if(Route::is('books.*')){{ '!text-slate-800' }}@endif" href="{{ url('petani/books') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-100">Pencatatan Pengeluaran</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endcan

                    <!-- Buruh Tani -->
                    @can('buruh tani')
                    <li class="px-3 py-2 rounded mb-0.5 last:mb-0 @if(in_array(Request::segment(1), ['buruhtani'])){{ 'bg-gray-300' }}@endif" x-data="{ open: {{ in_array(Request::segment(1), ['buruhtani']) ? 1 : 0 }} }">
                        <a class="block text-slate-900 hover:text-black truncate transition duration-100 @if(in_array(Request::segment(1), ['#'])){{ 'text-black' }}@endif" href="#" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current @if(in_array(Request::segment(1), ['buruhtani'])){{ 'text-primary' }}@else{{ 'text-slate-600' }}@endif" d="M8 1v2H3v19h18V3h-5V1h7v23H1V1z" />
                                        <path class="fill-current @if(in_array(Request::segment(1), ['buruhtani'])){{ 'text-primary' }}@else{{ 'text-slate-600' }}@endif" d="M1 1h22v23H1z" />
                                        <path class="fill-current @if(in_array(Request::segment(1), ['buruhtani'])){{ 'text-green-500' }}@else{{ 'text-slate-400' }}@endif" d="M15 10.586L16.414 12 11 17.414 7.586 14 9 12.586l2 2zM5 0h14v4H5z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-100">Buruh Tani</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-100">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if(in_array(Request::segment(1), ['#'])){{ 'rotate-180' }}@endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1 @if(!in_array(Request::segment(1), ['buruhtani'])){{ 'hidden' }}@endif" :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-700 transition duration-100 truncate @if(Route::is('wait.*')){{ '!text-slate-800' }}@endif" href="{{ url('/buruhtani/wait') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-100">Lowongan terdaftar</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-700 transition duration-100 truncate @if(Route::is('accept.*')){{ '!text-slate-800' }}@endif" href="{{ url('/buruhtani/accept') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-100">Daftar pekerjaan</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endcan
                    
                    @can('admin')
                    <li class="px-3 py-2 rounded mb-0.5 last:mb-0 @if(in_array(Request::segment(1), ['admin'])){{ 'bg-gray-300' }}@endif" x-data="{ open: {{ in_array(Request::segment(1), ['admin']) ? 1 : 0 }} }">
                        <a class="block text-slate-900 hover:text-black truncate transition duration-100 @if(in_array(Request::segment(1), ['#'])){{ 'text-black' }}@endif" href="#" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current @if(in_array(Request::segment(1), ['admin'])){{ 'text-green-600' }}@else{{ 'text-slate-700' }}@endif" d="M4.418 19.612A9.092 9.092 0 0 1 2.59 17.03L.475 19.14c-.848.85-.536 2.395.743 3.673a4.413 4.413 0 0 0 1.677 1.082c.253.086.519.131.787.135.45.011.886-.16 1.208-.474L7 21.44a8.962 8.962 0 0 1-2.582-1.828Z" />
                                        <path class="fill-current @if(in_array(Request::segment(1), ['admin'])){{ 'text-green-500' }}@else{{ 'text-slate-600' }}@endif" d="M10.034 13.997a11.011 11.011 0 0 1-2.551-3.862L4.595 13.02a2.513 2.513 0 0 0-.4 2.645 6.668 6.668 0 0 0 1.64 2.532 5.525 5.525 0 0 0 3.643 1.824 2.1 2.1 0 0 0 1.534-.587l2.883-2.882a11.156 11.156 0 0 1-3.861-2.556Z" />
                                        <path class="fill-current @if(in_array(Request::segment(1), ['admin'])){{ 'text-primary' }}@else{{ 'text-slate-400' }}@endif" d="M21.554 2.471A8.958 8.958 0 0 0 18.167.276a3.105 3.105 0 0 0-3.295.467L9.715 5.888c-1.41 1.408-.665 4.275 1.733 6.668a8.958 8.958 0 0 0 3.387 2.196c.459.157.94.24 1.425.246a2.559 2.559 0 0 0 1.87-.715l5.156-5.146c1.415-1.406.666-4.273-1.732-6.666Zm.318 5.257c-.148.147-.594.2-1.256-.018A7.037 7.037 0 0 1 18.016 6c-1.73-1.728-2.104-3.475-1.73-3.845a.671.671 0 0 1 .465-.129c.27.008.536.057.79.146a7.07 7.07 0 0 1 2.6 1.711c1.73 1.73 2.105 3.472 1.73 3.846Z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Admin Board</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-100">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if(in_array(Request::segment(1), ['#'])){{ 'rotate-180' }}@endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1 @if(!in_array(Request::segment(1), ['admin'])){{ 'hidden' }}@endif" :class="open ? '!block' : 'hidden'">
                                {{-- <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-700 transition duration-100 truncate @if(Route::is('admin-posts.*')){{ '!text-slate-800' }}@endif" href="{{ url('/admin/posts') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-100">Lowongan</span>
                                    </a>
                                </li> --}}
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-700 transition duration-100 truncate @if(Route::is('admin-payment.*')){{ '!text-slate-800' }}@endif" href="{{ url('/admin/payment') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-100">Bukti pembayaran</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endcan

                </ul>
            </div>
        </div>
    </div>
</div>