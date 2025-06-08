@extends("layouts.Layout")
@section("title")
{{ Str::title($product->name) }}
@endsection
@section("u-title")
Category : <p class="text-green-500"> {{ $product->endCategories->end_category }}</p>
@endsection
@section("content")
    @include("components.success")
    {{-- path link at the top --}}
    <div class="w-full max-w-[85%] mx-auto">
        <p class="text-blue-400">
            <a href="{{route("shop") }}">Shopping</a> <span class="text-white">></span>
            <a href="{{ route("top-category", $product->topCategories->slug) }}"> {{ $product->topCategories->top_category }} </a> <span class="text-white">></span>
            <a href="{{ route("mid-category", [$product->topCategories->slug, Str::lower($product->midCategories->mid_category)] ) }}">{{ $product->midCategories->mid_category }}</a> <span class="text-white">></span>
            <a href="{{ route("end-category", [$product->topCategories->slug, Str::lower($product->midCategories->mid_category), Str::lower($product->endCategories->end_category)] ) }}">{{ $product->endCategories->end_category }}</a> <span class="text-white">></span>
            <a href="">{{ Str::title($product->name) }}</a>
        </p>

        {{-- prod details --}}
        <form method="post" action="{{ route("basket.new", $product->id) }}" class="w-full md:flex xs:flex-col xs:justify-center items-center py-4">
            @csrf
            {{-- image --}}
            <div class="w-full flex justify-center items-center rounded-md mb-6"><img src="{{ asset('storage/' . $product->image) }}" alt="image" class="w-[60%] md:w-[50%] rounded-lg"></div>
            <div class="w-full px-4 space-y-8 flex flex-col justify-center items-start">
                {{-- title --}}
                <p class="capitalize text-2xl text-blue-400 font-bold "> {{ $product->name }} </p>

                {{-- size --}}
                <div class="w-full flex flex-col gap-1">
                    <label for="size" class="text-gray-300 font-bold">Select Size</label>
                    <select name="size" id="size" class="w-full lg:w-[50%] bg-slate-800 text-white">
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>
                {{-- color --}}
                <div class="w-full flex flex-col gap-1">
                    <label for="color" class="text-gray-300 font-bold">Select Color</label>
                    <select name="color" id="color" class="w-full lg:w-[50%] bg-slate-800 text-white">
                        <option value="Blue">Blue</option>
                        <option value="Black">Black</option>
                    </select>
                </div>
                {{-- price --}}
                <div class="w-full">
                    <p class="text-gray-300 font-bold">Product Price</p>
                    <p class="text-2xl font-semibold text-green-600"> <strike class="text-gray-400">${{ $product->old_price }}</strike> ${{ $product->price }}</p>
                </div>
                {{-- Quantity --}}
                <div class="w-full flex flex-col gap-1">
                    <label for="quant" class="text-gray-300 font-bold">Quantity</label>
                    <input type="number" name="quantity" min="1" id="quant" class="w-full lg:w-[50%] bg-slate-800 text-white">
                    @error("quantity")
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>


                <button type="submit" class="bg-amber-400 hover:bg-amber-500 text-slate-800 font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200">
                    Add to Cart
                </button>

            </div>
        </form>


        {{-- DESCRIPTION OF PRODUCT --}}
        <div class="">
            <p class="text-amber-400 text-xl">Product Description</p>
            <p class="text-gray-400">{{ $product->description }}</p>
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
