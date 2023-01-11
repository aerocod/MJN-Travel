<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        return view("categories",[
            "title" => "Categories",
            "categories" => Category::all()
        ]);
    }
}
