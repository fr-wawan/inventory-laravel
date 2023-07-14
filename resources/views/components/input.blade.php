@props([
'label',
'name',
'type' => 'text',
'value' => ''
])

<div class="my-3 w-full">
  <label for="{{ $name }}">{{ $label }}</label>
  <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
    class="block border border-gray-300 w-full p-2 rounded-md mt-2 " value="{{ $value }}">
</div>