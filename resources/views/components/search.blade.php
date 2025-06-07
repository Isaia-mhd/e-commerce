<form action="{{ route("search") }}" method="POST" class="w-full flex justify-between md:justify-center lg:justify-end items-center gap-2">
    @csrf
    <input type="search" name="search" value="{{ request()->get('search') }}"
    class="w-full md:w-[50%] px-3 py-2 text-xs rounded-md border-2 focus:outline-none"
    placeholder="What are you looking for... ?">
    <button
        class="bg-blue-500 hover:bg-blue-600 transition duration-150 ease-in-out py-2 px-5 text-xs text-white rounded"
        type="submit">Search</button>
</form>
