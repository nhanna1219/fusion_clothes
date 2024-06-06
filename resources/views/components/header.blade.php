<header class="bg-white px-12 py-5 shadow-md min-w-full">
    <div class="mx-auto flex justify-between items-center">
        <!-- Logo and brand name -->
        <div class="brand flex items-center space-x-4">
            <a href="/" class="flex items-center space-x-4">
                <!-- Ensure the path to the logo is correctly referenced -->
                <img src="{{ asset('storage/black-logo.png') }}" alt="Logo" class="h-10">
                <span class="font-bold text-xl tracking-wide">FUSION CLOTH</span>
            </a>
        </div>
        <!-- Navigation -->
        <nav class="flex justify-between items-center align-middle mb-2 w-[38%]">
            <a href="/home"
                class="text-[#413e3e] hover:text-red-600 font-semibold relative before:content-[''] before:absolute before:w-0 before:h-0.5 before:bg-red-600 before:transition-all before:duration-300 before:-bottom-1 before:left-1/2 before:transform before:translate-x-[-50%] hover:before:w-full">Home</a>
            <a href="/products"
                class="text-[#413e3e] hover:text-red-600 font-semibold relative before:content-[''] before:absolute before:w-0 before:h-0.5 before:bg-red-600 before:transition-all before:duration-300 before:-bottom-1 before:left-1/2 before:transform before:translate-x-[-50%] hover:before:w-full">Shop</a>
            <a href="/about"
                class="text-[#413e3e] hover:text-red-600 font-semibold relative before:content-[''] before:absolute before:w-0 before:h-0.5 before:bg-red-600 before:transition-all before:duration-300 before:-bottom-1 before:left-1/2 before:transform before:translate-x-[-50%] hover:before:w-full">About
                Us</a>
            <a href="/contact"
                class="text-[#413e3e] hover:text-red-600 font-semibold relative before:content-[''] before:absolute before:w-0 before:h-0.5 before:bg-red-600 before:transition-all before:duration-300 before:-bottom-1 before:left-1/2 before:transform before:translate-x-[-50%] hover:before:w-full">Contact
                Us</a>
        </nav>
        <!-- Icons -->
        <div class="flex items-center space-x-4 justify-between w-60">
            <a id="search" class="hover:text-gray-600 cursor-pointer">
                <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g data-name="Layer 2"><g data-name="search"><rect width="24" height="24" opacity="0"/><path d="M20.71 19.29l-3.4-3.39A7.92 7.92 0 0 0 19 11a8 8 0 1 0-8 8 7.92 7.92 0 0 0 4.9-1.69l3.39 3.4a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42zM5 11a6 6 0 1 1 6 6 6 6 0 0 1-6-6z"/></g></g></svg>
            </a>
            <a href="/favorites" class="hover:text-gray-600">
                <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g data-name="Layer 2">
                        <g data-name="heart">
                            <rect width="24" height="24" opacity="0" />
                            <path
                                d="M12 21a1 1 0 0 1-.71-.29l-7.77-7.78a5.26 5.26 0 0 1 0-7.4 5.24 5.24 0 0 1 7.4 0L12 6.61l1.08-1.08a5.24 5.24 0 0 1 7.4 0 5.26 5.26 0 0 1 0 7.4l-7.77 7.78A1 1 0 0 1 12 21zM7.22 6a3.2 3.2 0 0 0-2.28.94 3.24 3.24 0 0 0 0 4.57L12 18.58l7.06-7.07a3.24 3.24 0 0 0 0-4.57 3.32 3.32 0 0 0-4.56 0l-1.79 1.8a1 1 0 0 1-1.42 0L9.5 6.94A3.2 3.2 0 0 0 7.22 6z" />
                        </g>
                    </g>
                </svg>
            </a>
            <a href="/cart" class="hover:text-gray-600 relative">
                <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g data-name="Layer 2">
                        <g data-name="shopping-cart">
                            <rect width="24" height="24" opacity="0" />
                            <path
                                d="M21.08 7a2 2 0 0 0-1.7-1H6.58L6 3.74A1 1 0 0 0 5 3H3a1 1 0 0 0 0 2h1.24L7 15.26A1 1 0 0 0 8 16h9a1 1 0 0 0 .89-.55l3.28-6.56A2 2 0 0 0 21.08 7zm-4.7 7H8.76L7.13 8h12.25z" />
                            <circle cx="7.5" cy="19.5" r="1.5" />
                            <circle cx="17.5" cy="19.5" r="1.5" />
                        </g>
                    </g>
                </svg>
                <span
                    class="absolute top-[-10px] right-[-10px] inline-block w-[1.17rem] h-[1.18rem] bg-red-600 text-white text-[0.55em] font-bold rounded-full text-center"
                    id="cart-count" style="line-height:2.1">
                    @auth
                        {{ Cart::instance('db')->count() }}
                    @else
                        {{ Cart::instance('default')->count() }}
                    @endauth
                </span>
            </a>
            @auth
                @livewire('navigation-menu')
            @endauth
            @guest
                <a href="/login " class="hover:text-gray-600">
                    <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g data-name="Layer 2">
                            <g data-name="person">
                                <rect width="24" height="24" opacity="0" />
                                <path d="M12 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4zm0-6a2 2 0 1 1-2 2 2 2 0 0 1 2-2z" />
                                <path d="M12 13a7 7 0 0 0-7 7 1 1 0 0 0 2 0 5 5 0 0 1 10 0 1 1 0 0 0 2 0 7 7 0 0 0-7-7z" />
                            </g>
                        </g>
                    </svg>
                </a>
            @endguest
        </div>

        <!-- Livesearch Modal -->

    </div>
