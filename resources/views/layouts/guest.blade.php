<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
        {{-- Favicon --}}
        <link rel="icon" type="image/x-icon" href="{{asset ('storage/black-logo.png')}}" media="(prefers-color-scheme: light)">
        <link rel="icon" type="image/x-icon" href="{{asset ('storage/light-logo.png')}}" media="(prefers-color-scheme: dark)">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <div class="flex flex-col min-h-screen bg-[#eee]">
            <x-header />
            <div class="flex-1 p-10 text-gray-900 antialiased">
                {{ $slot }}
            </div>
            <x-footer />
        </div>
        @livewireScripts
    </body>
</html>
