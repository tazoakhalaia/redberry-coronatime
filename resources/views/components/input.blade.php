@props(['type', 'class' => '', 'placeholder', 'name', 'label'])

<div>
    <label for="{{ $name }}" class="block mt-5">{{ $label }}</label>
    <input class="{{ $class }} w-80 h-10  border border-gray-300 rounded-md" name="{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}">
</div>