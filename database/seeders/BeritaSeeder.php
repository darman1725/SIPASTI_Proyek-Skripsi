<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Menu\Berita;

class BeritaSeeder extends Seeder
{
    public function run()
    {
        $beritaData = [
            [
                'judul' => 'Pendataan Awal Kegiatan Regsosek',
                'file' => '1.jpg',
                'isi' => 'Forum Konsultasi Publik (FKP) merealisasikan program Badan Pusat Statistik (BPS) pada 
                tanggal 2-21 Oktober 2023 akan melaksanakan Pendataan Awal Registrasi Sosial Ekonomi (Regsosek) 
                di seluruh provinsi di Indonesia. Dia menyampaikan bahwa Pendataan Regsosek adalah pengumpulan 
                data seluruh penduduk yang terdiri atas profil, kondisi sosial, ekonomi, dan tingkat kesejahteraan.
                
                Registrasi Sosial Ekonomi (Regsosek) adalah upaya pemerintah untuk membangun data kependudukan 
                tunggal, atau satu data. Dengan menggunakan data tunggal, pemerintah dapat melaksanakan berbagai 
                programnya secara terintegrasi, tidak tumpang tindih, dan lebih efisien. Data Regsosek dapat dimanfaatkan 
                untuk meningkatkan kualitas berbagai layanan pemerintah seperti pendidikan, bantuan sosial, kesehatan, hingga administrasi kependudukan.',
                'kategori' => 'Pertanian dan Pertambangan',
                'tanggal_publikasi' => now(),
            ],
            [
                'judul' => 'Kota Malang Dalam Angka',
                'file' => '2.pdf',
                'isi' => 'Kota Malang Dalam Angka 2023, merupakan publikasi tahunan yang menyajikan informasi berbagai 
                indikator pembangunan yang dilaksanakan oleh daerah. Publikasi Kota Malang Dalam Angka 2023 adalah tugas 
                pokok Badan Pusat Statistik Kota Malang. Publikasi ini menyajikan data primer yang dikumpulkan oleh BPS Kota 
                Malang dan data sekunder dari instansi pemerintah dan swasta di Kota Malang. Dikarenakan keterbatasan data 
                yang tersedia di beberapa instansi sehingga masih terdapat beberapa keterbatasan dalam penyajian data. 
                
                Meski demikian, publikasi ini diharapkan dapat membantu melengkapi penyusunan rencana dan evaluasi pembangunan di 
                Kota Malang. Publikasi ini dapat terwujud berkat kerja sama dan bantuan dari berbagai pihak baik instansi pemerintah 
                maupun swasta. Kepada semua pihak yang telah memberikan bantuan disampaikan penghargaan dan terima kasih yang sebesar-besarnya.',
                'kategori' => 'Pengumuman Resmi',
                'tanggal_publikasi' => now(),
            ],
            [
                'judul' => 'Mengenal produk sensus penduduk',
                'file' => '3.jpg',
                'isi' => 'Secara khusus, tujuan SP2020 adalah menyediakan data jumlah, komposisi, distribusi, dan karakteristik 
                penduduk Indonesia. Untuk mencapai tujuan tersebut, telah dilakukan berbagai upaya dan inovasi pada tata kelola SP2020, 
                diantaranya: menggunakan metode kombinasi dengan memanfaatkan basis data administrasi, memanfaatkan perkembangan teknologi 
                informasi pada kegiatan pengumpulan data, diantaranya melalui penggunaan Computer Aided Web Interviewing (CAWI). 
                
                Adapun upaya lain antara lain memanfaatkan Satuan Lingkungan Setempat (SLS) sebagai wilayah kerja statistik SP2020, 
                menyesuaikan jangka waktu tinggal dalam konsep penduduk, dari minimal telah tinggal selama enam bulan menjadi minimal satu tahun, 
                menggunakan pendekatan keluarga sebagai unit pendataan dan menyusun proses bisnis pengumpulan data yang komprehensif. Dengan begitu
                sp 2020 dapat digunakan sebaik penting untuk kemajuan bersama.',
                'kategori' => 'Sosial dan Kependudukan',
                'tanggal_publikasi' => now(),
            ],
            [
                'judul' => 'Perkembangan Pariwisata Kota Malang April 2023',
                'file' => '4.pdf',
                'isi' => 'Tingkat Penghunian Kamar (TPK) hotel klasifikasi bintang di Kota Malang pada bulan April 2023 mencapai 45,24 persen. 
                Nilai tersebut turun sebesar 6,06 poin jika dibandingkan dengan TPK bulan Maret 2022 dan naik sebesar 11,92 poin jika dibandingkan April 
                2022. Rata-rata Lama Menginap Tamu (RLMT) pada hotel klasifikasi bintang di Kota Malang selama bulan April 2023 tercatat sebesar 1,48 hari, 
                atau turun sebesar 0,13 poin jika dibandingkan bulan Maret 2022 yang mencapai 1,61 hari. 
                
                Pada bulan April 2023 komposisi tamu pengunjung hotel klasifikasi bintang terdiri dari 0,98 persen tamu mancanegara dan 99,02 persen tamu nusantara.
                Untuk itu, pengembangan pariwisata sebagian rangkaian upaya untuk mewujudkan keterpaduan dalam penggunaan berbagai sumber daya pariwisata dan 
                mengintegrasikan segala bentuk aspek di luar pariwisata yang berkaitan secara langsung maupun tidak langsung akan kelangsungan. Untuk itu, pemerintah
                kota Malang dapat memberikan insentif kepada pihak hotel dan penyelenggara ekonomi kreatif untuk kemajuan pariwisata kota Malang.',
                'kategori' => 'Lainnya',
                'tanggal_publikasi' => now(),
            ],
            [
                'judul' => 'Pendataan kegiatan survei perekonomian',
                'file' => '5.jpg',
                'isi' => 'Susenas merupakan survei yang dirancang untuk mengumpulkan data sosial kependudukan yang relatif sangat luas. Data yang dikumpulkan antara lain 
                menyangkut bidang-bidang pendidikan, kesehatan/gizi, perumahan, sosial ekonomi lainnya, kegiatan sosial budaya, konsumsi/pengeluaran dan pendapatan rumah 
                tangga, perjalanan, dan pendapat masyarakat mengenai kesejahteraan rumah tangganya. Modul dikelompokkan ke dalam 3 paket, yaitu: konsumsi/Pengeluaran dan 
                Pendapatan Rumah Tangga, Sosial Budaya dan Pendidikan, Modul Kesehatan dan Perumahan
                
                Mengumpulkan data yang bersifat umum dan dilakukan tiap tahun dimana cakupan data meliputi Keterangan umum anggota rumah tangga (art), keterangan suku bangsa 
                kepala rumah tangga (krt), keterangan tentang kematian, keterangan tentang kesehatan, keterangan pendidikan, keterangan kegiatan ketenagakerjaan, keterangan 
                fertilitas, keterangan perumahan, keterangan teknologi dan informasi, keterangan tentang rata-rata konsumsi/pengeluaran rumah tangga dan sumber penghasilan 
                utama rumah tangga, keterangan sosial ekonomi lainnya, keterangan luas lahan pertanian.',
                'kategori' => 'Ekonomi dan Perdagangan',
                'tanggal_publikasi' => now(),
            ],
            
        ];

        foreach ($beritaData as $data) {
            $fileName = $data['file'];
            $filePath = public_path('seed/BeritaSeed/' . $fileName);

            // Simpan file ke storage/berita
            Storage::disk('public')->putFileAs('berita', $filePath, $fileName);

            // Buat data berita baru
            $berita = new Berita();
            $berita->judul = $data['judul'];
            $berita->file = $fileName;
            $berita->isi = $data['isi'];
            $berita->kategori = $data['kategori'];
            $berita->tanggal_publikasi = $data['tanggal_publikasi'];
            $berita->save();
        }
    }
}
