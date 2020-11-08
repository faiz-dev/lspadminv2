<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UjiKompetensiResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('uji_kompetensis')->insert([
            [
                "uid" => Str::uuid(),
                "nama"  => "UKK TAV Klaster 1 Periode 4 - 13 Oktober 2020",
                "tgl_awal"  => date('Y-m-d', strtotime("2020-10-4")),
                "tgl_akhir" => date('Y-m-d', strtotime("2020-10-13")),
                "jml_asesi" => 36,
                "deskripsi" => "Uji Kompetensi dalam rangka Bantuan Sertifikasi tahun 2020 dari kementrian pendidikan",
                "skema_id"  => 4,
                "tuk_id"    => 1,
                "sekolah_id"    =>  1
            ],
            [
                "uid" => Str::uuid(),
                "nama"  => "UKK TAV Klaster 2 Periode 4 - 13 Oktober 2020",
                "tgl_awal"  => date('Y-m-d', strtotime("2020-10-4")),
                "tgl_akhir" => date('Y-m-d', strtotime("2020-10-13")),
                "jml_asesi" => 36,
                "deskripsi" => "Uji Kompetensi dalam rangka Bantuan Sertifikasi tahun 2020 dari kementrian pendidikan",
                "skema_id"  => 5,
                "tuk_id"    => 1,
                "sekolah_id"    =>  1
            ],
            
            [
                "uid" => Str::uuid(),
                "nama"  => "UKK TKRO Klaster 1 Periode 4 - 13 Oktober 2020",
                "tgl_awal"  => date('Y-m-d', strtotime("2020-10-4")),
                "tgl_akhir" => date('Y-m-d', strtotime("2020-10-13")),
                "jml_asesi" => 52,
                "deskripsi" => "Uji Kompetensi dalam rangka Bantuan Sertifikasi tahun 2020 dari kementrian pendidikan",
                "skema_id"  => 7,
                "tuk_id"    => 2,
                "sekolah_id"    =>  1
            ],
            
            [
                "uid" => Str::uuid(),
                "nama"  => "UKK TKRO Klaster 2 Periode 4 - 13 Oktober 2020",
                "tgl_awal"  => date('Y-m-d', strtotime("2020-10-4")),
                "tgl_akhir" => date('Y-m-d', strtotime("2020-10-13")),
                "jml_asesi" => 52,
                "deskripsi" => "Uji Kompetensi dalam rangka Bantuan Sertifikasi tahun 2020 dari kementrian pendidikan",
                "skema_id"  => 8,
                "tuk_id"    => 2,
                "sekolah_id"    =>  1
            ],

            [
                "uid" => Str::uuid(),
                "nama"  => "UKK TP Klaster 1 Periode 4 - 13 Oktober 2020",
                "tgl_awal"  => date('Y-m-d', strtotime("2020-10-4")),
                "tgl_akhir" => date('Y-m-d', strtotime("2020-10-13")),
                "jml_asesi" => 36,
                "deskripsi" => "Uji Kompetensi dalam rangka Bantuan Sertifikasi tahun 2020 dari kementrian pendidikan",
                "skema_id"  => 14,
                "tuk_id"    => 3,
                "sekolah_id"    =>  1
            ],
            
            [
                "uid" => Str::uuid(),
                "nama"  => "UKK TP Klaster 2 Periode 4 - 13 Oktober 2020",
                "tgl_awal"  => date('Y-m-d', strtotime("2020-10-4")),
                "tgl_akhir" => date('Y-m-d', strtotime("2020-10-13")),
                "jml_asesi" => 36,
                "deskripsi" => "Uji Kompetensi dalam rangka Bantuan Sertifikasi tahun 2020 dari kementrian pendidikan",
                "skema_id"  => 15,
                "tuk_id"    => 3,
                "sekolah_id"    =>  1
            ],
        ]);
    }
}
