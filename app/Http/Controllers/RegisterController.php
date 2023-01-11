<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register', [
            "title" => "Register",
        ]);
    }

    //cara ke-2 mengambil data post dari register
    //jadi disini kita dapat mengambil seluruh data post dengan menuliskan Request $request
    public function store (Request $request)
    {
        //cara ke-1 mengambil data posts
        //request disini untuk mengambil seluruh data posts
        // return request()->all();

        //berikut cara untuk melakukan validasi data ketika registrasi
        $validateData = $request->validate([
            // jadi disini kita cek bahwa isi variabel name maximum ada 255 karakter
            'name' => 'required|string|max:255',
            //lalu kalau di username di cek bahwa minimum karakter 3 dan maximum karakter 25 dan kemudian ini harus unique dan dicek di tabel user apakah ada atau tidak usernamenya kalau ada maka akan error
            'username' => 'required|string|min:3|max:25|unique:users',
            //lalu disini untuk email tipe datanya email dan disini email harus unique sehingga apabila yang ktia ketikkan emailnya ada di database maka akan error, dns disini untuk cek apakah domainnya udh benar yaitu.com
            'email' => 'required|email|unique:users',
            //lalu ada password disini dan ini minimum karakter password 5 dan maximum 25
            'password' => 'required|string|min:5|max:255',
        ]);

        //ini untuk enkripsi password
        $validateData["password"] = bcrypt($validateData["password"]);
        //ini untuk memasukkan data ke tabel user
        User::create($validateData);

        //kemudian disini akan muncul flash yang akan menghasilkan seperti notification, jadi setelah berhasil registrasi flash ini akan muncul di laman login dan kata success disini seperti nama variabel 
        $request->session()->flash("success", "Registration Successful! Please Login");
        //setelah registrasi akan diarahkan ke login 
        return redirect("/login");
    }
}
