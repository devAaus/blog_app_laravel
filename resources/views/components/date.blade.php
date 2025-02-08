@props(['date'])

@php
    use Carbon\Carbon;
@endphp

<p class="text-gray text-xs">
    {{ Carbon::parse($date)->format('F j, Y') }}
</p>