</header>
<div id="search-modal" class="h-[100vh] w-[100vw] fixed flex justify-center items-start pt-[10rem] z-[100] hidden" style="backdrop-filter: blur(6px);">
    <div class="w-[60%] flex items-center p-[1rem] bg-white rounded" style="box-shadow: 0 1rem 1rem rgba(0, 0, 0, .2);">
        @livewire('search-products')
        <button id="close-search" class="w-[1.75rem] h-[1.5rem] rounded-[.375rem] flex items-center border-[#f1f5f9]" style="background-position: 50%; padding: .25rem .375rem; border: 1px solid #e5e7eb;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="7" fill="none">
                <path d="M.506 6h3.931V4.986H1.736v-1.39h2.488V2.583H1.736V1.196h2.69V.182H.506V6ZM8.56 1.855h1.18C9.721.818 8.87.102 7.574.102c-1.276 0-2.21.705-2.205 1.762-.003.858.602 1.35 1.585 1.585l.634.159c.633.153.986.335.988.727-.002.426-.406.716-1.03.716-.64 0-1.1-.295-1.14-.878h-1.19c.03 1.259.931 1.91 2.343 1.91 1.42 0 2.256-.68 2.259-1.745-.003-.969-.733-1.483-1.744-1.71l-.523-.125c-.506-.117-.93-.304-.92-.722 0-.375.332-.65.934-.65.588 0 .949.267.994.724ZM15.78 2.219C15.618.875 14.6.102 13.254.102c-1.537 0-2.71 1.086-2.71 2.989 0 1.898 1.153 2.989 2.71 2.989 1.492 0 2.392-.992 2.526-2.063l-1.244-.006c-.117.623-.606.98-1.262.98-.883 0-1.483-.656-1.483-1.9 0-1.21.591-1.9 1.492-1.9.673 0 1.159.389 1.253 1.028h1.244Z" fill="#334155"/>
            </svg>
        </button>
    </div>
</div>
<script>
    const searchBtn = document.getElementById('search');
    const modal = document.getElementById('search-modal');
    const closeBtn = document.getElementById('close-search');
    const searchInput = document.getElementById('search-input');

    searchBtn.addEventListener('click', function() {
        modal.classList.remove('hidden');
        searchInput.focus();
    });

    closeBtn.addEventListener('click', function() {
        modal.classList.add('hidden');
    });

    window.addEventListener('keydown', e => {
        if (e.keyCode == 27) {
            modal.classList.add('hidden');
        }
    })
</script>
