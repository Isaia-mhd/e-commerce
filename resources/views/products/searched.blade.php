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
        <div class="space-y-3 w-full">
            {{-- U TITLE --}}
            <p class="text-2xl text-white">The results of {{ request()->get('search') }}</p>
            {{-- ALL PRODUCTS BOX --}}
            @include("products.productBox")

            {{-- Pagination LINK --}}
            @include('components.paginationLinks')
            
            @if (count($products) == 0)
                <div class="w-full h-full  flex justify-center items-center">
                    <p class="text-lg text-amber-400">No results founds</p>

                </div>
            @endif
        </div>
    </div>
@endsection
