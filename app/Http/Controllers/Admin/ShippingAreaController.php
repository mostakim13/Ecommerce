<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingDivision;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShippingAreaController extends Controller
{
    public function createDivision()
    {
        $divisions = ShippingDivision::orderBy('id', 'DESC')->get();
        return view('admin.shippingdivision.create',  get_defined_vars());
    }

    public function storeDivision(Request $request)
    {
        $request->validate([
            'division_name' => 'required',
        ]);

        ShippingDivision::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Division added successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function editDivision($division_id)
    {
        $division = ShippingDivision::findOrFail($division_id);
        return view('admin.shippingdivision.edit', get_defined_vars());
    }

    public function updateDivision(Request $request)
    {
        $request->validate([
            'division_name' => 'required',
        ]);
        ShippingDivision::findOrFail($request->id)->update([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Division updated successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('division')->with($notification);
    }

    public function destroyDivision($division_id)
    {
        ShippingDivision::findOrFail($division_id)->delete();
        $notification = array(
            'message' => 'Division deleted successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}