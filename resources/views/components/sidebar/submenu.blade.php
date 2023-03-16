@props(['name', 'link', 'icon', 'active'])

@php
$classes = request()->segment(3) == $active ? 'active' : '';
@endphp

<li class="submenu-item {{ $classes }}">
    <a href="{{ $link }}">
        <i class="bi bi-{{ $icon }}"></i>
        <span>{{ $name }}</span>
    </a>
</li>
