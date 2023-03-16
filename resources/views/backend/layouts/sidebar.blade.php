<x-sidebar.index :href="route('dashboard')" :logo="Vite::asset('public/images/logo/logo.svg')">
    <li class="sidebar-title">Menu</li>
    <x-sidebar.item name="Dashboard" :link="route('dashboard')" :active="'dashboard'" :icon="'speedometer'">
    </x-sidebar.item>
    <x-sidebar.item name="Data Kriteria" :link="route('users.index')" :active="'users*'" :icon="'journal-bookmark'">
    </x-sidebar.item>
    <x-sidebar.item name="Data Sub Kriteria" :link="route('dashboard')" :active="'dashboarda'" :icon="'journal-text'">
    </x-sidebar.item>
    <x-sidebar.item name="Data Alternatif" :link="route('dashboard')" :active="'comments'" :icon="'people-fill'"></x-sidebar.item>

    <li class="sidebar-title">Management</li>
    <x-sidebar.item name="Data Penilaian" :link="route('dashboard')" :active="'notifications'" :icon="'pencil-square'">
    </x-sidebar.item>
    {{-- <x-sidebar.item name="Data Perhitungan" :link="route('settings.index')" :active="'settings.index'" :icon="'calculator-fill'">
    </x-sidebar.item> --}}
    <x-sidebar.dropdown name="Data Sub Kriteria" :active="'article'" :icon="'calculator-fill'">
        <x-sidebar.submenu :name="'Data Hasil Akhir'" :link="route('post.index')" :active="'post'" :icon="'clipboard-data-fill'"></x-sidebar.submenu>
        {{-- <x-sidebar.submenu :name="'Categories'" :link="route('category.index')" :active="'category'" :icon="'menu-button-fill'">
        </x-sidebar.submenu> --}}
    </x-sidebar.dropdown>

    <li class="sidebar-title">Information</li>
    <x-sidebar.item name="Data User" :link="route('profile', Auth::user()->id)" :active="'profile*'" :icon="'person-circle'">
    </x-sidebar.item>
    <x-sidebar.dropdown name="Data Profile" :active="'log-viewer'" :icon="'person-check'">
        <x-sidebar.submenu :name="'Dashboard'" :link="url('admin/log-viewer')" :active="'log-viewer'" :icon="'inboxes-fill'">
        </x-sidebar.submenu>
        <x-sidebar.submenu :name="'Logs by Date'" :link="url('admin/log-viewer/logs')" :active="'logs'" :icon="'journal-text'">
        </x-sidebar.submenu>
    </x-sidebar.dropdown>
</x-sidebar.index>
