@extends('layouts.Layout')

@section('title')
    {{ $endCategory->end_category }}
@endsection
@section('u-title')
    Category: {{ $endCategory->end_category }}
@endsection
@section('content')
    @include("components.success")
    <div class="w-full max-w-[85%] mx-auto flex flex-col md:flex-row justify-start gap-8">
        {{-- LIST OF TOP Categories --}}
        @include("products.topCategoryList")

        {{-- PRODUCT --}}
        <div class="space-y-3">
            {{-- U TITLE --}}
            <p class="text-2xl text-white">All products</p>
            {{-- ALL PRODUCTS BOX --}}
            @include("products.productBox")
        </div>
    </div>
@endsection
