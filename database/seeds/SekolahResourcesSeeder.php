<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\{User, Sekolah, ManajerJejaring};

class SekolahResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sekolah = new Sekolah();
        $sekolah->uid = Str::uuid();
        $sekolah->nama    = "SMK Negeri 1 Kandeman";
        $sekolah->alamat  = "Jl Raya Kandeman KM 04 Kecamatan Kandeman";
        $sekolah->kota    = "Kabupaten Batang";
        $sekolah->provinsi    = "Jawa Tengah";
        $sekolah->no_telp = "(0285) 392274";
        $sekolah->kode_pos    = "51261";
        $sekolah->terdaftar   = date('Y-m-d');
        $sekolah->save();

        // creating user
        $user = new User();
        $user->name =   "Admin SMK 1 Kandeman";
        $user->uid  =   Str::uuid();
        $user->email    =   "manager@smkn1kandeman.sch.id";
        $user->password =   Hash::make("root", [
            'memory' => 1024,
            'time'  => 2,
            'threads' => 2
        ]);
        $user->tipe =   json_encode(["manager_jejaring"]);
        $user->save();

        $managerJejaring = new ManajerJejaring();
        $managerJejaring->uid   = Str::uuid();
        $managerJejaring->user_id   = $user->id;
        $managerJejaring->sekolah_id    = $sekolah->id;
        $managerJejaring->save();
    }
}
