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
              <span class="font-semibold text-4xl tracking-tight">GML Restaurant</span>
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
        {{-- <div class="container mx-auto overflow-x-auto sm:rounded-lg lg:mt-10 sm:mt-10">
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
        </thead> --}}
        <div class="flex flex-wrap justify-center lg:mt-10 gap-6 align-items-center">
        <?php
            use Illuminate\Support\Facades\DB;

            $products = DB::select('select * from restaurant');
        ?>
            {{-- <tbody> --}}
                {{-- @foreach ($products as $product)
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div id="product-container-{{ $product->id }}" class="relative">
                            <img class="rounded-t-lg px-16 cursor-pointer" src="storage/{{ $product->foto }}" alt="foto" onclick="toggleProductInfo({{ $product->id }})" />
                            <div class="p-5 hidden product-info-{{ $product->id }}">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">{{ $product->name }}</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">{{ $product->description }}</p>
                                <button class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover-bg-blue-700 dark:focus:ring-blue-800">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach --}}

                @foreach ($products as $product)
                    <div class="w-96 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 h-auto">
                        <div class="relative flex flex-col items-center">
                            <img class="rounded-t-lg px-16 cursor-pointer w-11/12" src="storage/{{ $product->foto }}" alt="foto" onclick="toggleProductInfo({{ $product->id }})" />
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center cursor-pointer" onclick="toggleProductInfo({{ $product->id }})">{{ $product->name }}</h5>
                            <div id="product-info-{{ $product->id }}" class="p-5 hidden text-center">
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->description }}</p>
                                <h6 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white text-center cursor-pointer">Rp. {{ $product->price }}</h5>
                                <button onclick="window.location.href='{{ route('checkAuth1', ['productId' => $product->id]) }}'" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover-bg-blue-700 dark:focus:ring-blue-800">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach


                {{-- <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img class="rounded-t-lg px-16" src="storage/{{ $product->foto }}" alt="foto" />
                    <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">{{ $product->name }}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">{{ $product->description }}</p>
                        <button class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Add to Cart
                             {{-- <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg> --}}
                        {{-- </button>
                    </div>
                </div>  --}}

                {{-- <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
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
                        {{-- <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Remove</a> --}}
                    {{-- </td>
                </tr> --}}
        </div>
        {{-- </table>
        </div> --}}
        {{-- <div class="container mx-auto lg:py-16">
          <a class="text-zinc-50 hover:text-blue-500 transition ease-in-out" href="#">Checkout</a>
        </div> --}}
    </div>
    <script>
        function toggleProductInfo(productId) {
            console.log(`Toggle product info for product with ID ${productId}`);
            const productInfo = document.querySelector(`#product-info-${productId}`);
            productInfo.classList.toggle('hidden');
        }
    </script>
</body>
</html>

