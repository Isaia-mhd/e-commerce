@extends('layouts.Layout')

@section('title')
    {{ $endCategory->end_category }}
@endsection
@section('u-title')
    {{ $endCategory->end_category }}
@endsection
@section('content')
    @include("components.success")
    <div class="w-full max-w-[85%] mx-auto flex flex-col md:flex-row justify-start gap-8">
        {{-- LIST OF TOP Categories --}}
        @include("products.topCategoryList")

        {{-- PRODUCT --}}
        <div class="space-y-3 w-full">
            {{-- U TITLE --}}
            <p class="text-2xl text-white">{{ $endCategory->end_category }} products</p>
            {{-- ALL PRODUCTS BOX --}}
            @include("products.productBox")

            {{-- Pagination LINK --}}
            @include('components.paginationLinks')

        </div>
    </div>
@endsection
