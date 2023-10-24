<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    .animate-charcter
    {
        text-transform: uppercase;
        background-image: linear-gradient(
            -225deg,
            #231557 0%,
            #44107a 29%,
            #ff1361 67%,
            #fff800 100%
        );
        background-size: auto auto;
        background-clip: border-box;
        background-size: 200% auto;
        color: #fff;
        background-clip: text;
        text-fill-color: transparent;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: textclip 10s linear infinite;
        display: inline-block;
        font-size: 190px;
    }

    @keyframes textclip {
        to {
            background-position: 200% center;
        }
    }
</style>
<body>
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
                    <button onclick="window.location.href='{{ url('/UserCart') }}'" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded hover:animate-fade duration-200">Cart</button>
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

            <!-- <div>
                @if (Route::has('login'))
                <button onclick="window.location.href='{{ url('/') }}'" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded hover:animate-bounce">Home</button>
                <button onclick="window.location.href='{{ url('/UserMenu') }}'" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded hover:animate-bounce">Menus</button>
                    @auth
                    <button onclick="window.location.href='{{ url('/UserCart') }}'" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded hover:animate-bounce ">Cart</button>
                    <button onclick="window.location.href='{{ url('/home') }}'" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded hover:animate-bounce">Dashboard</button>
                    @else
                    <button onclick="window.location.href='{{ route('login') }}'" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded hover:animate-bounce">Login</button>
                        @if (route::has('register'))
                            <a href="{{ route('register') }}" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded hover:animate-bounce">Register</a>
                        @endif
                    @endauth
                </div>
                @endif
            </nav> -->

            <div class="container mx-auto dark:text-white md:p-6 sm:p-8">
                <div class="md:mt-10 flex flex-wrap justify-center md:gap-14 sm:gap-10">
                    <img src="{{ asset('anime_cafe_by_lexex11_dfi57sr-fullview.png') }}" class="sm:w-45 md:h-64 w-full object-cover rounded-xl" />
                    <h1 id="text" class="dark:text-white text-4xl font-bold animate-charcter">Welcome To <i>GML</i> Restaurant </h1>
                </div>
                {{-- <div class="flex items-center justify-center bg-opacity-50">
                    <p class="text-white text-2xl font-bold">Hello, World!</p>
                </div> --}}
            </div>

            <div class="container mx-auto dark:text-white md:p-6 sm:p-8">
                <div class="md:mt-10 flex flex-wrap justify-center md:gap-14 sm:gap-10">
                    <img src="{{ asset('wallpaperflare.com_wallpaper.jpg') }}" class="sm:w-45 md:h-64 w-full object-cover rounded-xl" />
                    <h1 id="text" class="dark:text-white text-4xl font-bold animate-charcter">What You Need, Is What We Have</h1>
                </div>
            </div>

            {{-- <script>
                let text = new SplitType('#text');
                let characters = document.querySelectorAll('.char');

                for(i = 0; i < characters.length; i++)
                {
                    characters[i].classList.add('translate-y-full');
                }

                gsap.to('.char' {
                    y = 0;
                    stagger: 0.05;
                    delay: 0.02,
                    duration: 0.5;
                });

            </script> --}}
</body>
</html>


