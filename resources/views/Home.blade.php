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
        <section class="px-6 py-12">
            <h3 class="text-2xl font-bold mb-6">Featured Products</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
              <!-- Product Card -->
              <div class="bg-gray-800 rounded-lg p-4 shadow hover:shadow-blue-600 transition">
                <div class="h-48 bg-gray-700 mb-4 rounded"></div>
                <h4 class="text-lg font-semibold">Smart Watch</h4>
                <p class="text-blue-400">$99.99</p>
                <button class="mt-2 w-full bg-blue-600 hover:bg-blue-700 py-2 rounded">Add to Cart</button>
              </div>
              <div class="bg-gray-800 rounded-lg p-4 shadow hover:shadow-blue-600 transition">
                <div class="h-48 bg-gray-700 mb-4 rounded"></div>
                <h4 class="text-lg font-semibold">Wireless Headphones</h4>
                <p class="text-blue-400">$79.99</p>
                <button class="mt-2 w-full bg-blue-600 hover:bg-blue-700 py-2 rounded">Add to Cart</button>
              </div>
              <div class="bg-gray-800 rounded-lg p-4 shadow hover:shadow-blue-600 transition">
                <div class="h-48 bg-gray-700 mb-4 rounded"></div>
                <h4 class="text-lg font-semibold">Gaming Keyboard</h4>
                <p class="text-blue-400">$59.99</p>
                <button class="mt-2 w-full bg-blue-600 hover:bg-blue-700 py-2 rounded">Add to Cart</button>
              </div>
              <div class="bg-gray-800 rounded-lg p-4 shadow hover:shadow-blue-600 transition">
                <div class="h-48 bg-gray-700 mb-4 rounded"></div>
                <h4 class="text-lg font-semibold">VR Headset</h4>
                <p class="text-blue-400">$199.99</p>
                <button class="mt-2 w-full bg-blue-600 hover:bg-blue-700 py-2 rounded">Add to Cart</button>
              </div>
            </div>
        </section>
    </div>
@endsection
