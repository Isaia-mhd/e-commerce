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
        $topCategory = TopCategory::where("slug", $slug)->first();


        $products = Product::where("top_category_id", 1)->paginate(15);

        $categories = TopCategory::orderBy("created_at", "ASC")->get();
        // dd($topCategory, $categories);

        return view("products.top_category", compact( "categories", "products", "topCategory"));
    }

    public function show($product){
        $product = Product::find($product);

        // related products by the same top and mid category
        $products = Product::where("top_category_id", $product->top_category_id)
                            ->where("mid_category_id", $product->mid_category_id)
                            ->paginate(6);

        return view("products.show", compact("product", "products"));
    }
    public function search()
    {

        $keyword = request()->search;
        $categories = TopCategory::all();

        $products = Product::where("name", "like", "%".$keyword."%")
        ->orWhere("description", "like", "%".$keyword."%")
        ->paginate(12);

        return view("products.searched", compact("categories", "products"));

    }
}
