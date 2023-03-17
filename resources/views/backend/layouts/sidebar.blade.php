<x-sidebar.index :href="route('dashboard')" :logo="Vite::asset('public/images/logo/logo.svg')">
    <li class="sidebar-title">Menu</li>
    <x-sidebar.item name="Dashboard" :link="route('dashboard')" :active="'dashboard'" :icon="'speedometer'">
    </x-sidebar.item>
    <x-sidebar.item name="Data Kriteria" :link="route('data_kriteria')" :active="'data_kriteria'" :icon="'journal-bookmark'">
    </x-sidebar.item>
    <x-sidebar.item name="Data Sub Kriteria" :link="route('data_sub_kriteria')" :active="'data_sub_kriteria'" :icon="'journal-text'">
    </x-sidebar.item>
    <x-sidebar.item name="Data Alternatif" :link="route('data_alternatif')" :active="'data_alternatif'" :icon="'people-fill'"></x-sidebar.item>

    <li class="sidebar-title">Management</li>
    <x-sidebar.item name="Data Penilaian" :link="route('data_penilaian')" :active="'data_penilaian*'" :icon="'pencil-square'">
    </x-sidebar.item>
    <x-sidebar.dropdown name="Data Kalkulasi" :active="'data_kalkulasi'" :icon="'calculator-fill'">
    <x-sidebar.submenu :name="'Data Perhitungan'" :link="route('data_perhitungan')" :active="'data_perhitungan'" :icon="'clipboard-data-fill'">
    </x-sidebar.submenu>
    <x-sidebar.submenu :name="'Data Hasil Akhir'" :link="route('data_hasil_akhir')" :active="'data_hasil_akhir'" :icon="'box2-heart-fill'">
    </x-sidebar.submenu>
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
