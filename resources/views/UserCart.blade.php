<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php
        use Illuminate\Support\Facades\Auth;
        use Illuminate\Support\Facades\DB;

        if(Auth::id())
        {
            $id = Auth()->user()->id;

    ?>

<div class="min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <nav class="flex items-center justify-between flex-wrap bg-blue-800 p-6">
        <div class="flex items-center">
            <img src="{{ asset('logo.png') }}" class="md:h-auto lg:h-12 sm:h-6 lg:pr-5"/>
          </div>
        <div class="flex items-center flex-shrink-0 text-white mr-6">
          <span class="font-semibold text-4xl tracking-tight">IF 330 - GML Restaurant</span>
        </div>
        <div>
            @if (Route::has('login'))
            <button onclick="window.location.href='{{ url('/') }}'" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded hover:animate-fade duration-200">Home</button>
            <button onclick="window.location.href='{{ url('/UserMenu') }}'" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded hover:animate-fade duration-200">Menus</button>
                @auth
                <button onclick="window.location.href='{{ url('UserCart') }}'" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded hover:animate-fade duration-200">Cart</button>
                <button onclick="window.location.href='{{ url('/home') }}'" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded hover:animate-fade duration-200">Dashboard</button>
                @else
                <button onclick="window.location.href='{{ route('login') }}'" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded hover:animate-fade duration-200">Login</button>

                    @if (route::has('register'))
                        <a href="{{ route('register') }}" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded hover:animate-fade duration-200">Register</a>
                    @endif
                @endauth
            </div>
            @endif
    </nav>
    <div class="container mx-auto overflow-x-auto sm:rounded-lg lg:mt-10 sm:mt-10">
    <table class="w-full text-sm text-left dark:text-zinc-50">
        <thead class="text-xs uppercase bg-blue-900 text-zinc-300">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Picture
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
    </thead>
    {{-- <tfoot class="text-xs uppercase bg-blue-900 text-zinc-300">
        <tr>
            <td>Total</td>
            <td>Price</td>
            <td>Checkout</td>
        </tr>
    </tfoot> --}}
    <?php
        $sum = 0;
        $products = DB::table('userorder')
        ->join('restaurant', 'userorder.Order_Id', '=', 'restaurant.id')
        ->select('userorder.*', 'restaurant.name', 'restaurant.price', 'restaurant.description', 'restaurant.foto')
        ->where('userorder.User_Id', $id)
        ->get();

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

        foreach ($products as $product)
        {
    ?>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $product->name }}
                </th>
                <td class="px-6 py-4">
                    <img class="md:w-1/4 sm:w-1/2" src="storage/{{ $product->foto }}" />
                </td>
                <td class="px-6 py-4 dark:text-white">
                    {{ $product->description }}
                </td>
                <td class="px-6 py-4">
                    Rp. {{ $product->price }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('checkAuth1', ['productId' => $product->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Add more</a>
                    <a href="{{ route('deleteCart', ['productId' => $product->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Remove</a>
                </td>
            </tr>
    <?php
        $sum+= $product->price;
        }
    ?>
        </tbody>
    <?php
        }
    ?>
    </table>
    <div class="container mx-auto md:my-10 sm:my-10">
        <h1 class="text-zinc-50 text-center">Total Price =  Rp. {{ $sum }}</h1>
        <center><button id="checkout" onclick="window.location.href='{{ route('checkOut') }}'" class="md:mt-4 bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded hover:animate-fade duration-200">Checkout</button></center>
        {{-- {{ route('checkOut') }} --}}
    </div>

    <script>
        const button = document.getElementById('checkout');
        button.addEventListener('click', function() {
        alert('Thanks For Your Purchases');
        });
    </script>
</body>
</html>
