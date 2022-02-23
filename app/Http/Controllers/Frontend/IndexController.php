<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //index page
    public function index(){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.index',compact('categories'));
    }
}
