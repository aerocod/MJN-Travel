<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashboardCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.categories.index", [
            "categories" => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //kemudian ini untuk cek validasi data
        $validatedData = $request->validate([
            "name" => "required|string|max:255|unique:categories",
            "slug" => "required|string|unique:categories"
        ]);

        //kemudian kita dapat masukkan datanya ke tabel
        Category::create($validatedData);
        //lalu kita dapat buat notificationnya
        $notification = $request->session()->flash("New Categories", "New Category Has been added");
        //lalu disini kita akan di return ke halaman dashboard yang otomatis akan mengakses file index
        return redirect("/dashboard/categories")->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            //lalu disini akan mereturn data yang diselect 
            "categories" => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //berikut validasi data yang kita update dan disini meskipun kita tidak ganti slug maka akan muncul error karena sudah ada slug yang sama padahal kita tidak ganti slugnya, sehingga disini kita dapat hilangkan slug di variabel rulesnya
        $rules = [
            "name" => "required|max:255",
        ];

        //sehingga kita dapat berikan kondisi apabila slug tidak sama seperti sebelumnya, maka kita dapat berikan kondisi unique
        if($request->slug != $category->slug)
        {
            $rules["slug"] = "required|unique:categories";
        }

        //kemudian kita baru validasi
        $validatedData = $request->validate($rules);

        //kemudian kita dapat update datanya
        Category::where("id", $category->id)->update($validatedData);

        //lalu kita dapat buat notificationnya
        $notification = $request->session()->flash("Update Categories", "Category Has Been Updated");
        //lalu disini kita akan di return ke halaman dashboard yang otomatis akan mengakses file index
        return redirect("/dashboard/categories")->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {
        Category::destroy($category->id);
        //lalu kita dapat buat notificationnya
        $notification = $request->session()->flash("Delete Categories", "Category Has Been Deleted");
        //lalu disini kita akan di return ke halaman dashboard yang otomatis akan mengakses file index
        return redirect("/dashboard/categories")->with($notification);
    }
}
