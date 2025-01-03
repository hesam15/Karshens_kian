@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'mt-2']) }}>
        @foreach ((array) $messages as $message)
            <p class="text-sm text-rose-600">{{ $message }}</p>
        @endforeach
    </div>
@endif