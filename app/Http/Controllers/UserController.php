<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function checkAuth1($productId)
    {
        if(Auth::id())
        {
            $usertype = Auth()->user()->usertype;
            $userId = Auth()->user()->id;

            if(!isset($usertype))
            {
               return view('auth.register');
            }

            else
            {
                DB::insert('insert into userorder (User_Id, Order_Id) values (?, ?)', [$userId, $productId]);
                return redirect()->to('UserMenu')->send();
            }
        }
    }

    public function viewCart()
    {
        if(Auth::id())
        {
            $usertype = Auth()->user()->usertype;

            if(!isset($usertype))
            {
                return view('auth.register');
            }

            else
            {
                return view('UserCart');
            }
        }
    }

    public function deleteCart($id)
    {
        DB::delete('delete from userorder where id = ?', [$id]);
        return redirect()->to('UserCart')->send();
    }

    public function checkOut()
    {
        $userId = Auth()->user()->id;
        DB::delete('delete from userorder where User_Id = ?', [$userId]);
        return redirect()->to('UserCart')->send();
    }
}

// $userId = 1; // Replace with the actual user ID
// $orderId = 2; // Replace with the actual order ID

// $restaurant = DB::table('UserOrder')
//     ->join('restaurant', 'UserOrder.Order_Id', '=', 'restaurant.id')
//     ->select('restaurant.*')
//     ->where('UserOrder.User_Id', $userId)
//     ->where('UserOrder.Order_Id', $orderId)
//     ->first(); // Use first() to get a single result

// if ($restaurant) {
//     // Restaurant data is available
//     $restaurantName = $restaurant->name;
//     $restaurantPrice = $restaurant->price;
//     // ... access other restaurant attributes
// } else {
//     // Restaurant not found for the user and order
//     // Handle the case where the data is not available
// }
