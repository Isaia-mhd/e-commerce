@extends('layouts.Layout')

@section('title')
    Register
@endsection
@section('content')
    {{-- Little Title --}}
    <h1 class="text-center text-2xl font-semibold text-white">Register</h1>

    {{-- Field --}}
    <form action="{{ route('register') }}" method="post"
        class="w-full mt-6 py-7 rounded-lg shadow-md max-w-[90%]  lg:max-w-[70%] mx-auto">
        @csrf

        {{-- NAME AND COMPAGNY --}}
        <div class="w-full flex flex-col md:flex-row justify-between items-center gap-4 mb-4">
            {{-- Name --}}
            <div class="w-full flex flex-col gap-1 ">
                <label for="name" class="text-sm text-white font-semibold">Name</label>
                <input class="w-full bg-slate-900 text-white rounded py-2 px-2 outline-none" type="text" name="name"
                    id="name" placeholder="Name">
                @error('name')
                    <span class="text-red-500 text-sm"> {{ $message }} </span>
                @enderror
            </div>

            {{-- Company --}}
            <div class="w-full flex flex-col gap-1">
                <label for="comp" class="text-sm text-white font-semibold">Compagny</label>
                <input class="w-full bg-slate-900 text-white rounded py-2 px-2 outline-none" type="text" name="compagny"
                    id="comp" placeholder="Compagny">
                @error('compagny')
                    <span class="text-red-500 text-sm"> {{ $message }} </span>
                @enderror
            </div>
        </div>


        {{-- MAIL AND PHONE --}}
        <div class="w-full flex flex-col md:flex-row justify-between items-center gap-4 mb-4">
            {{-- Email --}}
            <div class="w-full flex flex-col gap-1">
                <label for="email" class="text-sm text-white font-semibold">Email</label>
                <input class="w-full bg-slate-900 text-white rounded py-2 px-2 outline-none" type="email" name="email"
                    id="email" placeholder="E-mail">
                @error('email')
                    <span class="text-red-500 text-sm"> {{ $message }} </span>
                @enderror
            </div>

            {{-- Phone --}}
            <div class="w-full flex flex-col gap-1">
                <label for="phone" class="text-sm text-white font-semibold">Phone number</label>
                <input class="w-full bg-slate-900 text-white rounded py-2 px-2 outline-none" type="text" name="phone"
                    id="phone" placeholder="Phone number">
                @error('phone')
                    <span class="text-red-500 text-sm"> {{ $message }} </span>
                @enderror
            </div>
        </div>


        {{-- ADDRESS --}}
        <div class="w-full flex flex-col md:flex-row justify-between items-center gap-4 mb-4">
            {{-- address --}}
            <div class="w-full flex flex-col gap-1 ">
                <label for="address" class="text-sm text-white font-semibold">Address</label>
                <textarea class="w-full bg-slate-900 text-white rounded py-2 px-2 outline-none" type="text" name="address"
                    id="address" placeholder="Address"></textarea>
                @error('address')
                    <span class="text-red-500 text-sm"> {{ $message }} </span>
                @enderror
            </div>
        </div>


        {{-- COUNTRY AND CITY --}}
        <div class="w-full flex flex-col md:flex-row justify-between items-center gap-4 mb-4 ">
            {{-- country --}}
            <div class="w-full flex flex-col gap-1">
                <label for="country" class="text-sm text-white font-semibold">Country</label>

                <select name="country" id="country" class="w-full bg-slate-900 text-white rounded py-2 px-2 outline-none">
                    <option value="Select country">Select country</option>
                    @foreach ($countries as $country )
                        <option value="{{ $country->country }}" > {{ $country->country }} </option>
                    @endforeach

                </select>
                @error('country')
                    <span class="text-red-500 text-sm"> {{ $message }} </span>
                @enderror
            </div>

            {{-- city --}}
            <div class="w-full flex flex-col gap-1">
                <label for="city" class="text-sm text-white font-semibold">City</label>
                <input class="w-full bg-slate-900 text-white rounded py-2 px-2 outline-none" type="text" name="city"
                    id="city" placeholder="City">
                @error('city')
                    <span class="text-red-500 text-sm"> {{ $message }} </span>
                @enderror
            </div>
        </div>

        {{-- STATE AND ZIPCODE --}}
        <div class="w-full flex flex-col md:flex-row justify-between items-center gap-4 mb-">
            {{-- state --}}
            <div class="w-full flex flex-col gap-1">
                <label for="state" class="text-sm text-white font-semibold">State</label>
                <input class="w-full bg-slate-900 text-white rounded py-2 px-2 outline-none" type="text" name="region"
                    id="state" placeholder="State">
                @error('region')
                    <span class="text-red-500 text-sm"> {{ $message }} </span>
                @enderror
            </div>

            {{-- postal code --}}
            <div class="w-full flex flex-col gap-1">
                <label for="zipCode" class="text-sm text-white font-semibold">Postal Code</label>
                <input class="w-full bg-slate-900 text-white rounded py-2 px-2 outline-none" type="text" name="postal_code"
                    id="zipCode" placeholder="Zip Code">
                @error('postal_code')
                    <span class="text-red-500 text-sm"> {{ $message }} </span>
                @enderror
            </div>
        </div>

        {{-- PASSWORD AND CONFIRM --}}
        <div class="w-full flex flex-col md:flex-row justify-between items-center gap-4 mb-4">
            {{-- Password --}}
            <div class="w-full flex flex-col gap-1">
                <label for="password" class="text-sm text-white font-semibold">Password</label>
                <input class="w-full bg-slate-900 text-white rounded py-2 px-2 outline-none" type="password" name="password"
                    id="password" placeholder="Password">
                @error('password')
                    <span class="text-red-500 text-sm"> {{ $message }} </span>
                @enderror
            </div>

            {{-- Confirm PW --}}
            <div class="w-full flex flex-col gap-1">
                <label for="password_confirm" class="text-sm text-white font-semibold">Confirm Password</label>
                <input class="w-full bg-slate-900 text-white rounded py-2 px-2 outline-none" type="password"
                    name="password_confirmation" id="password_confirm" placeholder="Password">
            </div>
        </div>



        {{-- Register Button --}}
        <div class="w-full mb-4">
            <button
                class="bg-indigo-800 hover:bg-indigo-900 transition duration-150 ease-in-out py-2 px-7 rounded-md text-sm  text-white uppercase"
                type="submit">Register</button>
        </div>


        {{-- Link Login/Forgot Pw --}}
        <div class="flex items-center justify-between w-full">
            <a href="{{ route('login') }}" class="text-sm text-white">Have an account ? <span
                    class="text-blue-500 hover:text-blue-600 transition duration-150 ease-in-out">Login</span></a>
            <a href="" class="text-sm text-blue-500 hover:text-blue-600 transition duration-150 ease-in-out">Forgot
                password ?</a>

        </div>

        @include('auth.google_oauth')
    </form>
@endsection
