<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthFrontendController extends Controller
{
    public function postLogin(Request  $request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        $email = $request->get('email');
        $password = $request->get('password');
        $check = DB::table('customers')->where('email',$email)->first();

        if ($check) {
            if (Hash::check($password,$check->password)) {
                session()->put('customers_id',$check->id);
                session()->put('customers_name',$check->name);
                session()->put('customers_email',$check->email);

                return redirect()->back()->with(["message"=>"Success Login"]);
            }else{
                return redirect()->back()->withInput()->with(["message"=>"Password Tidak ditemukan"]);
            }
        }else{
            return redirect()->back()->withInput()->with(["message"=>"Email Tidak ditemukan"]);
        }
    }
    public function getLogout() {
        session()->flush();
        return redirect('')->with(["message"=>"Terimakasih"]);
    }
}
