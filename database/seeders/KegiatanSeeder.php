<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Menu\DataKegiatan;

class KegiatanSeeder extends Seeder
{
    public function run()
    {
        $kegiatanData = [
            [
                'nama' => 'Regsosek 2023',
                'gambar' => '1.jpg',
                'jenis' => 'Pengolahan',
                'level' => 'Kabupaten/Kota',
                'tanggal_mulai' => '2023-08-01',
                'tanggal_selesai' => '2023-09-29',
                'detail_kegiatan' => 'Petugas sensus Regsosek 2022 BPS adalah para petugas yang bertanggung jawab untuk melaksanakan sensus penduduk dan 
                rumah tangga di wilayah tertentu pada tahun 2022. Tugas mereka meliputi mengumpulkan data, wawancara, validasi dan verifikasi data, menggunakan
                perangkat teknologi, kerahasiaan data. Tujuan dari sensus penduduk adalah untuk mendapatkan gambaran yang akurat tentang jumlah penduduk, 
                karakteristik sosial, ekonomi, dan demografis masyarakat. Data yang diperoleh dari sensus sangat penting untuk perencanaan pembangunan, 
                kebijakan publik, dan pengambilan keputusan di berbagai bidang. Sehingga keakuratan dan kelengkapan data regsosek dapat terjaga dengan kualitas yang baik.',
            ],
            [
                'nama' => 'ST 2023',
                'gambar' => '2.jpg',
                'jenis' => 'Lapangan',
                'level' => 'Provinsi',
                'tanggal_mulai' => '2023-08-01',
                'tanggal_selesai' => '2023-08-30',
                'detail_kegiatan' => 'Petugas sensus pertanian 2023 BPS (Badan Pusat Statistik) adalah individu yang ditugaskan oleh BPS untuk melaksanakan 
                kegiatan sensus pertanian. Tugas petugas sensus pertanian BPS meliputi pengumpulan data, wawancara dengan responden, verifikasi data, 
                dan pencatatan informasi terkait pertanian di suatu daerah atau wilayah. Sebagai petugas sensus pertanian BPS, tanggung jawab utama Anda 
                akan meliputi persiapan, pengumpulan data, verifikasi data, pencatatan data, dan pelaporan. Selama menjalankan tugas sebagai petugas sensus 
                pertanian BPS, Anda perlu menjaga kerahasiaan dan integritas data yang dikumpulkan serta menjalankan tugas dengan profesionalisme dan objektivitas.',
            ],
            [
                'nama' => 'SP 2023',
                'gambar' => '3.jpg',
                'jenis' => 'Pengolahan',
                'level' => 'Umum',
                'tanggal_mulai' => '2023-08-01',
                'tanggal_selesai' => '2023-10-30',
                'detail_kegiatan' => 'Petugas sensus penduduk 2023 BPS (Badan Pusat Statistik) adalah orang-orang yang ditugaskan untuk melakukan 
                pengumpulan data penduduk dalam sensus penduduk. Mereka bertanggung jawab untuk mengumpulkan informasi demografis, sosial, 
                dan ekonomi dari individu dan rumah tangga di suatu wilayah. Tugas-tugas petugas sensus penduduk BPS meliputi persiapan, pengumpulan
                data, verifikasi, kode dan entri data, pelaporan, pengawasan dan koordinasi. Peran petugas sensus penduduk BPS sangat penting dalam 
                mendapatkan data yang akurat dan terpercaya untuk tujuan perencanaan pembangunan, pengambilan keputusan, dan analisis statistik.',
            ],
            [
                'nama' => 'Sosial',
                'gambar' => '4.jpg',
                'jenis' => 'Lapangan',
                'level' => 'Kabupaten/Kota',
                'tanggal_mulai' => '2023-08-10',
                'tanggal_selesai' => '2023-08-25',
                'detail_kegiatan' => 'Petugas sensus sosial BPS adalah para staf atau karyawan Badan Pusat Statistik (BPS) yang ditugaskan untuk melaksanakan sensus sosial. Tugas mereka meliputi 
                pengumpulan data dan informasi terkait karakteristik sosial masyarakat, seperti pendidikan, pekerjaan, kesehatan, kependudukan, dan aspek sosial lainnya. Sebagai petugas sensus sosial, 
                tugas mereka dapat mencakup persiapan, pengumpulan data, verifikasi dan validasi, pengolahan data, dan analisis pelaporan data. Peran petugas sensus sosial BPS sangat penting dalam 
                memastikan keberhasilan sensus sosial dan keakuratan data yang dikumpulkan. Mereka harus mematuhi prosedur yang ditetapkan dan menjaga kerahasiaan data yang diperoleh selama proses sensus sosial.
                Sehingga keakuratan dan kelengkapan data sosial dapat terjaga dengan kualitas yang baik.',
            ],
            [
                'nama' => 'Ekonomi',
                'gambar' => '5.jpg',
                'jenis' => 'Pengolahan',
                'level' => 'Provinsi',
                'tanggal_mulai' => '2023-08-03',
                'tanggal_selesai' => '2023-08-20',
                'detail_kegiatan' => 'Petugas sensus ekonomi BPS adalah para petugas yang ditugaskan oleh Badan Pusat Statistik (BPS) untuk melakukan pengumpulan data dalam rangka sensus ekonomi. 
                Tugas mereka meliputi pengumpulan informasi terkait kegiatan ekonomi di suatu wilayah, termasuk data tentang usaha, tenaga kerja, produksi, pengeluaran, dan informasi lainnya yang relevan.
                Petugas sensus ekonomi BPS bertanggung jawab untuk mengumpulkan data dengan akurat dan cermat sesuai dengan pedoman dan metode yang telah ditetapkan. Mereka dapat melakukan wawancara 
                langsung dengan pemilik usaha, manajer, atau tenaga kerja yang terlibat dalam kegiatan ekonomi. Selain itu, mereka juga dapat menggunakan formulir kuesioner dan melakukan pengamatan 
                langsung di lapangan. Sehingga keakuratan dan kelengkapan data ekonomi dapat terjaga dengan kualitas yang baik.',
            ],
            [
                'nama' => 'Pertambangan',
                'gambar' => '6.jpg',
                'jenis' => 'Lapangan',
                'level' => 'Umum',
                'tanggal_mulai' => '2023-08-15',
                'tanggal_selesai' => '2023-08-30',
                'detail_kegiatan' => 'Petugas sensus pertambangan BPS adalah tenaga yang ditugaskan oleh Badan Pusat Statistik (BPS) untuk melakukan pengumpulan data dan informasi terkait 
                dengan sektor pertambangan di suatu wilayah atau negara. Tugas mereka meliputi pemetaan, survei, wawancara, dan pengumpulan data dari perusahaan pertambangan, pemerintah daerah, 
                dan sumber daya terkait lainnya. Peran petugas sensus pertambangan BPS meliputi pengumpulan data, survei lapangan, verifikasi data, analisis data, dan pelaporan. Peran petugas 
                sensus pertambangan BPS penting dalam memperoleh data yang akurat dan terkini tentang sektor pertambangan. Data ini digunakan untuk memahami kondisi industri pertambangan, 
                melacak pertumbuhan ekonomi, mengukur dampak lingkungan, dan menginformasikan kebijakan yang berkaitan dengan sektor pertambangan.',
            ],
        ];

        foreach ($kegiatanData as $data) {
            $fileName = $data['gambar'];
            $filePath = public_path('seed/KegiatanSeed/' . $fileName);

            // Simpan file ke storage/kegiatan
            Storage::disk('public')->putFileAs('kegiatan', $filePath, $fileName);

            $kegiatan = new DataKegiatan();
            $kegiatan->nama = $data['nama'];
            $kegiatan->jenis = $data['jenis'];
            $kegiatan->level = $data['level'];
            $kegiatan->gambar = $fileName;
            $kegiatan->tanggal_mulai = $data['tanggal_mulai'];
            $kegiatan->tanggal_selesai = $data['tanggal_selesai'];
            $kegiatan->detail_kegiatan = $data['detail_kegiatan'];
            $kegiatan->save();
        }
    }
}
