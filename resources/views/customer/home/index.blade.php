<x-app-layout>
    <x-slot name="header"></x-slot>
    <x-slot name="header_nav"></x-slot>
    <div>
        <h1>Home Page</h1>
        @guest
            <p>Welcome! Feel free to <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a>.</p>
        @endguest

        @auth
            <p>Welcome back, {{ Auth::user()->name }}!</p>
        @endauth
    </div>
</x-app-layout>
