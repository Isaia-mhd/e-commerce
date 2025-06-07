<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\TopCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index(Request $request){

        $categories = Cache::remember("tops-cat", 20, fn() => TopCategory::all());

        $page = $request->get("page", 1);
        $products = Cache::remember("products-page-$page", 20, fn() => Product::where("active", true)->paginate(12));

        return view("products.all_products", compact("categories", "products"));
    }

    public function getTopCategories($slug){

        // to get the topCategory id of this slug
        $topCategory = TopCategory::where("slug", $slug)->first();

        $page = request()->get('page', 1);
        $products = Cache::remember("products-page-$page", 20,fn() => Product::where("top_category_id", $topCategory->id)->paginate(15));

        $categories = Cache::remember("topCategories", 20, fn() => TopCategory::oldest()->get());

        return view("products.top_category", compact( "categories", "products", "topCategory"));
    }

    public function show($product){
        $product = Product::find($product);

        // related products by the same top and mid category
        $relatedProds = Product::where("top_category_id", $product->top_category_id)
                            ->where("mid_category_id", $product->mid_category_id)
                            ->where("id", "!=", $product->id)
                            ->paginate(6);

        return view("products.show", [
            "product" => $product,
            "products" => $relatedProds
        ]);
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
