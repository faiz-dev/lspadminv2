<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ])
            ],
            [
                "name"=>   "faiz",
                "email" =>  "alfian@smkn1kandeman.sch.id",
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ])
            ],
            [
                "name"=>   "keramik",
                "email" =>  "keramik@smkn1kandeman.sch.id",
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "tembok",
                "email" =>  "tembok@smkn1kandeman.sch.id",
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ])
            ],
        ]);
    }
}
