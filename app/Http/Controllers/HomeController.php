<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $page = request()->get("page", 1);

        $featuresProd = Cache::remember('featuresProd-page-$page', 20, fn() => Product::where('active', false)->paginate(12));
        return view('Home', ["products" => $featuresProd]);
    }
}
