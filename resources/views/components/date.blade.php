@props(['date'])

@php
    use Carbon\Carbon;
@endphp

<p class="text-grey text-xs">
    {{ Carbon::parse($date)->format('F j, Y') }}
</p>
