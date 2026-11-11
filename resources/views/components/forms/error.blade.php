@props([
    'name' => 'required'
])

@error($name)
    <p class="text-xs text-red-600">{{ $message }}</p>
@enderror
