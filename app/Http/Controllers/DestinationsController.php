<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Category;

class DestinationsController extends Controller
{
    public function index() 
    {
        $title = "";
        if(request("category")) 
        {
            $category = Category::firstWhere("slug", request("category"));
            $title = " in " . $category->name;
        }
        return view("destinations", [
            "title"=>"All Destinations".$title,
            "destinations" => Destination::latest()->filter(request(["search", "category"]))->get()->paginate(6)->withQueryString()
        ]);
    }

    public function show(Destination $destination)
    {
        return view("detail_product", [
            "title" => "Single Product",
            "destinations" => $destination
        ]);
    }
}
