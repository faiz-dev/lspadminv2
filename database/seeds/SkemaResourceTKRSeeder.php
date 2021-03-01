<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SkemaResourceTKRSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('unit_kompetensis')->insert([


        //     // TKR KLASTER 3
        //     // ["uid" => Str::uuid(), "kode" =>   "OTO.KR01.001.01", "judul" => "Melaksanakan Pemeliharaan Servis Komponen","jenis_standar"=>"SKKNI"],
        //     // ["uid" => Str::uuid(), "kode" =>   "OTO.KR01.009.01", "judul" => "Membaca dan Memahami Gambar Teknik","jenis_standar"=>"SKKNI"],
        //     // ["uid" => Str::uuid(), "kode" =>   "OTO.KR01.010.01", "judul" => "Menggunakan dan memelihara alat ukur","jenis_standar"=>"SKKNI"],
        //     // ["uid" => Str::uuid(), "kode" =>   "OTO.KR01.016.01", "judul" => "Mengikuti Prosedur Kesehatan & Keselamatan Kerja","jenis_standar"=>"SKKNI"],
        //     // ["uid" => Str::uuid(), "kode" =>   "OTO.KR01.017.01", "judul" => "Menggunakan dan Memelihara Peralatan dan Perlengkapan Tempat Kerja","jenis_standar"=>"SKKNI"],            
        //     // ["uid" => Str::uuid(), "kode"  =>  "OTO.KR01.018.01", "judul" =>  "Kontribusi Komunikasi di Tempat Kerja","jenis_standar"=>"SKKNI"],
        //     // ["uid" => Str::uuid(), "kode"  =>  "OTO.KR02.001.01", "judul" =>  "Memelihara/servis Engine dan Komponen-komponennya","jenis_standar"=>"SKKNI"],
        //     // ["uid" => Str::uuid(), "kode"  =>  "OTO.KR02.010.01", "judul" =>  "Memelihara/servis sistem pendingin dan komponennya","jenis_standar"=>"SKKNI"],
        //     ["uid" => Str::uuid(), "kode"  =>  "OTO.KR02.017.01", "judul" =>  "Memelihara/servis Sistem Injeksi Bahan Bakar Diesel","jenis_standar"=>"SKKNI"],
        //     // ["uid" => Str::uuid(), "kode"  =>  "OTO.KR02.020.01", "judul" =>  "Pemeliharaan/servis Sistem Kontrol Emisi","jenis_standar"=>"SKKNI"],
        //     // ["uid" => Str::uuid(), "kode"  =>  "OTO.KR03.007.01", "judul" =>  "Memelihara/servis Transmisi Otomatis","jenis_standar"=>"SKKNI"],
        //     // ["uid" => Str::uuid(), "kode"  =>  "OTO.KR03.010.01", "judul" =>  "Memelihara/servis Unit Final Drive / Gardan","jenis_standar"=>"SKKNI"],
            
        //     // TKR KLASTER 4
        //     // ["uid" => Str::uuid(), "kode" =>   "OTO.KR01.009.01",	"judul" => "Membaca dan Memahami Gambar Teknik","jenis_standar"=>"SKKNI"],
        //     // ["uid" => Str::uuid(), "kode" =>   "OTO.KR01.010.01",	"judul" => "Menggunakan dan Memelihara Alat Ukur","jenis_standar"=>"SKKNI"],
        //     // ["uid" => Str::uuid(), "kode" =>   "OTO.KR01.016.01",	"judul" => "Mengikuti prosedur Keselamatan dan Kesehatan Kerja","jenis_standar"=>"SKKNI"],
        //     // ["uid" => Str::uuid(), "kode" =>   "OTO.KR01.017.01",	"judul" => "Menggunakan dan Memelihara Peralatan dan Perlengkapan Tempat Kerja","jenis_standar"=>"SKKNI"],
        //     ["uid" => Str::uuid(), "kode" =>   "OTO.KR01.019.01",	"judul" => "Melaksanakan Operasi Penanganan Secara Manual","jenis_standar"=>"SKKNI"],
        //     ["uid" => Str::uuid(), "kode" =>   "OTO.KR04.009.01",	"judul" => "Memelihara/Servis Sistem Kemudi","jenis_standar"=>"SKKNI"],
        //     ["uid" => Str::uuid(), "kode" =>   "OTO.KR04.014.01",	"judul" => "Memelihara/Service Sistem Suspensi","jenis_standar"=>"SKKNI"],
        //     ["uid" => Str::uuid(), "kode" =>   "OTO.KR04.015.01",	"judul" => "Melaksanakan Pekerjaan Pelurusan Roda/Spooring","jenis_standar"=>"SKKNI"],
        //     ["uid" => Str::uuid(), "kode" =>   "OTO.KR04.016.01",	"judul" => "Membalance Roda/Ban","jenis_standar"=>"SKKNI"],
        //     ["uid" => Str::uuid(), "kode" =>   "OTO.KR04.017.01",	"judul" => "Melepas, Memasang dan Menyetel Roda","jenis_standar"=>"SKKNI"],


        //     // TKKR KLASTER 5
        //     ["uid" => Str::uuid(), "kode" => "OTO.KR04.001.01", "judul" => "Perakitan dan pemasangan system rem dan komponen-komponennya","jenis_standar"=>"SKKNI"],
        //     // ["uid" => Str::uuid(), "kode" => "OTO.KR04.002.01", "judul" => "Pemeliharan /servis system rem","jenis_standar"=>"SKKNI"],
        //     ["uid" => Str::uuid(), "kode" => "OTO.KR04.003.01", "judul" => "Perbaikan Sistem Rem","jenis_standar"=>"SKKNI"],
        //     ["uid" => Str::uuid(), "kode" => "OTO.KR04.004.01", "judul" => "Overhaul system Rem","jenis_standar"=>"SKKNI"],
        //     // ["uid" => Str::uuid(), "kode" => "OTO.KR04.017.01", "judul" => "Melepas, Memasang dan Menyetel Roda","jenis_standar"=>"SKKNI"],
        //     // ["uid" => Str::uuid(), "kode" => "OTO.KR04.009.01", "judul" => "Memelihara/Servis Sistem Kemudi","jenis_standar"=>"SKKNI"],
        //     // ["uid" => Str::uuid(), "kode" => "OTO.KR04.014.01", "judul" => "Memelihara/Servis Sistem Suspensi","jenis_standar"=>"SKKNI"],


        //     // TKR KLASTER 6
        //     ["uid" => Str::uuid(), "kode" => "OTO.KR05.002.01", "judul" => "Perbaikan Ringan pada Rangkaian / Sistem Kelistrikan","jenis_standar"=>"SKKNI"],
        //     ["uid" => Str::uuid(), "kode" => "OTO.KR05.007.01", "judul" => "Memasang, Menguji dan Memperbaiki Sistem Penerangan dan Wiring","jenis_standar"=>"SKKNI"],
        //     ["uid" => Str::uuid(), "kode" => "OTO.KR05.008.01", "judul" => "Memasang, Menguji dan Memperbaiki Sistem Pengaman Keslitrikan dan Komponennya","jenis_standar"=>"SKKNI"],
        //     ["uid" => Str::uuid(), "kode" => "OTO.KR05.009.01", "judul" => "Memasang Perlengkapan Kelistrikan Tambahan (Asesoris)","jenis_standar"=>"SKKNI"],

        //     // TKR KLASTER 7
        //     ["uid" => Str::uuid(), "kode" => "OTO.KR05.016.01", "judul" => "Memasang Sistem A/C(Air Conditioner)","jenis_standar"=>"SKKNI"],
        //     ["uid" => Str::uuid(), "kode" => "OTO.KR05.017.01", "judul" =>  "Overhaul Komponen Sistem A/C(Air Conditioner","jenis_standar"=>"SKKNI"],
        //     ["uid" => Str::uuid(), "kode" => "OTO.KR05.018.01", "judul" =>  "Memperbaiki/RetrofitSistem AC(Air Conditioner)","jenis_standar"=>"SKKNI"],
        //     ["uid" => Str::uuid(), "kode" => "OTO.KR05.019.01", "judul" =>  "Memelihara/ServisSistem A/C(Air Conditioner","jenis_standar"=>"SKKNI"]

        // ]);

        // DB::table('unit_skemas')->insert([
        // //     // TAV KLASTER 1
        //     ["unit_kompetensi_id" => 45, "skema_id" => 9],
        //     ["unit_kompetensi_id" => 16, "skema_id" => 9],
        //     ["unit_kompetensi_id" => 17, "skema_id" => 9],
        //     ["unit_kompetensi_id" => 18, "skema_id" => 9],
        //     ["unit_kompetensi_id" => 19, "skema_id" => 9],
        //     ["unit_kompetensi_id" => 20, "skema_id" => 9],
        //     ["unit_kompetensi_id" => 21, "skema_id" => 9],
        //     ["unit_kompetensi_id" => 22, "skema_id" => 9],
        //     ["unit_kompetensi_id" => 46, "skema_id" => 9],
        //     ["unit_kompetensi_id" => 24, "skema_id" => 9],
        //     ["unit_kompetensi_id" => 27, "skema_id" => 9],
        //     ["unit_kompetensi_id" => 47, "skema_id" => 9],

        // //     // TKR KLASTER 4
        //     ["unit_kompetensi_id" => 16, "skema_id" => 10],
        //     ["unit_kompetensi_id" => 17, "skema_id" => 10],
        //     ["unit_kompetensi_id" => 18, "skema_id" => 10],
        //     ["unit_kompetensi_id" => 19, "skema_id" => 10],
        //     ["unit_kompetensi_id" => 47, "skema_id" => 10],
        //     ["unit_kompetensi_id" => 48, "skema_id" => 10],
        //     ["unit_kompetensi_id" => 49, "skema_id" => 10],
        //     ["unit_kompetensi_id" => 50, "skema_id" => 11],
        //     ["unit_kompetensi_id" => 51, "skema_id" => 12],
        //     ["unit_kompetensi_id" => 52, "skema_id" => 13],

        // //     // TKR KLASTER 5
        //     ["unit_kompetensi_id" => 53, "skema_id" => 11],
        //     ["unit_kompetensi_id" => 28, "skema_id" => 11],
        //     ["unit_kompetensi_id" => 54, "skema_id" => 11],
        //     ["unit_kompetensi_id" => 55, "skema_id" => 11],
        //     ["unit_kompetensi_id" => 52, "skema_id" => 11],
        //     ["unit_kompetensi_id" => 48, "skema_id" => 11],
        //     ["unit_kompetensi_id" => 49, "skema_id" => 11],

        // //     // TKR KLASTER 6
        //     ["unit_kompetensi_id" => 56, "skema_id" => 12],
        //     ["unit_kompetensi_id" => 57, "skema_id" => 12],
        //     ["unit_kompetensi_id" => 58, "skema_id" => 12],
        //     ["unit_kompetensi_id" => 59, "skema_id" => 12],

        // //     // TKR KLASTER 7
        //     ["unit_kompetensi_id" => 60, "skema_id" => 13],
        //     ["unit_kompetensi_id" => 61, "skema_id" => 13],
        //     ["unit_kompetensi_id" => 62, "skema_id" => 13],
        //     ["unit_kompetensi_id" => 63, "skema_id" => 13],

        // ]);

        DB::table('uji_kompetensis')->insert([
            [
                "uid" => Str::uuid(),
                "nama"  => "UKK TKR Klaster 3 Maret 2021",
                "tgl_awal"  => date('Y-m-d', strtotime("2020-03-03")),
                "tgl_akhir" => date('Y-m-d', strtotime("2020-03-09")),
                "jml_asesi" => 25,
                "deskripsi" => "Uji Kompetensi dalam rangka UKK 2021 SMK Negeri 1 Kandeman",
                "skema_id"  => 9,
                "tuk_id"    => 2,
                "sekolah_id"    =>  1
            ],
            [
                "uid" => Str::uuid(),
                "nama"  => "UKK TKR Klaster 4 Maret 2021",
                "tgl_awal"  => date('Y-m-d', strtotime("2020-03-03")),
                "tgl_akhir" => date('Y-m-d', strtotime("2020-03-09")),
                "jml_asesi" => 25,
                "deskripsi" => "Uji Kompetensi dalam rangka UKK 2021 SMK Negeri 1 Kandeman",
                "skema_id"  => 10,
                "tuk_id"    => 2,
                "sekolah_id"    =>  1
            ],
            [
                "uid" => Str::uuid(),
                "nama"  => "UKK TKR Klaster 5 Maret 2021",
                "tgl_awal"  => date('Y-m-d', strtotime("2020-03-03")),
                "tgl_akhir" => date('Y-m-d', strtotime("2020-03-09")),
                "jml_asesi" => 25,
                "deskripsi" => "Uji Kompetensi dalam rangka UKK 2021 SMK Negeri 1 Kandeman",
                "skema_id"  => 11,
                "tuk_id"    => 2,
                "sekolah_id"    =>  1
            ],
            [
                "uid" => Str::uuid(),
                "nama"  => "UKK TKR Klaster 6 Maret 2021",
                "tgl_awal"  => date('Y-m-d', strtotime("2020-03-03")),
                "tgl_akhir" => date('Y-m-d', strtotime("2020-03-09")),
                "jml_asesi" => 25,
                "deskripsi" => "Uji Kompetensi dalam rangka UKK 2021 SMK Negeri 1 Kandeman",
                "skema_id"  => 12,
                "tuk_id"    => 2,
                "sekolah_id"    =>  1
            ],
            [
                "uid" => Str::uuid(),
                "nama"  => "UKK TKR Klaster 7 Maret 2021",
                "tgl_awal"  => date('Y-m-d', strtotime("2020-03-03")),
                "tgl_akhir" => date('Y-m-d', strtotime("2020-03-09")),
                "jml_asesi" => 25,
                "deskripsi" => "Uji Kompetensi dalam rangka UKK 2021 SMK Negeri 1 Kandeman",
                "skema_id"  => 13,
                "tuk_id"    => 2,
                "sekolah_id"    =>  1
            ],
        ]);
    }

    // TKR KLASTER 3
    // 45["uid" => Str::uuid(), "kode" =>   "OTO.KR01.001.01", "judul" => "Melaksanakan Pemeliharaan Servis Komponen","jenis_standar"=>"SKKNI"],
    // 16// ["uid" => Str::uuid(), "kode" =>   "OTO.KR01.009.01", "judul" => "Membaca dan Memahami Gambar Teknik","jenis_standar"=>"SKKNI"],
    // 17// ["uid" => Str::uuid(), "kode" =>   "OTO.KR01.010.01", "judul" => "Menggunakan dan memelihara alat ukur","jenis_standar"=>"SKKNI"],
    // 18// ["uid" => Str::uuid(), "kode" =>   "OTO.KR01.016.01", "judul" => "Mengikuti Prosedur Kesehatan & Keselamatan Kerja","jenis_standar"=>"SKKNI"],
    // 19// ["uid" => Str::uuid(), "kode" =>   "OTO.KR01.017.01", "judul" => "Menggunakan dan Memelihara Peralatan dan Perlengkapan Tempat Kerja","jenis_standar"=>"SKKNI"],            
    // 20// ["uid" => Str::uuid(), "kode"  =>  "OTO.KR01.018.01", "judul" =>  "Kontribusi Komunikasi di Tempat Kerja","jenis_standar"=>"SKKNI"],
    // 21// ["uid" => Str::uuid(), "kode"  =>  "OTO.KR02.001.01", "judul" =>  "Memelihara/servis Engine dan Komponen-komponennya","jenis_standar"=>"SKKNI"],
    // 22// ["uid" => Str::uuid(), "kode"  =>  "OTO.KR02.010.01", "judul" =>  "Memelihara/servis sistem pendingin dan komponennya","jenis_standar"=>"SKKNI"],
    // 46["uid" => Str::uuid(), "kode"  =>  "OTO.KR02.017.01", "judul" =>  "Memelihara/servis Sistem Injeksi Bahan Bakar Diesel","jenis_standar"=>"SKKNI"],
    // 24// ["uid" => Str::uuid(), "kode"  =>  "OTO.KR02.020.01", "judul" =>  "Pemeliharaan/servis Sistem Kontrol Emisi","jenis_standar"=>"SKKNI"],
    // 27// ["uid" => Str::uuid(), "kode"  =>  "OTO.KR03.007.01", "judul" =>  "Memelihara/servis Transmisi Otomatis","jenis_standar"=>"SKKNI"],
    // 47// ["uid" => Str::uuid(), "kode"  =>  "OTO.KR03.010.01", "judul" =>  "Memelihara/servis Unit Final Drive / Gardan","jenis_standar"=>"SKKNI"],
    
    // // TKR KLASTER 4
    // 16// ["uid" => Str::uuid(), "kode" =>   "OTO.KR01.009.01",	"judul" => "Membaca dan Memahami Gambar Teknik","jenis_standar"=>"SKKNI"],
    // 17// ["uid" => Str::uuid(), "kode" =>   "OTO.KR01.010.01",	"judul" => "Menggunakan dan Memelihara Alat Ukur","jenis_standar"=>"SKKNI"],
    // 18// ["uid" => Str::uuid(), "kode" =>   "OTO.KR01.016.01",	"judul" => "Mengikuti prosedur Keselamatan dan Kesehatan Kerja","jenis_standar"=>"SKKNI"],
    // 19// ["uid" => Str::uuid(), "kode" =>   "OTO.KR01.017.01",	"judul" => "Menggunakan dan Memelihara Peralatan dan Perlengkapan Tempat Kerja","jenis_standar"=>"SKKNI"],
    // 47["uid" => Str::uuid(), "kode" =>   "OTO.KR01.019.01",	"judul" => "Melaksanakan Operasi Penanganan Secara Manual","jenis_standar"=>"SKKNI"],
    // 48["uid" => Str::uuid(), "kode" =>   "OTO.KR04.009.01",	"judul" => "Memelihara/Servis Sistem Kemudi","jenis_standar"=>"SKKNI"],
    // 49["uid" => Str::uuid(), "kode" =>   "OTO.KR04.014.01",	"judul" => "Memelihara/Service Sistem Suspensi","jenis_standar"=>"SKKNI"],
    // 50["uid" => Str::uuid(), "kode" =>   "OTO.KR04.015.01",	"judul" => "Melaksanakan Pekerjaan Pelurusan Roda/Spooring","jenis_standar"=>"SKKNI"],
    // 51["uid" => Str::uuid(), "kode" =>   "OTO.KR04.016.01",	"judul" => "Membalance Roda/Ban","jenis_standar"=>"SKKNI"],
    // 52["uid" => Str::uuid(), "kode" =>   "OTO.KR04.017.01",	"judul" => "Melepas, Memasang dan Menyetel Roda","jenis_standar"=>"SKKNI"],


    // // TKKR KLASTER 5
    // 53["uid" => Str::uuid(), "kode" => "OTO.KR04.001.01", "judul" => "Perakitan dan pemasangan system rem dan komponen-komponennya","jenis_standar"=>"SKKNI"],
    // 28// ["uid" => Str::uuid(), "kode" => "OTO.KR04.002.01", "judul" => "Pemeliharan /servis system rem","jenis_standar"=>"SKKNI"],
    // 54["uid" => Str::uuid(), "kode" => "OTO.KR04.003.01", "judul" => "Perbaikan Sistem Rem","jenis_standar"=>"SKKNI"],
    // 55["uid" => Str::uuid(), "kode" => "OTO.KR04.004.01", "judul" => "Overhaul system Rem","jenis_standar"=>"SKKNI"],
    // 52// ["uid" => Str::uuid(), "kode" => "OTO.KR04.017.01", "judul" => "Melepas, Memasang dan Menyetel Roda","jenis_standar"=>"SKKNI"],
    // 48// ["uid" => Str::uuid(), "kode" => "OTO.KR04.009.01", "judul" => "Memelihara/Servis Sistem Kemudi","jenis_standar"=>"SKKNI"],
    // 49// ["uid" => Str::uuid(), "kode" => "OTO.KR04.014.01", "judul" => "Memelihara/Servis Sistem Suspensi","jenis_standar"=>"SKKNI"],


    // // TKR KLASTER 6
    // 56["uid" => Str::uuid(), "kode" => "OTO.KR05.002.01", "judul" => "Perbaikan Ringan pada Rangkaian / Sistem Kelistrikan","jenis_standar"=>"SKKNI"],
    // 57["uid" => Str::uuid(), "kode" => "OTO.KR05.007.01", "judul" => "Memasang, Menguji dan Memperbaiki Sistem Penerangan dan Wiring","jenis_standar"=>"SKKNI"],
    // 58["uid" => Str::uuid(), "kode" => "OTO.KR05.008.01", "judul" => "Memasang, Menguji dan Memperbaiki Sistem Pengaman Keslitrikan dan Komponennya","jenis_standar"=>"SKKNI"],
    // 59["uid" => Str::uuid(), "kode" => "OTO.KR05.009.01", "judul" => "Memasang Perlengkapan Kelistrikan Tambahan (Asesoris)","jenis_standar"=>"SKKNI"],

    // // TKR KLASTER 7
    // 60["uid" => Str::uuid(), "kode" => "OTO.KR05.016.01", "judul" => "Memasang Sistem A/C(Air Conditioner)","jenis_standar"=>"SKKNI"],
    // 61["uid" => Str::uuid(), "kode" => "OTO.KR05.017.01", "judul" =>  "Overhaul Komponen Sistem A/C(Air Conditioner","jenis_standar"=>"SKKNI"],
    // 62["uid" => Str::uuid(), "kode" => "OTO.KR05.018.01", "judul" =>  "Memperbaiki/RetrofitSistem AC(Air Conditioner)","jenis_standar"=>"SKKNI"],
    // 63["uid" => Str::uuid(), "kode" => "OTO.KR05.019.01", "judul" =>  "Memelihara/ServisSistem A/C(Air Conditioner","jenis_standar"=>"SKKNI"]
}
