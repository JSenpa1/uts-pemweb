<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
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
                    <button onclick="window.location.href='{{ url('/UserCart') }}'" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Cart</button>
                    <a href="{{ url('/home') }}" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Dashboard</a>
                    @else
                    <button onclick="window.location.href='{{ route('login') }}'" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Login</button>

                        @if (route::has('register'))
                            <a href="{{ route('register') }}" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Register</a>
                        @endif
                    @endauth
                </div>
                @endif
            </div>
        </nav>
        {{-- Kalau mau nambahin sesuatu disini --}}
    </div>
</body>
</html>


