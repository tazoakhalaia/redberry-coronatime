@props(['buttonName', 'class' => ''])
<div>
    <button class="{{ $class }} rounded-sm shadow-md shadow-gray-400 w-80 h-10 bg-btngreen uppercase font-bold" type="submit">{{ $buttonName }}</button>
</div>