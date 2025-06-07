<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $baskets = $user->baskets()->get();

        return view("auth.basket", compact("baskets"));
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            "quantity" => "required|integer"
        ]);

        if(!$product)
        {
            return redirect()->back()->with("error", "Product does not exist.");
        }

        Basket::create([
            "user_id" => auth()->id(),
            "product_id" => $product->id,
            "quantity" => $request->quantity,
            "amount" => $product->price * $request->quantity,
        ]);

        return redirect()->route("basket.list")->with("success", "New basket added");

    }

    public function destroy(Basket $basket)
    {
        if(!$basket)
        {
            return redirect()->back()->with("error", "Basket does not exist.");
        }

        $basket->delete();

        return redirect()->back()->with("success", "Basket deleted");

    }
}
