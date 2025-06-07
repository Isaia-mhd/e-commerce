@extends('layouts.Layout')
@section('title')
    Home
@endsection

{{-- @section("u-title")
    Home
@endsection --}}
@section('content')
    <div class="">
        @include('components.success')

        {{-- Hero --}}
        <section class="w-full text-center py-20 px-4">
            <h2 class="text-4xl text-white font-extrabold mb-4">Discover the Future of Shopping</h2>
            <p class="text-gray-400 max-w-xl mx-auto mb-6">Browse through our exclusive collection of gadgets, fashion, and more — all in one place.</p>
            <a href="{{ route("shop") }}" class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded text-white text-lg">Shop Now</a>
        </section>

        {{-- Features --}}
        <section class="px-6 py-12 w-full max-w-[90%] lg:max-w-[80%] mx-auto">
            <h3 class="text-2xl text-white font-bold mb-6">Featured Products</h3>
            @include("products.productBox")

            {{-- Pagination LINK --}}
            @include('components.paginationLinks')
        </section>
    </div>
@endsection
