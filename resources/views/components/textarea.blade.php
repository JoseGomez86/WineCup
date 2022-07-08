@props(['disabled' => false, 'rows' => 3])

<textarea rows="{{ $rows }}" {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) }}
></textarea>
