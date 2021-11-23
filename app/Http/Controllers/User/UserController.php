<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index(){
        return view('user.home');
    }

    public function updateData(Request $request){
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

    //==========================================Image Page======================================
    public function imagePage(){
        return view('user.change-image');
    }

    //=========================================Update Image====================================
    public function updateImage(Request $request){
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
