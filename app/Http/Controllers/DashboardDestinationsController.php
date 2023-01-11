<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardDestinationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.destinations.index', [
            "destinations" => Destination::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.destinations.create", [
            "categories" => Category::all()
        ]);
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
            "title" => "required|string|max:255",
            "slug" => "required|string|unique:destinations",
            "category_id" => "required",
            //ingat tulis file dulu baru max kalau enggak nanti max akan dikiranya sebagai karaketer, kalau tulisnya setelah file maka akan dianggap sebagai 1 kilobyte
            // "image" => "image|file|max:1024",
            "body" => "required",
            "price" => "required|numeric",
        ]);

        //jadi disini kalau ada file image yang diinput maka akan kesimpan di storage, bila tidak ada, maka gambar akan diambil secara default dari unsplash
        if($request->file("image"))
        {
            $validatedData["image"] = $request->file("image")->store("post-images");
        }

        //kemudian kita dapat masukkan datanya ke tabel
        Destination::create($validatedData);
        //lalu kita dapat buat notificationnya
        $notification = $request->session()->flash("New Destination", "New Destination Has been added");
        //lalu disini kita akan di return ke halaman dashboard yang otomatis akan mengakses file index
        return redirect("/dashboard/destinations")->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show(Destination $destination)
    {
         //ini akan mereturn view dan data 
        return view("dashboard.destinations.show", [
            "destinations" => $destination
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination)
    {
        return view('dashboard.destinations.edit', [
            //lalu disini akan mereturn data yang diselect 
            "destinations" => $destination,
            "categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destination $destination)
    {
        //berikut validasi data yang kita update dan disini meskipun kita tidak ganti slug maka akan muncul error karena sudah ada slug yang sama padahal kita tidak ganti slugnya, sehingga disini kita dapat hilangkan slug di variabel rulesnya
        $rules = [
            "title" => "required|string|max:255",
            "category_id" => "required",
            // "image" => "image|file|max:1024",
            "body" => "required",
            "price" => "required"
        ];

        //sehingga kita dapat berikan kondisi apabila slug tidak sama seperti sebelumnya, maka kita dapat berikan kondisi unique
        if($request->slug != $destination->slug)
        {
            $rules["slug"] = "required|unique:destination";
        }

        //kemudian kita baru validasi
        $validatedData = $request->validate($rules);

        //jadi disini kita cek apakah ada input gambar baru
        if($request->file("image"))
        {
            //kalau ada input gambar baru, maka gambar lama di delete
            if($request->oldImage) 
            {
                Storage::delete($request->oldImage);
            }
            //kalau ada gambar baru, maka gambar tersebut akan dimasukkan kedalam folder
            $validatedData["image"] = $request->file("image")->store("post-images");
        }

        //kemudian kita dapat update datanya
        Destination::where("id", $destination->id)->update($validatedData);

        //lalu kita dapat buat notificationnya
        $notification = $request->session()->flash("Update Destination", "Destination Has Been Updated");
        //lalu disini kita akan di return ke halaman dashboard yang otomatis akan mengakses file index
        return redirect("/dashboard/destinations")->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Destination $destination)
    {
        // if($post->image) 
        // {
        //     Storage::delete($post->image);
        // }

        //jadi disini kan kita sudah mengganti model binding untuk mengambil slug yang awalnya id sehingga disini kita mengambil data berdasarkan slug lalu kita ambil idnya, lalu baru dihapus berdasarkan id tersebut
        //kemudian kita dapat menghapus datanya berdasarkan id
        Destination::destroy($destination->id);
        //lalu kita dapat buat notificationnya
        $notification = $request->session()->flash("Delete Destination", "Destination Has Been Deleted");
        //lalu disini kita akan di return ke halaman dashboard yang otomatis akan mengakses file index
        return redirect("/dashboard/destinations")->with($notification);
    }
}
