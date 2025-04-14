@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-[#E6DDE9] focus:border-indigo-500 focus:ring-indigo-500 rounded-sm shadow-sm']) !!}>
