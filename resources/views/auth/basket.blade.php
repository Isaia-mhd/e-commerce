@extends('layouts.Layout')

@section("title")
    Basket
@endsection

@section('content')
<div class="w-full max-w-[90%] lg:max-w-[80%] mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-200">Basket</h1>
    @include("components.success")
    <div class="overflow-x-auto bg-slate-950 shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-slate-800 rounded-lg">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase">Id</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase">Product</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase">Unit Price ($)</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase">Total Price ($)</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase">Quantity</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase">Payment</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase">Delete</th>
                </tr>
            </thead>
            <tbody class="bg-slate-800 divide-y ">
                @foreach ($baskets as $basket)
                    <tr class="hover:bg-slate-900 transition ease-in-out duration-700 cursor-pointer">
                        <td class="px-6 py-4 whitespace-nowrap text-lg text-gray-200">{{ $basket->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-lg text-gray-200"><img src="{{ asset("storage/" . $basket->product->image) }}" alt="image" class="w-[50px] rounded-md"></td>
                        <td class="px-6 py-4 whitespace-nowrap text-lg text-gray-200"><a href="{{ route("show", $basket->product->id) }}" class="underline text-amber-400">{{ $basket->product->name }}</a></td>
                        <td class="px-6 py-4 whitespace-nowrap text-lg text-gray-200">{{ number_format($basket->product->price, 2) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-lg text-gray-200">{{ number_format($basket->amount, 2) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-lg text-gray-200">{{ $basket->quantity }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-lg">
                            @if(!$basket->isPaid)
                                <span class="px-2 inline-flex text-2xl leading-5 font-semibold rounded-full  text-red-800">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                </span>
                            @else
                                <span class="px-2 inline-flex text-2xl leading-5 font-semibold rounded-full text-green-600">
                                    <i class="fa-solid fa-circle-check"></i>
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            @if($basket->isPaid)
                                <button type="button" disabled class="bg-gray-500 cursor-not-allowed transition ease-in-out duration-200 py-1 px-2 rounded-full text-gray-300 font-semibold text-lg">Check out ${{ $basket->amount }}</button>

                            @else
                                <form action="" method="post">
                                    @csrf
                                    <button type="submit" class="bg-amber-600 hover:bg-amber-700 transition ease-in-out duration-200 py-1 px-2 rounded-full text-white font-semibold text-lg">Check out ${{ $basket->amount }}</button>
                                </form>
                            @endif
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            <form action="{{ route("basket.delete", $basket->id) }}" method="post">
                                @csrf
                                @method("delete")
                                <button type="submit" class="bg-red-700 hover:bg-red-800 transition ease-in-out duration-200 py-1 px-2 rounded-full text-white font-semibold">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if(count($baskets) == 0)
        <div class="w-full mt-6">
            <p class="text-gray-300 text-center text-lg font-semibold">You have no basket yet</p>
        </div>
        @endif
    </div>
    <div class="w-full flex justify-end items-center mb-2 gap-4 mt-2">
        <a href="{{ route("shop") }}" class="bg-slate-800 border-gray-500 text-white font-semibold text-sm py-4 px-8 rounded-xs hover:bg-amber-600 transition ease-in-out duration-200">Checkout all basket</a>

        <a href="{{ route("shop") }}" class="bg-slate-800 border-gray-500 text-white font-semibold text-sm py-4 px-8 rounded-xs hover:bg-amber-600 transition ease-in-out duration-200">Go to Shopipng</a>

    </div>
</div>
@endsection
