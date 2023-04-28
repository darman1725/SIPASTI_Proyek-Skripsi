<x-sidebar.index :href="route('dashboard')" :logo="Vite::asset('public/images/logo/logo.svg')">
    <li class="sidebar-title">Menu</li>
    @if(Auth::user()->level == 'admin')
        <x-sidebar.item name="Dashboard" :link="route('dashboard')" :active="'dashboard'" :icon="'speedometer'">
        </x-sidebar.item>
        <x-sidebar.item name="Data Kegiatan" :link="route('kegiatan')" :active="'kegiatan'" :icon="'ui-checks-grid'">
        </x-sidebar.item>
        <x-sidebar.item name="Data Kriteria" :link="route('data_kriteria')" :active="'data_kriteria'" :icon="'journal-bookmark'">
        </x-sidebar.item>
        <x-sidebar.item name="Data Sub Kriteria" :link="route('data_sub_kriteria')" :active="'data_sub_kriteria'" :icon="'journal-text'">
        </x-sidebar.item>
        <x-sidebar.item name="Data Alternatif" :link="route('data_alternatif')" :active="'data_alternatif'" :icon="'people-fill'"></x-sidebar.item>
    @endif

    @if(Auth::user()->level == 'user')
        <x-sidebar.item name="Data Kegiatan" :link="route('kegiatan')" :active="'kegiatan'" :icon="'ui-checks-grid'">
        </x-sidebar.item>
        <x-sidebar.item name="Riwayat Daftar" :link="route('pendaftaran')" :active="'pendaftaran'" :icon="'ui-checks'">
        </x-sidebar.item>
        <li class="sidebar-title">Manajemen</li>
        <x-sidebar.item name="Data Hasil Akhir" :link="route('data_hasil_akhir')" :active="'data_hasil_akhir'" :icon="'box2-heart-fill'">
        </x-sidebar.item>
        <li class="sidebar-title">Informasi</li>
        <x-sidebar.item name="Data Profile" :link="route('data_profile')" :active="'data_profile'" :icon="'person-square'">
        </x-sidebar.item>
    @endif

    @if(Auth::user()->level == 'admin')
        <li class="sidebar-title">Manajemen</li>
        <x-sidebar.item name="Data Penilaian" :link="route('data_penilaian')" :active="'data_penilaian*'" :icon="'pencil-square'">
        </x-sidebar.item>
        <x-sidebar.dropdown name="Data Kalkulasi" :active="in_array(Route::currentRouteName(), ['data_perhitungan', 'data_hasil_akhir'])" :icon="'calculator-fill'">
            <x-sidebar.submenu :name="'Data Perhitungan'" :link="route('data_perhitungan')" :active="Route::currentRouteName() == 'data_hasil_akhir'" :icon="'clipboard-data-fill'">
            </x-sidebar.submenu>
            <x-sidebar.submenu :name="'Data Hasil Akhir'" :link="route('data_hasil_akhir')" :active="Route::currentRouteName() == 'data_perhitungan'" :icon="'box2-heart-fill'">
            </x-sidebar.submenu>
        </x-sidebar.dropdown>        

        <li class="sidebar-title">Informasi</li>
        <x-sidebar.item name="Data Pelamar" :link="route('user')" :active="'user'" :icon="'person-check'">
        </x-sidebar.item>
        <x-sidebar.item name="Data Profile" :link="route('data_profile')" :active="'data_profile'" :icon="'person-square'">
        </x-sidebar.item>
    @endif
</x-sidebar.index>
