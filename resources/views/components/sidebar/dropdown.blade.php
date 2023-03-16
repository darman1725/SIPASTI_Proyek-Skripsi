@props(['active', 'icon', 'name'])

@php
$classes = request()->segment(2) == $active ? 'active' : '';
@endphp

<li class="sidebar-item {{ $classes }} has-sub">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-{{ $icon }}"></i>
        <span>{{ $name }}</span>
    </a>
    <ul class="submenu {{ $classes }}">
        {{ $slot ?? '' }}
    </ul>
</li>
