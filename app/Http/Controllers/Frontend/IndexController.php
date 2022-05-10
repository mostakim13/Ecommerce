<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
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
        $special_offers = Product::where('special_offer', 1)->where('status', 1)->orderBy('id', 'DESC')->get();
        $special_deals = Product::where('special_deals', 1)->where('status', 1)->orderBy('id', 'DESC')->get();
        $skip_category_0 = Category::skip(0)->first();
        $skip_category_1 = Category::skip(1)->first();
        $skip_category_2 = Category::skip(2)->first();

        $skip_brand_0 = Brand::skip(0)->first();
        $skip_brand_1 = Brand::skip(2)->first();

        $skip_product_0 = Product::where('status', 1)->where('category_id', $skip_category_0->id)->orderBy('id', 'DESC')->get();
        $skip_product_1 = Product::where('status', 1)->where('category_id', $skip_category_1->id)->orderBy('id', 'DESC')->get();
        $skip_product_2 = Product::where('status', 1)->where('category_id', $skip_category_2->id)->orderBy('id', 'DESC')->get();

        $skip_product_brand_0 = Product::where('status', 1)->where('brand_id', $skip_brand_0->id)->orderBy('id', 'DESC')->get();
        $skip_product_brand_1 = Product::where('status', 1)->where('brand_id', $skip_brand_1->id)->orderBy('id', 'DESC')->get();


        return view('frontend.index', compact('categories', 'sliders', 'products', 'features', 'special_offers', 'special_deals', 'skip_category_0', 'skip_product_0', 'skip_category_1', 'skip_product_1', 'skip_category_2', 'skip_product_2', 'skip_brand_0', 'skip_product_brand_0', 'skip_brand_1', 'skip_product_brand_1'));
    }

    //product details
    public function singleProduct($product_id, $slug)
    {
        $product = Product::findOrFail($product_id);

        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);

        $color_bn = $product->product_color_bn;
        $product_color_bn = explode(',', $color_bn);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);

        $size_bn = $product->product_size_bn;
        $product_size_bn = explode(',', $size_bn);

        $multiImgs = MultiImg::where('product_id', $product_id)->get();
        $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product_id)->orderBy('id', 'DESC')->get();
        return view('frontend.productDetails', compact('product', 'multiImgs', 'product_color_en', 'product_color_bn', 'product_size_en', 'product_size_bn', 'relatedProducts'));
    }

    //tag wise product
    public function tagWiseProduct($tag)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $products = Product::where('status', 1)->where('product_tags_en', $tag)->orWhere('product_tags_bn', $tag)->orderBy('id', "DESC")->paginate(1);
        return view('frontend.tag-product', compact('products', 'categories'));
    }

    //subcategory wise product show
    public function subcatWiseProduct($subcat_id, $slug)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $products = Product::where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id', "DESC")->paginate(1);
        return view('frontend.subCategory-product', compact('products', 'categories'));
    }

    //subsubcategory wise product show
    public function subSubCatWiseProduct($subsubcat_id, $slug)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $products = Product::where('status', 1)->where('subsubcategory_id', $subsubcat_id)->orderBy('id', "DESC")->paginate(1);
        return view('frontend.subSubCategory-product', compact('products', 'categories'));
    }
}