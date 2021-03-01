<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Socialite;



class SocialController extends Controller

{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $userSocial = Socialite::driver($provider)->user();
        $userData = DB::table('users')->where('email', $userSocial->email)->first();        
        if($userData) {            
            // dd($user);
            Auth::loginUsingId($userData->id, false);
            $userData = Auth::user();
            $userType = json_decode($userData->tipe);     
            // dd([
            //     $userType,
            //     $userData->getRoleNames()
            // ]);       
            if($userData->hasRole(['Member'])) {
                return redirect('/member');
            } elseif($user->hasRole(['Asesor','Manajer Jejaring'])) {
                return redirect('/manager');
            } elseif(in_array('asesi', $userType)){                
                $role = ModelsRole::findByName('Member');
                $userData->assignRole($role);
                return redirect('/member');
            } else {
                dd($userData);
                Auth::logout();
                return redirect('/');
            }  

        } else {
            // echo "cerate new user";
            $user = new \App\Models\User;
            $user->name = $userSocial->getName();
            $user->email = $userSocial->email;
            $user->uid = Str::uuid();
            $user->tipe = json_encode(["asesi"]);
            $user->password = Hash::make("12345", [
                'memory' => 1024,
                'time'  => 2,
                'threads' => 2
            ]);
            // echo "saving user new";
            // dd($user);
            $user->save();
            
            $role = \Spatie\Permission\Models\Role::findByName('Member', 'web');
            $user->assignRole($role);
            Auth::loginUsingId($user->id);

            
            return redirect('/member');



            // DB::table('users')->insert(
            //     [
            //         "name"=>   $userSocial->getName(),
            //         "email" =>  $userSocial->email,
            //         "uid"   =>   Str::uuid(),
            //         "tipe"  => json_encode(["asesi"]),
            //         "password" =>   Hash::make("12345", [
            //                 'memory' => 1024,
            //                 'time'  => 2,
            //                 'threads' => 2
            //             ]),
            //     ]
            // );
            // return redirect('/memberauth')->with('errors','Login Gagal, User tidak ditemukan');
        }
    }
}

