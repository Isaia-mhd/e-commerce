<form action="{{ route("search") }}" method="POST" class="w-full flex justify-between md:justify-center lg:justify-end items-center gap-2">
    @csrf
    <input type="search" name="search" value="{{ request()->get('search') }}"
    class="w-full md:w-[50%] px-3 py-2 text-xs rounded-md border-2 border-amber-500 outline-none focus:outline-none"
    placeholder="What are you looking for... ?">

    <button type="submit" class="bg-amber-400 hover:bg-amber-500 text-slate-800 font-semibold py-2 px-5 text-xs  rounded shadow-md transition duration-200">
        Search
    </button>
</form>
