{{-- PRODUCT BOX --}}
<div class="w-full grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
    @foreach ($products as $product)
        <div class="rounded-lg bg-slate-800  py-4 px-2 flex flex-col">
            {{-- prod image --}}
            <div class="w-full rounded-md"><img src="{{ asset("storage/" . $product->image) }}" alt="image" class="w-full rounded-md"></div>

            {{-- prod details --}}
            <div class="w-full text-center flex flex-col gap-2 justify-center items-center mt-3">
                <p class="text-white text-lg font-semibold"> {{ $product->name }} </p>

                <div class="h-[50px]">
                    <span class="text-blue-300 font-bold text-2xl">${{ $product->price }}</span>
                    <strike class="text-amber-400">${{ $product->old_price }}</strike>
                </div>

                <a href="{{ route("show", $product->id) }}" class="bg-blue-500 w-[200px] rounded-full py-1 text-white font-semibold">Add to Cart</a>
            </div>
        </div>
    @endforeach

    {{-- Pagination LINK --}}
    <div class="w-full text-sm flex justify-between text-left">
        {{ $products->links("pagination::tailwind") }}
    </div>
</div>

