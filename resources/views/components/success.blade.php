@if (session()->has("success"))
    <div id="success" class="w-[30%] mx-auto bg-slate-800 border-2 border-green-900 rounded-md px-2 py-2 flex justify-between items-center mt-4">
        <p class="text-green-200 font-semibold"> {{ session("success") }} </p>
        <button onclick="document.getElementById('success').style.display='none'"
                class="text-green-400 hover:text-red-500 font-bold ml-4 text-4xl">
            &times;
        </button>
    </div>
@endif
