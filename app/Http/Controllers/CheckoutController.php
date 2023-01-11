<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class CheckoutController extends Controller
{
    public function index()
    {
        $destination= Destination::where("slug", request("destination"))->first("title");
        return view("checkout", [
            "title" => "Checkout",
            "destination" => $destination
        ]);
    }

    public function store(Request $request)
    {
        //berikut cara untuk melakukan validasi data ketika checkout
        $validateData = $request->validate([
            // jadi disini kita cek bahwa isi variabel name maximum ada 255 karakter
            'name' => 'required|string|max:255',
            'email' => 'required',
            'date_of_booking'=>'required|after:today',
            'quantity' => 'required|numeric|min:1',
            'card_number' => 'required|string|min:19',
            'expired' => 'required|date|date_format:Y-m|after:today',
            'cvc' => 'required|string|max:3'
        ]);
        $validateData["card_number"] = Hash::make($request->card_number);
        $validateData["expired"] = Carbon::createFromFormat('Y-m', $request->expired);
        $validateData["cvc"] = Hash::make($request->cvc);
        $validateData["destination_id"] = Destination::where("slug", request("destination"))->sum('id'); 
        $validateData["user_id"] = Auth::id(); 
        $validateData["price_per_person"] = Destination::where("slug", request("destination"))->sum("price");
        $validateData["total"] = $validateData["price_per_person"] * $validateData["quantity"];
        // return dd($validateData);

        //ini untuk memasukkan data ke tabel user
        Checkout::create($validateData);
        //setelah registrasi akan diarahkan ke login 
        return redirect("/success-checkout");
    }
}
