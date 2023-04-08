<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        @livewireStyles

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Font Awesome --}}
        <script src="https://kit.fontawesome.com/516b6a89c8.js" crossorigin="anonymous"></script>

    </head>
    <body>
        @include('layouts.header')


        {{-- <header class="sticky top-0 bg-white border-b border-slate-200 z-30">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16 -mb-px">
        
                    <!-- Header: Left side -->
                    <div class="flex">
                        
                        <!-- Hamburger button -->
                        <button
                            class="text-slate-500 hover:text-slate-600 lg:hidden"
                            @click.stop="sidebarOpen = !sidebarOpen"
                            aria-controls="sidebar"
                            :aria-expanded="sidebarOpen"
                        >
                            <span class="sr-only">Open sidebar</span>
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <rect x="4" y="5" width="16" height="2" />
                                <rect x="4" y="11" width="16" height="2" />
                                <rect x="4" y="17" width="16" height="2" />
                            </svg>
                        </button>
        
                    </div>
        
                    <!-- Header: Right side -->
                    <div class="flex items-center space-x-3">
        
                        <!-- User button -->
                        <x-dropdown-profile align="right" />
        
                    </div>
        
                </div>
            </div>
        </header> --}}


        <!-- Page wrapper -->
        <div class="flex">

            <!-- Content area -->
            <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden " x-ref="contentarea">

                <main>
                    @yield('content')
                </main>

            </div>

        </div>

        @livewireScripts
    </body>
</html>
