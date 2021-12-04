<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Subsubcategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function addProduct(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.create',compact('categories','brands'));
    }

    //===================get sub sub category from sub category id=========================
    public function getSubSubCat($sub_cat){
        $subsubCat = SubsubCategory::where('subcategory_id',$sub_cat)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subsubCat);
    }

    //=========================store product===============================
   public function store(Request $request){

    $image = $request->file('product_thambnail');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('uploads/products/thambnail/'.$name_gen);
            $save_url = 'uploads/products/thambnail/'.$name_gen;

   $product_id =  Product::insertGetId([
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'subsubcategory_id' => $request->subsubcategory_id,
                'product_name_en' => $request->product_name_en,
                'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
                'product_name_bn' => $request->product_name_bn,
                'product_slug_bn' => str_replace(' ','-',$request->product_name_bn),
                'product_code' => $request->product_code,
                'product_qty' => $request->product_qty,
                'product_tags_en' => $request->product_tags_en,
                'product_tags_bn' => $request->product_tags_bn,
                'product_size_en' => $request->product_size_en,
                'product_size_bn' => $request->product_size_bn,
                'product_color_en' => $request->product_color_en,
                'product_color_bn' => $request->product_color_bn,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'short_descp_en' => $request->short_descp_en,
                'short_descp_bn' => $request->short_descp_bn,
                'long_descp_en' => $request->long_descp_en,
                'long_descp_bn' => $request->long_descp_bn,
                'hot_deals' => $request->hot_deals,
                'featured' => $request->featured,
                'special_offer' => $request->special_offer,
                'special_deals' => $request->special_deals,
                'product_thambnail' => $save_url,
                'status' => 1,
                'created_at' => Carbon::now(),


    ]);

    //////////////////// Multiple image upload start /////////////////////////////////

    $images = $request->file('multi_img');
    foreach ($images as $img) {
        $make_name=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(917,1000)->save('uploads/products/multi-image/'.$make_name);
        $uploadPath = 'uploads/products/multi-image/'.$make_name;

        MultiImg::insert([
            'product_id' => $product_id,
            'photo_name' => $uploadPath,
            'created_at' => Carbon::now(),
        ]);
    }
     //////////////////// Multiple image upload End /////////////////////////////////


    $notification=array(
        'message'=>'Product Added Success',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification);
}

//=======================================MANAGE PRODUCT======================================
public function manageProduct(){
    $products = Product::latest()->get();
    return view('admin.product.index',compact('products'));
}

//=======================================PRODUCT EDIT=======================================
public function edit($product_id){
    $product = Product::findOrFail($product_id);
    $categories = Category::latest()->get();
    $multiImgs = MultiImg::where('product_id',$product_id)->latest()->get();
    $brands = Brand::latest()->get();
    return view('admin.product.edit',compact('product','categories','brands','multiImgs'));
}

//========================================PRODUCT UPDATE WITHOUT IMAGE=======================================
public function productDataUpdate(Request $request){
    $product_id = $request->product_id;

    $request->validate([
        'brand_id' => 'required',
        'category_id' => 'required',
        'subcategory_id' => 'required',
        'subsubcategory_id' => 'required',
    ]);

            Product::findOrFail($product_id)->update([
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'subsubcategory_id' => $request->subsubcategory_id,
                'product_name_en' => $request->product_name_en,
                'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
                'product_name_bn' => $request->product_name_bn,
                'product_slug_bn' => str_replace(' ','-',$request->product_name_bn),
                'product_code' => $request->product_code,
                'product_qty' => $request->product_qty,
                'product_tags_en' => $request->product_tags_en,
                'product_tags_bn' => $request->product_tags_bn,
                'product_size_en' => $request->product_size_en,
                'product_size_bn' => $request->product_size_bn,
                'product_color_en' => $request->product_color_en,
                'product_color_bn' => $request->product_color_bn,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'short_descp_en' => $request->short_descp_en,
                'short_descp_bn' => $request->short_descp_bn,
                'long_descp_en' => $request->long_descp_en,
                'long_descp_bn' => $request->long_descp_bn,
                'hot_deals' => $request->hot_deals,
                'featured' => $request->featured,
                'special_offer' => $request->special_offer,
                'special_deals' => $request->special_deals,
                'status' => 1,
                'created_at' => Carbon::now(),


    ]);
    $notification=array(
        'message'=>'Product Update Success',
        'alert-type'=>'success'
    );
    return Redirect()->route('manage-product')->with($notification);
}

//===============================PRODUCT MAIN THAMBNAIL UPDATE===============================
public function thambnailUpdate(Request $request){
    $pro_id = $request->product_id;
    $oldImage = $request->old_img;
    unlink($oldImage);
    $image = $request->file('product_thambnail');
    $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(917,1000)->save('uploads/products/thambnail/'.$name_gen);
    $save_url = 'uploads/products/thambnail/'.$name_gen;

    Product::findOrFail($pro_id)->update([

        'product_thambnail' => $save_url,
        'updated_at' => Carbon::now(),
    ]);
    $notification=array(
        'message'=>'Product Thambnail Update Success',
        'alert-type'=>'success'
    );
    return Redirect()->route('manage-product')->with($notification);
}

//=============================MULTIPLE IMAGE UPDATE=============================
public function multiImgUpdate(Request $request){
    $imgs = $request->multiImg;
    foreach ($imgs as $id => $img) {
        $imgDel = MultiImg::findOrFail($id);
        unlink($imgDel->photo_name);

        $make_name=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(917,1000)->save('uploads/products/multi-image/'.$make_name);
        $uploadPath = 'uploads/products/multi-image/'.$make_name;
        
        MultiImg::where('id',$id)->update([
            'photo_name' => $uploadPath,
            'updated_at' => Carbon::now(),
        ]);
    }
    $notification=array(
        'message'=>'Product Image Update Success',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification);
}

}
