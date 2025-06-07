<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\EndCategory;
use App\Models\MidCategory;
use App\Models\Product;
use App\Models\TopCategory;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    // GETTING THE PRODUCTS FILTERED BY MID CATEGORY
    public function getMidCategories($slug, $midCategory){
        // to get the midCategory id of this mid category
        $midCategory = MidCategory::where("mid_category", Str::title($midCategory))->first();
        $products = Product::where("mid_category_id", $midCategory->id)->paginate(15);

        // top categories for the listBOx
        $categories = TopCategory::all();
        return view("products.mid_category", compact("products", "categories", "midCategory" ));
    }


    // GETTING THE PRODUCTS FILTERED BY END CATEGORY
    public function getEndCategories($slug, $midCategory, $endCategory){
        // to get the midCategory id of this end category
        $endCategory = EndCategory::where("end_category", Str::title($endCategory))->first();
        $products = Product::where("end_category_id", $endCategory->id)->paginate(15);

        // top categories for the listBOx
        $categories = TopCategory::all();
        return view("products.end_category", compact("products", "categories", "endCategory" ));
    }
}
