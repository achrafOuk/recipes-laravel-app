@props(['title'])

<div class="mt-4">
    <span class="font-medium text-gray-700">{{$title}}:</span>
    <div class="mt-4 h-48 overflow-y-auto px-3 pb-3 text-sm text-gray-700">
        {{ $slot }}
    </div>
</div>
