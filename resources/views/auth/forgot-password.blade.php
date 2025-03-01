{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.Layout')
@section("title")
    Forgot Password
@endsection
@section('content')

    {{-- Little Title --}}
    <h1 class="text-center text-2xl font-semibold text-white">Forgot Password</h1>

    {{-- Field --}}
    <form action="{{ route('password.email') }}" method="post" class="w-full mt-6 py-7 rounded-lg shadow-md max-w-[80%] sm:max-w-[70%] md:max-w-[50%] lg:max-w-[40%] xl:max-w-[30%] mx-auto flex flex-col gap-5 items-center justify-center">
        @csrf
        <div class="text-sm text-white max-w-[90%]">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
        {{-- Email --}}
        <div class="flex flex-col gap-1 w-full max-w-[90%]">
            <label for="email" class="text-sm text-white font-semibold">Email</label>
            <input class="bg-slate-900 text-white rounded py-2 px-2 outline-2 focus:outline focus:outline-blue-400" type="email" name="email" id="email" placeholder="E-mail">
            @error("email")
                <span class="text-red-500 text-sm"> {{ $message }} </span>
            @enderror
        </div>

        {{-- LOgin Button --}}
        <div class="w-full max-w-[90%] mx-auto">
            <button class="transition duration-150 ease-in-out py-2 px-7 rounded-md text-sm  text-white uppercase bg-gradient-to-r from-indigo-800 to-emerald-600 hover:from-indigo-900 hover:to-emerald-700" type="submit">Email Password Reset Link</button>
        </div>

        {{-- Link Register/forgot PW --}}
        <div class="flex items-center justify-between w-full max-w-[90%] mx-auto">
            <a href="{{route('register')}}" class="text-sm text-white">Don-t have an account ? <span class="text-blue-500 hover:text-blue-600 transition duration-150 ease-in-out">Register</span></a>
            <a href="{{route('login')}}" class="text-sm text-blue-500 hover:text-blue-600 transition duration-150 ease-in-out ">Login</a>

        </div>

        @include("components.error")
    </form>

@endsection

