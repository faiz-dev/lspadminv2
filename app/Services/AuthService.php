<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role as ModelsRole;

class AuthService 
{
    public static function loginSaml($email)
    {
        // dd($email);
        
        if (Auth::attempt(['email'=> $email, 'password' => "root"])) {                        
            $user = Auth::user();
            $userType = json_decode($user->tipe);
            
            if($user->hasRole(['Member'])) {
                return ['user'=>$user, 'redirect' => '/member'];
            } elseif($user->hasRole(['Asesor','Manajer Jejaring'])) {
                return ['user'=>$user, 'redirect' => '/manager'];                
            } elseif(in_array('asesi', $userType)){
                dd(["Asesi", $user]);
                $role = ModelsRole::findByName('Member', 'web');
                $user->assignRole($role);
                return ['user'=>$user, 'redirect' => '/member'];
            } else {
                Auth::logout();
            }
        } else {
            Auth::logout();
        }
    }
}
