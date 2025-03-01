<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/30b351febc.js" crossorigin="anonymous"></script>
    <title>@yield("title") | E-Commerce </title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])


</head>

<body>

    {{-- HEADER --}}
    <header class="w-full bg-slate-900">
        {{-- top header --}}
        <div class="w-full">
            <div
                class="w-full h-[100%] max-w-6xl lg:max-w-6xl mx-auto flex flex-col justify-center gap-5 items-center md:flex-row">
                <div class="w-full text-center lg:flex justify-start items-center gap-5 py-2">
                    <p class="text-white text-sm">+001 10 101 0010</p>
                    <p class="text-white text-sm">support@ecommercephp.com</p>
                </div>
                <div class="w-full text-center flex justify-center items-center gap-5 lg:justify-end">
                    <p class="text-white text-sm hover:cursor-pointer"><i class="fa-brands fa-facebook-f"></i></p>
                    <p class="text-white text-sm hover:cursor-pointer"><i class="fa-brands fa-twitter"></i></p>
                    <p class="text-white text-sm hover:cursor-pointer"><i class="fa-brands fa-youtube"></i></p>
                    <p class="text-white text-sm hover:cursor-pointer"><i class="fa-brands fa-instagram"></i></p>
                    <p class="text-white text-sm hover:cursor-pointer"><i class="fa-brands fa-whatsapp"></i></p>
                </div>
            </div>
        </div>

        {{-- Main nav --}}
        <div class="w-full py-2">
            <div class="w-full max-w-6xl mx-auto lg:flex justify-between items-center">
                <div class="w-[100%] flex justify-center lg:justify-start items-center"><img class=""
                        src="/Logo.png" alt="logo"></div>
                <div class="w-[100%]  flex flex-col justify-center  items-center gap-2 lg:flex-row">
                    <div class=" w-full">
                        <ul class="w-[100%] mx-auto flex justify-center items-center gap-5">
                            @guest
                                <li class="flex items-center justify-center gap-1  text-blue-400 font-medium"><i
                                        class="fa-solid fa-right-to-bracket"></i><a
                                        href="{{ route("login")}}">Login</a></li>
                                <li class="flex items-center justify-center gap-1  text-blue-400 font-medium"><i
                                        class="fa-solid fa-user-plus"></i><a
                                        href="{{ route("register")}}">Register</a></li>
                            @endguest
                            @auth
                                <li class="flex items-center justify-center gap-1  text-blue-400 font-medium text-sm"><i></i><a href="">Profile</a></li>
                                <li class="flex items-center justify-center gap-1  text-blue-400 font-medium text-sm"><i
                                    class="fa-solid fa-cart-shopping"></i><a href="">20$</a></li>
                                <form action="{{  route("logout")}}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-red-500 text-sm font-semibold flex items-center justify-center gap-2" title="Logout"><i class="fa-solid fa-power-off"></i>Logout</button>
                                </form>
                            @endauth
                        </ul>
                    </div>

                    {{-- Search components --}}
                    @include("components.search")

                </div>
            </div>
        </div>

        {{-- Categories and another link --}}
        <div class="w-full h-[30%] bg-slate-900 border-t-[1px] border-slate-700">
            <ul
                class="w-full max-w-6xl mx-auto h-[65px] text-white text-sm truncate flex justify-start items-center gap-8">
                <li class="hover:bg-amber-900 h-[100%] flex items-center"><a href="/">Home</a></li>
                <li class="hover:bg-amber-900 h-[100%] flex items-center"><a
                        href="">Men</a></li>
                <li class="hover:bg-amber-900 h-[100%] flex items-center"><a
                        href="">Women</a></li>
                <li class="hover:bg-amber-900 h-[100%] flex items-center"><a
                        href="">Kids</a></li>
                <li class="hover:bg-amber-900 h-[100%] flex items-center"><a
                        href="">Electronics</a></li>
                <li class="hover:bg-amber-900 h-[100%] flex items-center"><a
                        href="">Health and Household</a></li>
                <li class="hover:bg-amber-900 h-[100%] flex items-center"><a href="">About Us</a></li>
                <li class="hover:bg-amber-900 h-[100%] flex items-center"><a href="">Contact Us</a></li>
                <li class="hover:bg-amber-900 h-[100%] flex items-center"><a href="">FAQs</a></li>
            </ul>
        </div>

    </header>
    @yield('u-title')



    <section class="bg-slate-950 py-6">
        @yield('content')
    </section>

    <footer class="w-full bg-slate-900">
        <div class="w-full max-w-xl mx-auto  h-[250px] flex justify-center items-center flex-col gap-8 bg-slate-900">
            <h1 class="uppercase text-white text-2xl">Subscribe To Our Newsletter</h1>
            <form method="post" action="{{ route("subscribe") }}" class="w-[80%] md:w-full flex items-center justify-center gap-1">
                @csrf
                <input type="email" name="subscribe" placeholder="Enter your Email address"
                    class="w-full h-[48px] px-3 rounded-sm outline-none">
                @error('subscribe')
                    <span class="text-red-500 text-sm"> {{ $message }} </span>
                @enderror
                <button type="submit"
                    class="bg-slate-800 text-white text-sm h-[48px] px-4 rounded-sm">Subscribe</button>
            </form>
        </div>
        <div class="w-full h-[50px] bg-black flex items-center justify-center">
            <p class="text-slate-500 text-xs">Copyright © {{ date('Y') }} - Ecommerce Website LARAVEL - Developed By
                Isaia Mohamed</p>
        </div>
    </footer>
</body>

</html>
