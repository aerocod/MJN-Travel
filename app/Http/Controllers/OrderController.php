<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use Auth;

class OrderController extends Controller
{
    public function index ()
    {
        $checkouts = Checkout::with('destination')->whereUserId((Auth::id()))->get();
        return view('orders', [
            "title" => "Orders",
            'checkouts' => $checkouts
        ]);
    }
}
