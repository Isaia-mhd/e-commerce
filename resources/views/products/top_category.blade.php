@extends('layouts.Layout')

@section('title')
    Shopping
@endsection
@section('u-title')
    Category: 
@endsection
@section('content')
    <div class="w-full max-w-[85%] mx-auto flex flex-col md:flex-row justify-start gap-8">
        {{-- LIST OF TOP Categories --}}
        @include("products.topCategoryList")

        {{-- PRODUCT --}}
        <div class="space-y-3">
            {{-- U TITLE --}}
            <p class="text-2xl text-white">All products</p>
            {{-- ALL PRODUCTS BOX --}}
            <div class="w-full grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-8">
                @foreach ($products as $product)
                    <div class="rounded-lg bg-green-100 py-4 px-2">
                        {{-- prod image --}}
                        <div class=""></div>

                        {{-- prod details --}}
                        <div class="text-center flex flex-col gap-2 justify-center">
                            <p class="text-black text-lg font-semibold"> {{ $product->name }} </p>

                            <div class="h-[50px]">
                                <span class="text-black font-bold text-2xl">${{ $product->price }}</span>
                                <strike class="text-gray-600">${{ $product->old_price }}</strike>
                            </div>
                            <a href="" class="bg-amber-400 py-2 text-white font-semibold rounded-sm">Add to Cart</a>
                        </div>
                    </div>
                @endforeach

                {{-- Pagination LINK --}}
                {{-- <div class="w-full text-sm text-left ">
                    {{ $products->links("pagination::tailwind") }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection
