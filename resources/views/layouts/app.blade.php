<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'FusionClothes') }}</title>

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
        {{-- Favicon --}}
        <link rel="icon" type="image/x-icon" href="{{asset ('storage/black-logo.png')}}" media="(prefers-color-scheme: light)">
        <link rel="icon" type="image/x-icon" href="{{asset ('storage/light-logo.png')}}" media="(prefers-color-scheme: dark)">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- FontAwesome -->
        {{-- <script src="https://kit.fontawesome.com/3518e7db2c.js" crossorigin="anonymous"></script> --}}
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="antialiased">

        <x-banner />

        <div class="min-h-screen flex flex-col">
            {{-- @livewire('navigation-menu') --}}

            <!-- Page Heading -->
            @if (isset($header))
                <x-header />
            @endif


            <!-- Page Content -->
            <div class="flex-1">
                {{ $slot }}
                <x-scroll-top-btn />
            </div>
            <x-footer />
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
