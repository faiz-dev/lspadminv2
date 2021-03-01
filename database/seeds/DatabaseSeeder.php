<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(PermissionUserResourcesSeeder::class);
        // $this->call(SekolahResourcesSeeder::class);
        // $this->call(TUKResourcesSeeder::class);
        // $this->call(SkemaResourcesSeeder::class);
        // $this->call(UjiKompetensiResourcesSeeder::class);
        // $this->call(AsesiResourcesSeeder::class);
        // $this->call(AsesiTambahan::class);

        $this->call(SkemaResourceTKRSeeder::class);
        
    }
}
