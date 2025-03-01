<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\TopCategory;

class ProductController extends Controller
{
    public function index(){
        $categories = TopCategory::all();
        $products = Product::paginate();
        return view("products.all_products", compact("categories", "products"));
    }
}
