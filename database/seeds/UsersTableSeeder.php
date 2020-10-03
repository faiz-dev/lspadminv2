<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
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
                "name"=>   "alfian",
                "email" =>  "a.faizmail@gmail.com",
                "tipe"  => json_encode(['manager']),
                "uid"   =>   Str::uuid(),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ])
            ],
            [
                "name"=>   "faiz",
                "email" =>  "alfian@smkn1kandeman.sch.id",
                "tipe"  => json_encode(["manager_jejaring"]),
                "uid"   =>   Str::uuid(),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ])
            ],
            [
                "name"=>   "keramik",
                "email" =>  "keramik@smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "tembok",
                "email" =>  "tembok@smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesor"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ])
            ],
        ]);
    }
}
