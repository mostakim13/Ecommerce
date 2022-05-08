<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //index page
    public function index()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(5)->get();
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->get();
        $features = Product::where('featured', 1)->where('status', 1)->orderBy('id', 'DESC')->get();
        $hot_deals = Product::where('hot_deals', 1)->where('status', 1)->orderBy('id', 'DESC')->get();
        $special_offers = Product::where('special_offer', 1)->where('status', 1)->orderBy('id', 'DESC')->get();
        $special_deals = Product::where('special_deals', 1)->where('status', 1)->orderBy('id', 'DESC')->get();
        return view('frontend.index', compact('categories', 'sliders', 'products', 'features', 'hot_deals', 'special_offers', 'special_deals'));
    }

    public function singleProduct($id, $slug)
    {
        $product = Product::findOrFail($id);
        $multiImgs = MultiImg::where('product_id', $id)->get();
        return view('frontend.productDetails', compact('product', 'multiImgs'));
    }
}