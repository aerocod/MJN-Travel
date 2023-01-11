<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index ()
    {
        return view("login", [
            "title" => "Login",
        ]);
    }

    //kemudian disini kita dapat validasi dulu datanya
    public function authenticate(Request $request)
    {
        //kemudian diisni kita dapat cek data yang diinput
        $credential = $request->validate([
            //"email"=>"required|email:dns" dns disini dihapus karena di faker domainya tidak ada semua
            "email"=>"required|email",
            "password" => "required"
        ]);

        //lalu disini kita dapat cek dengan yang ada di tabel apakah valid datanya atau tidak
        if(Auth::attempt($credential))
        {
            //kalau data valid, maka ia akan ke regenerate session baru, ingat disini kita belajar bahwa session untuk dapat digunakan orang lain apabila user masih login
            $request->session()->regenerate();
            //kemudian kita dapat redirect dan disini kita pakai intended untuk menghindari terjadinya adanya serangan
            return redirect()->intended("/");
        }

        //lalu disini kita dapat buat flash apabila login error
        $error = $request->session()->flash("loginError","login failed");
        return back()->with($error);
    }

    //kemudian disini kita mau logout
    public function logout(Request $request)
    {
        //lalu disini kita logout
        Auth::logout();
        //session login kita dihapus
        $request->session()->invalidate();
        //kemudian token keamanan di regenerate lagi
        $request->session()->regenerateToken();
        //lalu kita dapat di redirect ke route login
        return redirect('login');
    }
}
