@props(['filterOption'])
<div class="py-2 px-4 bg-[#E9E9E9] flex gap-x-2 items-center">
    <div>{{ $filterOption }}</div>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 cursor-pointer">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
    </svg>
</div>