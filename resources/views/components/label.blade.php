@props(['value'])

<label {{ $attributes->merge(['class' => 'font-semibold text-[16px] text-[#000]']) }}>
    {{ $value ?? $slot }}
</label>
