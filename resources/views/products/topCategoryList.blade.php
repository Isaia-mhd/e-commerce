<div class="space-y-3">
    <p class="text-2xl text-white">Categories</p>
    @foreach ($categories as $category)
        <form action="{{ route("top-category", $category->slug) }}" method="get" class="bg-blue-500 rounded-lg py-2 px-3 w-[200px] cursor-pointer">
            <button type="submit" class="text-white"> {{ $category->top_category }} </button>
        </form>
    @endforeach
</div>
