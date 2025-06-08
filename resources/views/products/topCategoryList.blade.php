<div class="space-y-3">
    <p class="text-2xl text-white">Categories</p>
    @foreach ($categories as $category)
        {{-- <form action="{{ route("top-category", $category->slug) }}" method="post" class="bg-blue-500 rounded-lg py-2 px-3 w-[200px] cursor-pointer">
            <button type="submit" class="text-white"> {{ $category->top_category }} </button>
        </form> --}}
        <div class="flex flex-col gap-1">
            <a href="{{ route("top-category", $category->slug) }}" class="bg-slate-500 hover:bg-slate-600 text-slate-200 font-semibold py-2 px-4 truncate rounded-lg shadow-md transition duration-200">{{ $category->top_category }}</a>
        </div>
    @endforeach
</div>
