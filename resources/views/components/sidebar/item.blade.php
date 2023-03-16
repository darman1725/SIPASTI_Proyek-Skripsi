@props(['active', 'icon', 'link', 'name'])

@php
$classes = request()->routeIs($active) ? 'active' : '';
@endphp

<li class="sidebar-item {{ $classes }}">
    <a href="{{ $link }}" class='sidebar-link'>
        <i class="bi bi-{{ $icon }}"></i>
        <span>{{ $name }}</span>
    </a>
</li>
