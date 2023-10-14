<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <nav class="flex items-center justify-between flex-wrap bg-blue-800 p-6">
            <div class="flex items-center">
              <img src="{{ asset('logo.png') }}" class="md:h-auto lg:h-20 sm:h-6 lg:pr-5"/>
            </div>
            <div class="flex items-center flex-shrink-0 text-white mr-6">
                <span class="font-semibold text-xl tracking-tight">GML Restaurant</span>
              </div>
            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
              <div>
                @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Login</a>

                        @if (route::has('register'))
                            <a href="{{ route('register') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Register</a>
                        @endif
                    @endauth
                </div>
                @endif
            </div>
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
                        <a href="{{ route('getEditAdmin', ['id' => $product->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <a href="{{ route('getDeleteAdmin', ['id' => $product->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                    </td>
                </tr>
        <?php
            }
        ?>
        </table>
        </div>
        <div class="container mx-auto lg:py-16">
          <a class="text-zinc-50 hover:text-blue-500 transition ease-in-out" href="{{ url('/addRestaurant') }}">Add Products</a>
        </div>
    </div>

</body>
</html>

