@extends("layouts.Layout")
@section("title")
{{ Str::title($product->name) }}
@endsection
@section("u-title")
    Category : <p class="text-white">{{ $product->endCategories->end_category }}</p>
@endsection
@section("content")
    @include("components.success")
    {{-- path link at the top --}}
    <div class="w-full max-w-[85%] mx-auto">
        <p class="text-blue-400">
            <a href="{{route("shop") }}">Shopping</a> >
            <a href=""> {{ $product->topCategories->top_category }} </a> >
            <a href="">{{ $product->midCategories->mid_category }}</a> >
            <a href="">{{ $product->endCategories->end_category }}</a> >
            <a href="">{{ Str::title($product->name) }}</a>
        </p>

        {{-- prod details --}}
        <form method="post" action="" class="w-full  flex py-4">
            {{-- image --}}
            <div class="w-[50%]"><img src="" alt="image"></div>
            <div class="w-[50%] px-4 space-y-8">
                {{-- title --}}
                <p class="capitalize text-2xl text-blue-400 font-bold "> {{ $product->name }} </p>
                {{-- slug --}}
                <p class="truncate text-sm text-white"> {{ $product->description }} </p>
                {{-- size --}}
                <div class="flex flex-col gap-1">
                    <label for="size" class="text-gray-300 font-bold">Select Size</label>
                    <select name="size" id="size" class="w-20 bg-slate-800 text-white">
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>
                {{-- color --}}
                <div class="flex flex-col gap-1">
                    <label for="color" class="text-gray-300 font-bold">Select Color</label>
                    <select name="color" id="color" class="w-28 bg-slate-800 text-white">
                        <option value="Blue">Blue</option>
                        <option value="Black">Black</option>
                    </select>
                </div>
                {{-- price --}}
                <div class="">
                    <p class="text-gray-300 font-bold">Product Price</p>
                    <p class="text-2xl font-semibold text-green-600"> <strike class="text-gray-400">${{ $product->old_price }}</strike> ${{ $product->price }}</p>
                </div>
                {{-- Quantity --}}
                <div class="flex flex-col gap-1">
                    <label for="quant" class="text-gray-300 font-bold">Quantity</label>
                    <input type="number" name="quantity" min="1" id="quant" class="w-20 bg-slate-800 text-white">
                </div>
                {{-- Button add to cart --}}
                <button type="submit" class="bg-blue-500 rounded-sm text-white px-3 font-semibold py-1">Add To Cart</button>

            </div>
        </form>
        {{-- DESCRIPTION OF PRODUCT --}}
        <div class="">
            <p class="text-gray-300 text-xl">Product Description</p>
            <p class="text-white">{{ $product->description }}</p>
        </div>

        {{-- RELATED PRODUCTS --}}
        <div class="w-full mt-6 ">
            <p class="text-center text-white text-2xl">Related Products</p>
            <p class="text-center text-white text-sm mb-6">See all the related products from below</p>

            {{-- products box for related --}}
            @include("products.productBox")
        </div>

    </div>
@endsection
