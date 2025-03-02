@extends("layouts.Layout")
@section("title")
    Prouct name
@endsection
@section("u-title")
    Prod name
@endsection
@section("content")
    <p class="text-blue-700">
        <a href="{{route("shop") }}">Shopping</a> > 
        <a href=""> {{ $product->topCategories->top_category }} </a>
        <a href=""></a>
        <a href=""></a>
    </p>
    <h2 class="text-red-500"> Titre: {{ $product->name }} </h2>
@endsection
