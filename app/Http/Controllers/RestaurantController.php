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
        $jenis = $request->input('jenis');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public', $filename);
        }

        DB::insert('insert into restaurant (name, price, description, foto, jenis) values (?, ?, ?, ?, ?)', [$name, $price, $description, $filename, $jenis]);
        return view('post');
        // echo '<img src="' . asset('storage/cosmicFriedRice.png') . '" alt="foto">';
    }

    public function getEditAdmin($id) {
        // Use $id to fetch the specific product with this ID
        // Implement your logic for editing the product here
        return view('editRestaurant', ['id' => $id]);
    }

    public function getDeleteAdmin($id)
    {
        DB::delete('delete from restaurant where id = ?', [$id]);
        return redirect()->to('post')->send();
    }

    public function editProcess(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public', $filename);
        }

        DB::update('update restaurant set name = ?, price = ?, description = ?, foto = ? where id = ?', [$name, $price, $description, $filename, $id]);
        return view('post');
    }
}
