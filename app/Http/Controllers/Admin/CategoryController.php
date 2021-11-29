<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }

    //====================Category Store======================
    public function categoryStore(Request $request){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_bn' => 'required',
            'category_icon' => 'required',
        ],[
            'category_name_en.required' => 'Please input english category name',
            'category_name_bn.required' => 'Please input bangla category name',
        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_bn' => $request->category_name_bn,
            'category_slug_en' => strtolower(str_replace(' ','-',$request->category_slug_en)),
            'category_slug_bn' => str_replace(' ','-',$request->category_name_bn),
            'category_icon' => $request->category_icon,
            'created_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Category Added Success',
            'alert-type' =>'success'
        );
        return Redirect()->back()->with($notification);
    }

    //================Category Edit=====================
    public function edit($cat_id){
        $category = Category::findOrFail($cat_id);
        return view('admin.category.edit',compact('category'));
    }

    //===========================Category Update==============================
    public function categoryUpdate(Request $request){
        $cat_id = $request->id;
        Category::findOrFail($cat_id)->Update([
            'category_name_en' => $request->category_name_en,
            'category_name_bn' => $request->category_name_bn,
            'category_slug_en' => strtolower(str_replace(' ','-',$request->category_slug_en)),
            'category_slug_bn' => str_replace(' ','-',$request->category_name_bn),
            'category_icon' => $request->category_icon,
            'created_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Category Update Success',
            'alert-type' =>'success'
        );
        return Redirect()->route('category')->with($notification);

    }

    //======================Category Delete==========================
    public function delete($cat_id){
        Category::findOrFail($cat_id)->delete();
        $notification=array(
         'message'=>'Category Delete Success',
         'alert-type'=>'success'
     );
     return Redirect()->back()->with($notification);
    }

    //===========================================SUB CATEGORY====================================
    public function subIndex(){
        $subcategories = Subcategory::latest()->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('admin.sub-category.index',compact('subcategories','categories'));
    }
    //===========================================sub-category store===========================
    public function subCategoryStore(Request $request){
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
            'category_id' => 'required',
        ],[
            'subcategory_name_en.required' => 'Please input english sub-category name.',
            'subcategory_name_bn.required' => 'Please input bangla sub-category name.',
            'category_id.required' => 'Please select any category.',
        ]);
        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_slug_en)),
            'subcategory_slug_bn' => str_replace(' ','-',$request->subcategory_name_bn),
            'created_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Sub-Category Added Success',
            'alert-type' =>'success'
        );
        return Redirect()->back()->with($notification);
    }
    //===============================================Sub-category edit=====================================
    public function subEdit($subcat_id){
        $subcategory = Subcategory::findOrFail($subcat_id);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('admin.sub-category.edit',compact('subcategory','categories'));
    }
    //==========================================Sub-category update====================================
    public function subCategoryUpdate(Request $request){

        $subcat_id = $request->id;
        Subcategory::findOrFail($subcat_id)->Update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_slug_en)),
            'subcategory_slug_bn' => str_replace(' ','-',$request->subcategory_name_bn),
            'updated_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Sub-Category Update Success',
            'alert-type' =>'success'
        );
        return Redirect()->route('sub-category')->with($notification);
    }
    //====================================sub-category delete===============================
    public function subDelete($subcat_id){
        Subcategory::findOrFail($subcat_id)->delete();
        $notification=array(
         'message'=>'Sub-Category Delete Success',
         'alert-type'=>'success'
     );
     return Redirect()->back()->with($notification);
    }
}
