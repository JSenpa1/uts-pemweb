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
          <div class="flex items-center flex-shrink-0 text-white mr-6">
              <span class="font-semibold text-xl tracking-tight">GML Restaurant</span>
            </div>
            <div class="flex items-center">
                <img src="{{ asset('logo.png') }}" class="md:h-auto lg:h-12 sm:h-6 lg:pr-5"/>
              </div>
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
        {{-- Kalau mau nambahin sesuatu disini --}}
    </div>
</body>
</html>


