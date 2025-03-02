{{-- PRODUCT BOX --}}
<div class="w-full grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-8">
    @foreach ($products as $product)
        <div class="rounded-lg bg-green-100 py-4 px-2">
            {{-- prod image --}}
            <div class=""></div>

            {{-- prod details --}}
            <div class="text-center flex flex-col gap-2 justify-center items-center">
                <p class="text-black text-lg font-semibold"> {{ $product->name }} </p>

                <div class="h-[50px]">
                    <span class="text-black font-bold text-2xl">${{ $product->price }}</span>
                    <strike class="text-gray-600">${{ $product->old_price }}</strike>
                </div>

                <a href="{{ route("show", $product->id) }}" class="bg-blue-400 w-[100px] py-1 text-white font-semibold rounded-sm">Add to Cart</a>
            </div>
        </div>
    @endforeach

    {{-- Pagination LINK --}}
    {{-- <div class="w-full text-sm text-left ">
        {{ $products->links("pagination::tailwind") }}
    </div> --}}
</div>
