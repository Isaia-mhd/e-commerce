@extends('layouts.Layout')

@section("title")
    Login
@endsection

@section('content')

    {{-- Little Title --}}
    <h1 class="text-center text-2xl font-semibold text-white">Login</h1>

    {{-- Field --}}
    <form action="{{route("login")}}" method="post" class="w-full mt-6 py-7 rounded-lg shadow-md max-w-[90%] sm:max-w-[70%] md:max-w-[40%] lg:max-w-[30%] mx-auto">
        @csrf

        {{-- Email --}}
        <div class="w-full flex flex-col gap-1 mb-3">
            <label for="email" class="text-sm text-white font-semibold">Email</label>
            <input class="ww-full bg-slate-900 text-white rounded py-2 px-2 outline-none " type="email" name="email" id="email" placeholder="E-mail">
            @error("email")
                <span class="text-red-500 text-sm"> {{ $message }} </span>
            @enderror
        </div>

        {{-- Password --}}
        <div class="w-full flex flex-col gap-1 mb-3">
            <label for="password" class="text-sm text-white font-semibold">Password</label>
            <input class="w-full bg-slate-900 text-white rounded py-2 px-2 outline-none" type="password" name="password" id="password" placeholder="Password">
            @error("password")
                <span class="text-red-500 text-sm"> {{ $message }} </span>
            @enderror
        </div>

        {{-- LOgin Button --}}
        <div class="w-full mb-2">
            <button class="transition duration-150 ease-in-out py-2 px-7 rounded-md text-sm  text-white uppercase bg-gradient-to-r from-indigo-800 to-emerald-600 hover:from-indigo-900 hover:to-emerald-700" type="submit">Login</button>
        </div>

        {{-- Link Register/forgot PW --}}
        <div class="w-full flex items-center justify-between mb-2">
            <a href="{{route('register')}}" class="text-sm text-white">Don-t have an account ? <span class="text-blue-500 hover:text-blue-600 transition duration-150 ease-in-out">Register</span></a>
            <a href="" class="text-sm text-blue-500 hover:text-blue-600 transition duration-150 ease-in-out ">Forgot password ?</a>

        </div>

        {{-- Google Oauth --}}
        @include("auth.google_oauth")
        @include("components.error")
    </form>

@endsection
