<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request, $product_id)
    {
        if (Auth::check()) {
            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now()
                ]);
                return response()->json(['success' => 'Successfully added on your wishlist']);
            } else {

                return response()->json(['error' => 'The product has already on your wishlist']);
            }
        } else {
            return response()->json(['error' => 'At first login your account']);
        }
    }

    public function create()
    {
        return view('user.wishlist-page');
    }
    //all product
    public function readAllProduct()
    {
        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();
        // dd($wishlist);
        return response()->json($wishlist);
    }

    //remove wishlist
    public function destroy($id)
    {
        Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();
        return response()->json(['success' => 'Successfully product remove']);
    }
}