<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

class PermissionUserResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions for user resources
        Permission::create(['guard_name' => 'web','name' => 'user manager','description'=>'Membolehkan pengguna mengelola member','category'=>'user']);
        Permission::create(['guard_name' => 'web','name' => 'create users','description'=>'Membolehkan pengguna menambahkan member','category'=>'user']);
        Permission::create(['guard_name' => 'web','name' => 'edit users','description'=>'Membolehkan pengguna mengubah data member','category'=>'user']);
        Permission::create(['guard_name' => 'web','name' => 'delete users','description'=>'Membolehkan pengguna menghapus member','category'=>'user']);
        Permission::create(['guard_name' => 'web','name' => 'show users','description'=>'Membolehkan pengguna menampilkan member','category'=>'user']);
        Permission::create(['guard_name' => 'web','name' => 'all users','category'=>'user']);

        Permission::create(['guard_name' => 'web','name' => 'sekolah manager','description'=>'Membolehkan pengguna mengelola sekolah','category'=>'sekolah']);
        Permission::create(['guard_name' => 'web','name' => 'create sekolah','description'=>'Membolehkan pengguna menambahkan sekolah','category'=>'sekolah']);
        Permission::create(['guard_name' => 'web','name' => 'edit sekolah','description'=>'Membolehkan pengguna mengubah data sekolah','category'=>'sekolah']);
        Permission::create(['guard_name' => 'web','name' => 'delete sekolah','description'=>'Membolehkan pengguna menghapus sekolah','category'=>'sekolah']);
        Permission::create(['guard_name' => 'web','name' => 'show sekolah','description'=>'Membolehkan pengguna menampilkan sekolah','category'=>'sekolah']);
        Permission::create(['guard_name' => 'web','name' => 'all sekolah','category'=>'sekolah']);

        Permission::create(['guard_name' => 'web','name' => 'create users jejaring','description'=>'Membolehkan pengguna membuat member jejaring','category'=>'user']);
        Permission::create(['guard_name' => 'web','name' => 'edit users jejaring','description'=>'Membolehkan pengguna mengubah data member jejaring','category'=>'user']);
        Permission::create(['guard_name' => 'web','name' => 'delete users jejaring','description'=>'Membolehkan pengguna menghapus data member jejaring','category'=>'user']);
        Permission::create(['guard_name' => 'web','name' => 'show users jejaring','description'=>'Membolehkan pengguna melihat data member jejaring','category'=>'user']);
        Permission::create(['guard_name' => 'web','name' => 'all users jejaring','category'=>'user']);

        Permission::create(['guard_name' => 'web','name' => 'edit users self','description'=>'Membolehkan pengguna mengubah data member sendiri','category'=>'user']);
        Permission::create(['guard_name' => 'web','name' => 'show users self','description'=>'Membolehkan pengguna melihat data member sendiri','category'=>'user']);


        // ADMIN JEJARING
        $role1 = Role::create(['guard_name' => 'web','name' => 'Manajer Jejaring']);
        $role1->givePermissionTo('user manager');
        $role1->givePermissionTo('create users jejaring');
        $role1->givePermissionTo('edit users jejaring');
        $role1->givePermissionTo('delete users jejaring');
        $role1->givePermissionTo('show users jejaring');
        $role1->givePermissionTo('all users jejaring');
        $role1->givePermissionTo('edit users self');
        $role1->givePermissionTo('show users self');

        
        // ASESI
        $role2 = Role::create(['guard_name' => 'web','name' => 'Member']);
        $role2->givePermissionTo('edit users self');
        $role2->givePermissionTo('show users self');


        // ASESOR
        $role3 = Role::create(['guard_name' => 'web','name' => 'Asesor']);
        $role3->givePermissionTo('edit users self');
        $role3->givePermissionTo('show users self');

        // SUPER ADMIN
        $role4 = Role::create(['guard_name' => 'web','name'=>'Super Manajer']);

        // user role assignment
        $user1 = User::find(1);
        $user1->assignRole($role4);

        $user2 = User::find(2);
        $user2->assignRole($role1);

        $user3 = User::find(3);
        $user3->assignRole($role2);

        $user4 = User::find(4);
        $user4->assignRole($role3);
    }
}
