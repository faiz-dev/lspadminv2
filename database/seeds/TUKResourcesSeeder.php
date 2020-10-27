<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TUKResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tuks')->insert([
            [
                "uid" => Str::uuid(),
                "sekolah_id"    => "1",
                "nama"  => "TUK Teknik Audio Video",
                "jenis" => "Sewaktu",
                "alamat"    => "Jl Raya Kandeman KM 04 Kecamatan Kandeman",
                "provinsi"  => "Jawa Tengah",
                "telp"  =>  "(0285) 392274",
                "kota"  => "Kabupaten Batang",
                "kode_pos"  => "51261",
            ],
            [
                "uid" => Str::uuid(),
                "sekolah_id"    => "1",
                "nama"  => "TUK Teknik Kendaraan Ringan",
                "jenis" => "Sewaktu",
                "alamat"    => "Jl Raya Kandeman KM 04 Kecamatan Kandeman",
                "provinsi"  => "Jawa Tengah",
                "telp"  =>  "(0285) 392274",
                "kota"  => "Kabupaten Batang",
                "kode_pos"  => "51261",
            ],
            [
                "uid" => Str::uuid(),
                "sekolah_id"    => "1",
                "nama"  => "TUK Teknik Pemesinan",
                "jenis" => "Sewaktu",
                "alamat"    => "Jl Raya Kandeman KM 04 Kecamatan Kandeman",
                "provinsi"  => "Jawa Tengah",
                "telp"  =>  "(0285) 392274",
                "kota"  => "Kabupaten Batang",
                "kode_pos"  => "51261",
            ]
        ]);
    }
}
