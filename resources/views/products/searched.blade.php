@extends('layouts.Layout')

@section('title')
    Shopping
@endsection
@section('u-title')
    Results of : <p class="text-green-500"> {{ request("search") }}</p>
@endsection
@section('content')
    @include("components.success")
    <div class="w-full max-w-[85%] mx-auto flex flex-col md:flex-row justify-start gap-8">
        {{-- LIST OF TOP Categories --}}
       @include("products.topCategoryList")


        {{-- PRODUCT --}}
        <div class="space-y-3">
            {{-- U TITLE --}}
            {{-- <p class="text-2xl text-white"></p> --}}
            {{-- ALL PRODUCTS BOX --}}
            @include("products.productBox")
            @if (count($products) == 0)
                <div class="w-full h-full  flex justify-center items-center">
                    <p class="text-lg text-amber-400">No results founds</p>

                </div>
            @endif
        </div>
    </div>
@endsection
