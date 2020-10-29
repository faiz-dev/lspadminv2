<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AsesiResourcesSeeder extends Seeder
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
        ]);
    }
}
