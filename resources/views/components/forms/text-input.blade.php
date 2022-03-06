@props(['errors'])

<div>
    <label for="{{ $id }}" class="block text-gray-500 font-bold mb-2">{{ $label }}</label>
    <input 
        type="{{ $type }}" 
        name="{{ $id }}" 
        id="{{ $id }}"
        placeholder="{{ $placeholder }}"
        value="{{ $value }}"
        class="w-full py-2 px-4 appearance-none border-2 rounded text-gray-700 leading-tight focus:outline-none focus:bg-white {{ $errors->first($id) ? 'border-red-200' : 'border-gray-200'  }}"
    >

    @if ($errors)
        <div class="text-red-500">{{ $errors->first($id) }}</div>
    @endif
</div>
