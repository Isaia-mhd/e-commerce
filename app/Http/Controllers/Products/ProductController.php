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

    public function getTopCategories($slug){

        // to get the topCategory id of this slug
        $cat = TopCategory::where("slug", $slug)->first();

        
        $products = Product::where("topCategory_id", $cat->id)->paginate(15);

        $categories = TopCategory::all();
        return view("products.top_category", compact( "categories", "products"));
    }
}
