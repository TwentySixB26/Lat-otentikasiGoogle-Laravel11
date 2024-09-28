<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class HomeController extends Controller
{
    public function index(){
        return view('home') ; 
    }

    public function redirect(){
        return Socialite::driver('google')->redirect() ;  
        //1. socialite harus di instal terlebih dahulu,seperti pada awal instlasi tadi
        //composer require Laravel/socialite


        //2. google diambil bersasarkan yang ditulis di services.php 
    }

    public function callback() {
        $googleUser=  Socialite::driver('google')->user();  
        $user = User::where(['email' => $googleUser->email])->first() ; 
        //jika user tidak terdaftar maka akan didaftarkan atau otomatis masuk ke database
        if (!$user) {
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
            ]) ;
        }
        Auth::login($user) ; 
        return redirect()->route('home.landing') ; 
    }


    public function landing(){
        return view('landing') ; 
    }

}
