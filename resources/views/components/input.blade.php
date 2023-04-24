@props(['type', 'class' => '', 'placeholder', 'name', 'label'])

<div>
    <label for="{{ $name }}" class="block mt-5 font-medium">{{ $label }}</label>
    <input class="{{ $class }} w-80 h-10  border border-gray-300 rounded-md outline-none" name="{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}" required>
</div>