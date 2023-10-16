<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <nav class="flex items-center justify-between flex-wrap bg-blue-800 p-6">
            <div class="flex items-center">
                <img src="{{ asset('logo.png') }}" class="md:h-auto lg:h-12 sm:h-6 lg:pr-5"/>
              </div>
            <div class="flex items-center flex-shrink-0 text-white mr-6">
              <span class="font-semibold text-xl tracking-tight">GML Restaurant</span>
            </div>
            <div>
                @if (Route::has('login'))
                <button onclick="window.location.href='{{ url('/') }}'" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Home</button>
                <button onclick="window.location.href='{{ url('/UserMenu') }}'" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Menus</button>
                    @auth
                    <button onclick="window.location.href='{{ url('UserCart') }}'" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Cart</button>
                    <a href="{{ url('/home') }}" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Dashboard</a>
                    @else
                    <button onclick="window.location.href='{{ route('login') }}'" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Login</button>

                        @if (route::has('register'))
                            <a href="{{ route('register') }}" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Register</a>
                        @endif
                    @endauth
                </div>
                @endif
        </nav>
        <div class="container mx-auto overflow-x-auto sm:rounded-lg lg:mt-10">
        <table class="w-full text-sm text-left text-zinc-50">
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
        <?php
            use Illuminate\Support\Facades\DB;

            $products = DB::select('select * from restaurant');

            foreach ($products as $product)
            {
        ?>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $product->name }}
                    </th>
                    <td class="px-6 py-4">
                        <img src="storage/{{ $product->foto }}" />
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->description }}
                    </td>
                    <td class="px-6 py-4">
                        Rp. {{ $product->price }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('checkAuth1', ['productId' => $product->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Add to Cart</a>
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Remove</a>
                    </td>
                </tr>
        <?php
            }
        ?>
        </table>
        </div>
        <div class="container mx-auto lg:py-16">
          <a class="text-zinc-50 hover:text-blue-500 transition ease-in-out" href="#">Checkout</a>
        </div>
    </div>

</body>
</html>

