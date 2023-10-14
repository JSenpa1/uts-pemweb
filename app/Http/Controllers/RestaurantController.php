<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RestaurantController extends Controller
{
    public function addProcess(Request $request)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public', $filename);
        }

        DB::insert('insert into restaurant (name, price, description, foto) values (?, ?, ?, ?)', [$name, $price, $description, $filename]);

        return view('post');
        // echo '<img src="' . asset('storage/cosmicFriedRice.png') . '" alt="foto">';
    }
}
