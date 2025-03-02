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


        $products = Product::where("top_category_id", $cat->id)->paginate(15);

        $categories = TopCategory::all();
        return view("products.top_category", compact( "categories", "products"));
    }

    public function show($product){
        $product = Product::find($product);

        // related products by the same top and mid category
        $products = Product::where("top_category_id", $product->top_category_id)
                            ->where("mid_category_id", $product->mid_category_id)
                            ->paginate(6);

        return view("products.show", compact("product", "products"));
    }
}
