<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SkemaResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unit_kompetensis')->insert([
            // TAV KLASTER 1
            ["uid" => Str::uuid(), "kode" =>   "ELM.UM01.009.01", "judul" => "Membaca Gambar/Skematik Diagram Elektronika"],
            ["uid" => Str::uuid(), "kode" =>   "ELM.UM01.010.01", "judul" => "Menggunakan Besaran Unit"],
            ["uid" => Str::uuid(), "kode" =>   "ELM.UM01.011.01", "judul" => "Membaca dan Mengidentifikasi Komponen Elektronika (Pasif)"],
            ["uid" => Str::uuid(), "kode" =>   "ELM.UM01.012.01", "judul" => "Membaca dan Mengidentifikasi Komponen Elektronika (Aktif)"],
            ["uid" => Str::uuid(), "kode" =>   "ELM.UM01.003.01", "judul" => "Merancang dan Membuat Single/Double Layer PCB (Printed Circuit Board) secara Manual dengan Metode Iron Transfer Artwork"],
            ["uid" => Str::uuid(), "kode" =>   "IJE.PM01.007.01", "judul" => "Menggunakan alat uji dan Ukur"],
            ["uid" => Str::uuid(), "kode" =>   "IJE.PM01.008.01", "judul" => "Menggunakan Komponen Dasar Elektrik dan Elektronika"],
            ["uid" => Str::uuid(), "kode" =>   "IJE.PM01.010.01", "judul" => "Melacak kerusakan pada Produk Elektronika"],
            ["uid" => Str::uuid(), "kode" =>   "UEENEEH145A", "Develop Engineering Solution to Analogue Electronic Problem (Mengembangkan Solusi Engineering"],
            
            // TAV KLASTER 2
            ["uid"=>Str::uuid(),"kode"=> "ELM.UM01.005.01", "judul" => "Memelihara Kebersihan Tempat Kerja"],
            ["uid"=>Str::uuid(),"kode"=> "ELM.UM01.006.01", "judul" => "Memelihara Peralatan Kerja"],
            ["uid"=>Str::uuid(),"kode"=> "ELM.UM01.008.01", "judul" => "Melakukan Dokumentasi Hasil Kerja"],
            // ["uid"=>Str::uuid(),"kode"=> "ELM.UM01.009.01", "judul" => "Membaca Gambar/Skematik Diagram Elektronika"],
            // ["uid"=>Str::uuid(),"kode"=> "ELM.UM01.011.01", "judul" => "Membaca dan Mengidentifikasi Komponen Elektronika Pasiv"],
            // ["uid"=>Str::uuid(),"kode"=> "ELM.UM01.012.01", "judul" => "Membaca dan Mengidentifikasi Komponen Elektronika (Aktiv)"],
            ["uid"=>Str::uuid(),"kode"=> "ELM.UM01.016.01", "judul" => "Melakukan Pengukuran Standar Elektrik Produk Audio Amplifier"],
            ["uid"=>Str::uuid(),"kode"=> "IJE.PM02.001.01", "judul" => "Memperbaiki Perangkat Audio Video"],
            ["uid"=>Str::uuid(),"kode"=> "UNEENEEH110A", "judul" => "Install Commercial Video/Audio System Components (Instalasi Komersial Komponen Audio Video)"],

            // TKR1 KLASTER 1
            ["uid" => Str::uuid(),"kode" => "OTO.KR01.009.01","judul" => "Membaca dan Memahami Gambar Teknik"],
            ["uid" => Str::uuid(),"kode" => "OTO.KR01.010.01","judul" => "Menggunakan dan Memelihara Alat Ukur"],
            ["uid" => Str::uuid(),"kode" => "OTO.KR01.016.01","judul" => "Mengikuti Prosedur Keeshatan & Keselamatan"],
            ["uid" => Str::uuid(),"kode" => "OTO.KR01.017.01","judul" => "Menggunakan dan Memelihara Peralatan dan Perlengkapan Tempat Kerja"],
            ["uid" => Str::uuid(),"kode" => "OTO.KR01.018.01","judul" => "Kontribusi Komunikasi di Tempat Kerja"],
            ["uid" => Str::uuid(),"kode" => "OTO.KR02.001.01","judul" => "Memelihara/Servis Engine dan Komponen-komponennya"],
            ["uid" => Str::uuid(),"kode" => "OTO.KR02.010.01","judul" => "Memelihara/Servis Sistem pendingin dan komponennya"],
            ["uid" => Str::uuid(),"kode" => "OTO.KR02.014.01","judul" => "Memelihara/Servis Sistem Bahan bakar bensin"],
            ["uid" => Str::uuid(),"kode" => "OTO.KR02.020.01","judul" => "Pemeliharaan/Servis Sistem Kontrol Emisi"],
            ["uid" => Str::uuid(),"kode" => "OTO.KR03.001.01","judul" => "Memelihara/Servis Unit Kopling dan Komponen-komponennya Sistem Pengoperasian"],
            ["uid" => Str::uuid(),"kode" => "OTO.KR03.004.01","judul" => "Memelihara/Servis transmisi manual"],
            ["uid" => Str::uuid(),"kode" => "OTO.KR03.010.01","judul" => "Memelihara/Servis Unit Final Drive/Gardan"],
            ["uid" => Str::uuid(),"kode" => "OTO.KR04.002.01","judul" => "Memelihara/Servis Sistem Rem"],
            ["uid" => Str::uuid(),"kode" => "OTO.KR05.001.01","judul" => "Menguji, Memelihara/Servis dan Menggantai Baterai"],
            ["uid" => Str::uuid(),"kode" => "OTO.KR05.006.01","judul" => "Memperbaiki Sistem starter dan pengisian"],
            ["uid" => Str::uuid(),"kode" => "OTO.KR05.011.01","judul" => "Memperbaiki Sistem pengapian"],

            // TKR1 KLASTER 2
            // ["uid" => Str::uuid(),"kode" => "OTO.KR01.009.01","judul" => "Membaca dan Memahami Gambar Teknik"],
            // ["uid" => Str::uuid(),"kode" => "OTO.KR01.010.01","judul" => "Menggunakan dan Memelihara Alat Ukur"],
            // ["uid" => Str::uuid(),"kode" => "OTO.KR01.016.01","judul" => "Mengikuti prosedur kesehatan & keselamatan"],
            // ["uid" => Str::uuid(),"kode" => "OTO.KR02.020.01","judul" => "Memilihara/Servis Sistem Kontrol Emisi"],
            ["uid" => Str::uuid(),"kode" => "OTO.KR05.012.01","judul" => "Memelihara/Servis dan Memperbaiki Engine Management Sistem"],


            // TP KLASTER 1
            ["uid" => Str::uuid(), "kode"=> "LOG.OO.01.002.01", "judul" => "Menerapkan prinsip-prinsip keselamatan dan kesehatan kerja di lingkungan kerja"],
            ["uid" => Str::uuid(), "kode"=> "LOG.OO.01.003.01", "judul" => "Menerapkan prosedur mutu "],
            ["uid" => Str::uuid(), "kode"=> "LOG.OO.02.005.01", "judul" => "Mengukur dan menggunakan alat ukur"],
            ["uid" => Str::uuid(), "kode"=> "LOG.OO.09.002.00", "judul" => "Membaca gambar teknik"],
            ["uid" => Str::uuid(), "kode"=> "LOG.OO.18.001.00", "judul" => "Menggunakan Perkakas Tangan"],
            ["uid" => Str::uuid(), "kode"=> "LOG.OO.07.006.00", "judul" => "Bekerja dengan mesin bubut  "],

            // tp KLASTER 2
            ["uid" => Str::uuid(), "kode"=> "LOG.0001.002.01", "judul" => "Menerapkan prinsip-prinsip  keselamatan  dan kesehatan kerja di lingkungan kerja"],
            ["uid" => Str::uuid(), "kode"=> "LOG.0001.003.01", "judul" => "Menerapkan prosedur-prosedur mutu"],
            ["uid" => Str::uuid(), "kode"=> "LOG.0002.005.01", "judul" => "Mengukur dengan menggunakan alat ukur"],
            ["uid" => Str::uuid(), "kode"=> "LOG.0009.002.00", "judul" => "Membaca gambar teknik"],
            ["uid" => Str::uuid(), "kode"=> "LOG.0018.001.01", "judul" => "Menggunakan perkakas tangan"],
            ["uid" => Str::uuid(), "kode"=> "LOG.0007.007.00", "judul" => "Melakukan pekerjaan dengan mesin frais"],
        ]);

        DB::table('skemas')->insert([
            [
                "uid"   => Str::uuid(),
                "nama"  =>  "KKNI LEVEL II PADA KOMPETENSI KEAHLIAN TEKNIK AUDIO VIDEO KLASTER",
                "kode"  =>  "SKM/BNSP/00003/1/2020/25",
                "level_kkni"    =>  "2",
            ],
            [
                "uid"   => Str::uuid(),
                "nama"  =>  "KKNI LEVEL II PADA KOMPETENSI KEAHLIAN TEKNIK KENDARAAN RINGAN",
                "judul_klaster"  =>  "SKM/BNSP/00003/1/2020/59",
                "level_kkni"    =>  "2",
            ],
            [
                "uid"   => Str::uuid(),
                "nama"  =>  "KKNI LEVEL II PADA KOMPETENSI KEAHLIAN TEKNIK PEMESINAN",
                "kode"  =>  "SKM/BNSP/00007/1/2020/4",
                "level_kkni"    =>  "2",
            ],
        ]);

        DB::table('skemas')->insert([
            [
                "uid"   => Str::uuid(),
                "nama"  =>  "KKNI LEVEL II PADA KOMPETENSI KEAHLIAN TEKNIK AUDIO VIDEO KLASTER 1",
                "judul_klaster"  =>  "Penerapan Rangkaian Elektronika",
                "level_kkni"    =>  "2",
                "parent_id"    =>  1
            ],
            [
                "uid"   => Str::uuid(),
                "nama"  =>  "KKNI LEVEL II PADA KOMPETENSI KEAHLIAN TEKNIK AUDIO VIDEO KLASTER 2",
                "judul_klaster"  =>  "Perencanaan dan Instalasi Audio Video",
                "level_kkni"    =>  "2",
                "parent_id"    =>  1
            ],
            [
                "uid"   => Str::uuid(),
                "nama"  =>  "KKNI LEVEL II PADA KOMPETENSI KEAHLIAN TEKNIK AUDIO VIDEO KLASTER 3",
                "judul_klaster"  =>  "Penerapan Sistem Radio dan Televisi",
                "level_kkni"    =>  "2",
                "parent_id"    =>  1
            ],
            [
                "uid"   => Str::uuid(),
                "nama"  =>  "KKNI LEVEL II PADA KOMPETENSI KEAHLIAN TEKNIK KENDARAAN RINGAN KLASTER 1",
                "judul_klaster" =>  "Pemeliharaan Kendaraan Ringan Sistem Konvensional",
                "level_kkni"    =>  "2",
                "parent_id"    =>  2
            ],
            [
                "uid"   => Str::uuid(),
                "nama"  =>  "KKNI LEVEL II PADA KOMPETENSI KEAHLIAN TEKNIK KENDARAAN RINGAN KLASTER 2",
                "judul_klaster" =>  "Pemeliharaan Kendaraan Ringan Sistem Injeksi",
                "level_kkni"    =>  "2",
                "parent_id"    =>  2
            ],
            [
                "uid"   => Str::uuid(),
                "nama"  =>  "KKNI LEVEL II PADA KOMPETENSI KEAHLIAN TEKNIK KENDARAAN RINGAN KLASTER 3",
                "judul_klaster" =>  "Pemeliharaan Berkala Kendaraan Ringan",
                "level_kkni"    =>  "2",
                "parent_id"    =>  2
            ],
            [
                "uid"   => Str::uuid(),
                "nama"  =>  "KKNI LEVEL II PADA KOMPETENSI KEAHLIAN TEKNIK KENDARAAN RINGAN KLASTER 4",
                "judul_klaster" =>  "Spooring Balancing Kendaraan Ringan",
                "level_kkni"    =>  "2",
                "parent_id"    =>  2
            ],
            [
                "uid"   => Str::uuid(),
                "nama"  =>  "KKNI LEVEL II PADA KOMPETENSI KEAHLIAN TEKNIK KENDARAAN RINGAN KLASTER 5",
                "judul_klaster" =>  "Pemeliharaan/Servis Chasis",
                "level_kkni"    =>  "2",
                "parent_id"    =>  2
            ],
            [
                "uid"   => Str::uuid(),
                "nama"  =>  "KKNI LEVEL II PADA KOMPETENSI KEAHLIAN TEKNIK KENDARAAN RINGAN KLASTER 6",
                "judul_klaster" =>  "Pemeliharaan Sistem Elektrikal (Kelistrikan Body)",
                "level_kkni"    =>  "2",
                "parent_id"    =>  2
            ],
            [
                "uid"   => Str::uuid(),
                "nama"  =>  "KKNI LEVEL II PADA KOMPETENSI KEAHLIAN TEKNIK KENDARAAN RINGAN KLASTER 7",
                "judul_klaster" =>  "Pemeliharaan AC Pada Kendaraan",
                "level_kkni"    =>  "2",
                "parent_id"    =>  2
            ],
            [
                "uid"   => Str::uuid(),
                "nama"  =>  "KKNI LEVEL II PADA KOMPETENSI KEAHLIAN TEKNIK PEMESINAN KLASTER 1",
                "judul_klaster" =>  "Pengoperasian Mesin Bubut",
                "level_kkni"    =>  "2",
                "parent_id"    =>  3
            ],
            [
                "uid"   => Str::uuid(),
                "nama"  =>  "KKNI LEVEL II PADA KOMPETENSI KEAHLIAN TEKNIK PEMESINAN KLASTER 2",
                "judul_klaster" =>  "Pengoperasian Mesin Frais",
                "level_kkni"    =>  "2",
                "parent_id"    =>  3
            ],
            [
                "uid"   => Str::uuid(),
                "nama"  =>  "KKNI LEVEL II PADA KOMPETENSI KEAHLIAN TEKNIK PEMESINAN KLASTER 3",
                "judul_klaster" =>  "Pengoperasian Mesin CNC",
                "level_kkni"    =>  "2",
                "parent_id"    =>  3
            ],
        ]);

        DB::table('unit_skemas')->insert([
            // TAV KLASTER 1
            ["unit_kompetensi_id" => 1, "skema_id" => 4],
            ["unit_kompetensi_id" => 2, "skema_id" => 4],
            ["unit_kompetensi_id" => 3, "skema_id" => 4],
            ["unit_kompetensi_id" => 4, "skema_id" => 4],
            ["unit_kompetensi_id" => 5, "skema_id" => 4],
            ["unit_kompetensi_id" => 6, "skema_id" => 4],
            ["unit_kompetensi_id" => 7, "skema_id" => 4],
            ["unit_kompetensi_id" => 8, "skema_id" => 4],
            ["unit_kompetensi_id" => 9, "skema_id" => 4],

            // TAV KLASTER 2
            ["unit_kompetensi_id" => 10, "skema_id" => 5],
            ["unit_kompetensi_id" => 11, "skema_id" => 5],
            ["unit_kompetensi_id" => 12, "skema_id" => 5],
            ["unit_kompetensi_id" => 1, "skema_id" => 5],
            ["unit_kompetensi_id" => 3, "skema_id" => 5],
            ["unit_kompetensi_id" => 4, "skema_id" => 5],
            ["unit_kompetensi_id" => 13, "skema_id" => 5],
            ["unit_kompetensi_id" => 14, "skema_id" => 5],
            ["unit_kompetensi_id" => 15, "skema_id" => 5],

            // TKR KLASTER 1
            ["unit_kompetensi_id" => 16, "skema_id" => 7],
            ["unit_kompetensi_id" => 17, "skema_id" => 7],
            ["unit_kompetensi_id" => 18, "skema_id" => 7],
            ["unit_kompetensi_id" => 19, "skema_id" => 7],
            ["unit_kompetensi_id" => 20, "skema_id" => 7],
            ["unit_kompetensi_id" => 21, "skema_id" => 7],
            ["unit_kompetensi_id" => 22, "skema_id" => 7],
            ["unit_kompetensi_id" => 23, "skema_id" => 7],
            ["unit_kompetensi_id" => 24, "skema_id" => 7],
            ["unit_kompetensi_id" => 25, "skema_id" => 7],
            ["unit_kompetensi_id" => 26, "skema_id" => 7],
            ["unit_kompetensi_id" => 27, "skema_id" => 7],
            ["unit_kompetensi_id" => 28, "skema_id" => 7],
            ["unit_kompetensi_id" => 29, "skema_id" => 7],
            ["unit_kompetensi_id" => 30, "skema_id" => 7],
            ["unit_kompetensi_id" => 31, "skema_id" => 7],

            // TKR KLASTER 2
            ["unit_kompetensi_id" => 16, "skema_id" => 8],
            ["unit_kompetensi_id" => 17, "skema_id" => 8],
            ["unit_kompetensi_id" => 18, "skema_id" => 8],
            ["unit_kompetensi_id" => 24, "skema_id" => 8],
            ["unit_kompetensi_id" => 32, "skema_id" => 8],

            // TP KLASTER 1
            ["unit_kompetensi_id" => 33, "skema_id" => 14],
            ["unit_kompetensi_id" => 34, "skema_id" => 14],
            ["unit_kompetensi_id" => 35, "skema_id" => 14],
            ["unit_kompetensi_id" => 36, "skema_id" => 14],
            ["unit_kompetensi_id" => 37, "skema_id" => 14],
            ["unit_kompetensi_id" => 38, "skema_id" => 14],

            // TP KLASTER 2
            ["unit_kompetensi_id" => 39, "skema_id" => 15],
            ["unit_kompetensi_id" => 40, "skema_id" => 15],
            ["unit_kompetensi_id" => 41, "skema_id" => 15],
            ["unit_kompetensi_id" => 42, "skema_id" => 15],
            ["unit_kompetensi_id" => 43, "skema_id" => 15],
            ["unit_kompetensi_id" => 44, "skema_id" => 15],
        ]);

    }
}
