<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class TestController extends Controller
{
    

    public function createToken()
    {
        $user = User::where('email', 'admin@ker.com')->first();

        #dd($user);

        return $user->createToken('my-device')->plainTextToken;
    }


    public function authenticate()
    {
        $user = 'siji@webandcrafts.in';
        $pwd  = 'password';

        $credentials = [
             'email' => $user,
            'password' => $pwd,

        ];

        if(Auth::guard('admin')->attempt($credentials)) {
            echo 'authenticated';
        }
        else {
            echo 'failed';
        }
    }   
}
