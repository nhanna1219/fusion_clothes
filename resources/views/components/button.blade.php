<button {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded w-full inline-flex items-center justify-center  px-4 py-2 bg-[#000] border border-transparent  text-[18px] text-white tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-[#000] focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
