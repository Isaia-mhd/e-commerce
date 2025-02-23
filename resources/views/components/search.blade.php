<form action="" method="POST" class="w-full flex justify-center items-center gap-5">
    @csrf
    <input type="search" name="search" value=""
    class="w-[200px] px-3 py-2 text-xs rounded-md border-2 focus:outline-none"
    placeholder="What are you looking for... ?">
    <button
        class="bg-blue-500 hover:bg-blue-600 transition duration-150 ease-in-out py-2 px-5 text-xs text-white rounded"
        type="submit">Search</button>
</form>
