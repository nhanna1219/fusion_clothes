@props(['value'])

<label {{ $attributes->merge(['class' => 'font-semibold text-[14px] text-[#000]']) }}>
    {{ $value ?? $slot }}
</label>
