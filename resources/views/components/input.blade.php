@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block mt-3 w-full rounded-none text-[15px] border-gray-400 bg-[#fff] focus:border-[#000] focus:ring-[#000] focus:bg-[#fff] hover:bg-[#fff]']) !!}>
