<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Aacotroneo\Saml2\Http\Controllers\Saml2Controller;
use Illuminate\Http\Request;

class MySaml2Controller extends Saml2Controller
{
    public function login(Request $request)
    {
        $login_redirect = url('/member');
        $this->saml2Auth->login($login_redirect);
        return view('auth.userlogin');
    }
}
