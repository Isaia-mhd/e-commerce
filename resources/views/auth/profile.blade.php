@extends('layouts.Layout')

@section('title')
    Profile
@endsection
@section('content')
    @include("components.success")
    @include("components.error")
    <div class="min-h-screen text-gray-100 py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto bg-slate-900 p-6 rounded-2xl shadow-lg space-y-8">


            <div class="flex items-center space-x-4">
                <img class="w-20 h-20 rounded-full border-4 border-amber-400 shadow" src="https://img.freepik.com/vecteurs-premium/cercle-utilisateur-cercle-gradient-bleu_78370-4727.jpg?semt=ais_items_boosted&w=740"
                    alt="Photo de profil">
                <div>
                    <h2 class="text-2xl font-bold">{{ $user->name }}</h2>
                    <p class="text-gray-400">{{ $user->email }}</p>
                </div>
            </div>


            <form class="space-y-6" method="POST" action="{{ route("profile.update", $user->id) }}">
                @csrf
                @method("put")
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Name</label>
                    <input type="text" name="name"
                        class="w-full px-4 py-2 rounded-lg bg-slate-600 border border-gray-500 text-white focus:outline-none focus:ring-2 focus:ring-amber-400"
                        value="{{ $user->name }}">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Email address</label>
                    <input type="email" name="email"
                        class="w-full px-4 py-2 rounded-lg bg-slate-600 border border-gray-500 text-white focus:outline-none focus:ring-2 focus:ring-amber-400"
                        value="{{ $user->email }}">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Phone Number</label>
                    <input type="text" name="phone" value="{{ $user->phone }}"
                        class="w-full px-4 py-2 rounded-lg bg-slate-600 border border-gray-500 text-white focus:outline-none focus:ring-2 focus:ring-amber-400"
                        placeholder="">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Delivery Address</label>
                    <input rows="3" name="delivery_address" value="{{ $user->delivery_address }}"
                        class="w-full px-4 py-2 rounded-lg bg-slate-600 border border-gray-500 text-white focus:outline-none focus:ring-2 focus:ring-amber-400"
                        placeholder="Delivery address..."/>
                </div>


                <div class="text-right">
                    <button type="submit"
                        class="bg-amber-400 hover:bg-amber-500 text-slate-800 font-semibold py-2 px-6 rounded-xl transition duration-200 shadow">
                        Save
                    </button>
                </div>
            </form>


            <div class="mt-10 border-t border-slate-800 pt-6">
                <h3 class="text-xl font-semibold text-gray-100 mb-4">Change password</h3>

                <form class="space-y-6" action="{{ route("profile.update.password", $user->id) }}" method="POST">
                    @csrf
                    @method("put")
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Current Password</label>
                        <input type="password" name="current_password"
                            class="w-full px-4 py-2 rounded-lg bg-slate-600 border border-gray-500 text-white focus:outline-none focus:ring-2 focus:ring-amber-400"
                            placeholder="Current Password">
                            @error("current_password")
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">New Password</label>
                        <input type="password" name="new_password"
                            class="w-full px-4 py-2 rounded-lg bg-slate-600 border border-gray-500 text-white focus:outline-none focus:ring-2 focus:ring-amber-400"
                            placeholder="New password">
                            @error("new_password")
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Confirm</label>
                        <input type="password" name="new_password_confirmation"
                            class="w-full px-4 py-2 rounded-lg bg-slate-600 border border-gray-500 text-white focus:outline-none focus:ring-2 focus:ring-amber-400"
                            placeholder="Confirm password">
                    </div>

                    <div class="text-right">
                        <button type="submit"
                            class="bg-amber-400 hover:bg-amber-500 text-slate-800 font-semibold py-2 px-6 rounded-xl transition duration-200 shadow">
                            Update Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
