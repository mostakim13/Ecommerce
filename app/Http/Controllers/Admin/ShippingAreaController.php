<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingDistrict;
use App\Models\ShippingDivision;
use App\Models\ShippingState;
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


    //=========================================District=======================================

    public function createDistrict()
    {
        $districts = ShippingDistrict::with('division')->orderBy('id', 'DESC')->get();
        $divisions = ShippingDivision::orderBy('id', 'DESC')->get();
        return view('admin.shippingdistrict.create',  get_defined_vars());
    }

    public function storeDistrict(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'district_name' => 'required',
        ]);

        ShippingDistrict::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'District added successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function editDistrict($district_id)
    {
        $divisions = ShippingDivision::orderBy('division_name', 'ASC')->get();
        $district = ShippingDistrict::findOrFail($district_id);
        return view('admin.shippingdistrict.edit', get_defined_vars());
    }

    public function updateDistrict(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'district_name' => 'required',
        ]);
        ShippingDistrict::findOrFail($request->id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'updated_at' => Carbon::now('Asia/Dhaka'),
        ]);
        $notification = array(
            'message' => 'District updated successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('district')->with($notification);
    }

    public function destroyDistrict($district_id)
    {
        ShippingDistrict::findOrFail($district_id)->delete();
        $notification = array(
            'message' => 'District deleted successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    //state
    public function createState()
    {
        $states = ShippingState::with('division', 'district')->orderBy('id', 'DESC')->get();
        $divisions = ShippingDivision::orderBy('division_name', 'ASC')->get();
        return view('admin.shippingstate.create', compact('states', 'divisions'));
    }

    public function getDistrictAjax($division_id)
    {
        $shipping = ShippingDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($shipping);
    }

    public function storeState(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required',
        ]);

        ShippingState::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now('Asia/Dhaka'),
        ]);
        $notification = array(
            'message' => 'State added successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function editState($state_id)
    {
        $divisions = ShippingDivision::orderBy('division_name', 'ASC')->get();
        $state = ShippingState::findOrFail($state_id);
        return view('admin.shippingstate.edit', get_defined_vars());
    }

    public function updateState(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'state_name' => 'required',
        ]);
        ShippingState::findOrFail($request->id)->update([
            'division_id' => $request->division_id,
            'state_name' => $request->state_name,
            'updated_at' => Carbon::now('Asia/Dhaka'),
        ]);
        $notification = array(
            'message' => 'State updated successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('state')->with($notification);
    }

    public function destroyState($state_id)
    {
        ShippingState::findOrFail($state_id)->delete();
        $notification = array(
            'message' => 'State deleted successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}