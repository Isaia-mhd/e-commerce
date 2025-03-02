@extends("layouts.Layout")
@section("title")
{{ Str::title($product->name) }} 
@endsection
@section("u-title")
    Category : <p class="text-white">{{ $product->endCategories->end_category }}</p>
@endsection
@section("content")

    {{-- path link at the top --}}
    <div class="">
        <p class="text-blue-700">
            <a href="{{route("shop") }}">Shopping</a> > 
            <a href=""> {{ $product->topCategories->top_category }} </a> >
            <a href="">{{ $product->midCategories->mid_category }}</a> >
            <a href="">{{ $product->endCategories->end_category }}</a> >
            <a href="">{{ $product->name }}</a>
        </p>
    </div>
@endsection
