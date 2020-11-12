<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AsesiTambahan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                "name"=>   "NAFIATURROHMAH",
                "email" =>  "nafiaturrohmah185001@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("12345", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "PANJI AMARAYUDA",
                "email" =>  "panji184863@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("12345", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "Siswa",
                "email" =>  "siswa@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("12345", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
        ]);
    }
}
