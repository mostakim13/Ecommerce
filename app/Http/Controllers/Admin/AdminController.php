<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index(){
        return view('admin.home');
    }

    //=====================================PROFILE===============================
    public function profile(){
        return view('admin.profile.index');
    }

    //========================================update personal info=====================
    public function updateInfo(Request $request ){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ],[
            'name.required' => 'Please input your name', 
            'email.required' => 'Please input your email',
            'phone.required' => 'Please input your phone number',
        ]);
        User::findOrFail(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'updated_at' => Carbon::now(),

        ]);

        $notification=array(
            'message'=>'Your Profile Updated',
            'alert-type' =>'success'
        );
        return Redirect()->back()->with($notification);
    }

    //=================================================image update============================================
    public function updateImagePage(){
        return view('admin.profile.change-image');
    }

    //=========================================Admin Image Store==================================
    public function imageStore(Request $request){
        $old_image = $request->old_image;

        if (Auth::user()->image=='frontend/media/avatar.jpg') {

            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('frontend/media/'.$name_gen);
            $save_url = 'frontend/media/'.$name_gen;
            User::findOrFail(Auth::id())->Update([
                'image' => $save_url
            ]);
            $notification=array(
                'message'=>'Image Successfully Updated',
                'alert-type' =>'success'
            );
            return Redirect()->back()->with($notification);
            }
            else {
                unlink($old_image);
                $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('frontend/media/'.$name_gen);
            $save_url = 'frontend/media/'.$name_gen;
            User::findOrFail(Auth::id())->Update([
                'image' => $save_url
            ]);
            $notification=array(
                'message'=>'Image Successfully Updated',
                'alert-type' =>'success'
            );
            return Redirect()->back()->with($notification);
            }
    }
}
