<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" href="{{ asset('assets/logo.png') }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        @livewireStyles

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Font Awesome --}}
        <script src="https://kit.fontawesome.com/516b6a89c8.js" crossorigin="anonymous"></script>

        {{-- FlowBite --}}
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" /> --}}

        {{-- Trix Editor --}}
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
        <style>
            trix-toolbar [data-trix-button-group='file-tools']{
                display: none
            }
            trix-editor{
                background: white
            }
            trix-toolbar [data-trix-button-group]{ 
                background: white
            }
        </style>
        
    </head>
    <body class="bg-[#F5F5F5]">
        @include('layouts.header')


        <!-- Page wrapper -->
        <div class="flex">

            <!-- Content area -->
            <div class="flex flex-col flex-1 overflow-y-auto overflow-x-hidden " x-ref="contentarea">

                <main>
                    @yield('content')
                </main>

            </div>

        </div>
        {{-- FLOWBITE JS --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
        @livewireScripts
    </body>
</html>
