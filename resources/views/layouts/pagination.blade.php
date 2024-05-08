@if ($paginator->hasPages())
    <div class="mt-5 flex justify-center">
        <nav class="relative z-0 inline-flex rounded-md -space-x-px" aria-label="Pagination">
            @if ($paginator->onFirstPage())
                <a class="relative inline-flex items-center px-2 py-2 border-none bg-white text-sm font-bold text-gray-500 cursor-not-allowed" href="javascript:void(0)">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </a>
            @else
                <a class="relative inline-flex items-center px-2 py-2 border-none bg-white text-sm font-bold text-gray-500 cursor-not-allowed" href="{{ $paginator->previousPageUrl() }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </a>
            @endif

            @foreach ($elements as $element)    
                @if (is_string($element))
                    <a href="javascript:void(0)" class="relative inline-flex items-center px-4 py-2 border-none text-xl font-bold text-gray-700 hover:bg-gray-300 bg-gray-300 }}">{{ $element }}</a>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a href="javascript:void(0)" class="relative inline-flex items-center px-4 py-2 border-none text-xl font-bold text-gray-700 hover:bg-gray-300 bg-gray-300 }}">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 border-none bg-white text-xl font-bold text-gray-700 hover:bg-gray-300">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-2 py-2 border-none bg-white text-sm font-bold text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
            @else
                <a href="javascript:void(0)" class="relative inline-flex items-center px-2 py-2 border-none bg-white text-sm font-bold text-gray-500 cursor-not-allowed">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
            @endif
        </nav>
    </div>
@endif