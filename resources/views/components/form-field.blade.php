@props([
    'name',
    'label',
    'type' => 'text',
    'value' => null,
    'required' => false,
])

@php
    $value ??= old($name);
@endphp

<div class="field">
    <label for="{{ $name }}">{{ $label }}</label>
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ $type === 'password' ? '' : $value }}"
        @required($required)
    >
    @error($name)
        <span class="error">{{ $message }}</span>
    @enderror
</div>
