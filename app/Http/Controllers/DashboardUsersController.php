<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.users.index", [
            "users" => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|string|max:255|unique:users",
            "username" => "required|string|min:5|max:50|unique:users",
            "email" => "required|email|unique:users",
            "password" => "required|string|min:5",
            "password_confirmation" => "required|same:password",
            "is_admin" => "required"
        ]);

        $validatedData["password"] = Hash::make($request->password);
        //kemudian kita dapat masukkan datanya ke tabel
        User::create($validatedData);
        //lalu kita dapat buat notificationnya
        $notification = $request->session()->flash("New Users", "New User Has been added");
        //lalu disini kita akan di return ke halaman dashboard yang otomatis akan mengakses file index
        return redirect("/dashboard/users")->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("dashboard.users.edit", [
            "users" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            "name" => "required|string|max:255",
            "is_admin" => "required"
        ];

        //sehingga kita dapat berikan kondisi apabila username tidak sama seperti sebelumnya, maka kita dapat berikan kondisi unique
        if($request->username != $user->username)
        {
            $rules["username"] = "required|min:5|max:50|unique:users";
        } elseif ($request->email != $user->email)
        {
            $rules["email"] = "required|email|unique:users";
        }

        //kemudian kita baru validasi
        $validatedData = $request->validate($rules);

        //kemudian kita dapat update datanya
        User::where("id", $user->id)->update($validatedData);

        //lalu kita dapat buat notificationnya
        $notification = $request->session()->flash("Update Users", "User Has Been Updated");
        //lalu disini kita akan di return ke halaman dashboard yang otomatis akan mengakses file index
        return redirect("/dashboard/users")->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        User::destroy($user->id);
        //lalu kita dapat buat notificationnya
        $notification = $request->session()->flash("Delete Users", "User Has Been Deleted");
        //lalu disini kita akan di return ke halaman dashboard yang otomatis akan mengakses file index
        return redirect("/dashboard/users")->with($notification);
    }
}
