<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\Location\AddNewDistrictRequest;
use App\Http\Requests\Admin\Location\UpdateDistrictRequest;

use App\Models\District;
use App\Models\Country;
use App\Models\State;
use DataTables;
use Response;
use Validator;
class DistrictController extends Controller
{
    public function index (Request $request) 
    {
        $country = Country::select('_id','name')->get();
        if($country) $country = $country->toArray();

        return view('admin.location.district', compact('country'));
    }

    public function dataTable(Request $request)
    {
        return DataTables::of(District::latest()->with('country','state')->get())
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $btn = '<button class="btn btn-label-primary btn-icon mr-1 js-edit-district" data-index="'.$row['_id'].'"> <i class="fa fa-edit"></i></button>
                    <button class="btn btn-label-primary btn-icon js-delete-district" data-index="'.$row['_id'].'"> <i class="fa fa-trash"></i> </button>';
            
                return $btn;
        })
        //->rawColumns(['action'])
        ->make(true);
    }

    public function addSubmit(AddNewDistrictRequest $request)
    {
        $district_name = ucwords(strtolower($request->js_district_name));
        $state_id = $request->js_state_id;
        $country_id = $request->js_country_id;

        $district = District::where('country_id', $country_id)->where('state_id', $state_id)->where('name', $district_name)->exists();

        if(!($district)) {
            $insert = District::create([
                'name'       => $district_name,
                'state_id' => $state_id,
                'country_id' => $country_id
            ]);

            if($insert) $result = ['status' => true, 'msg' => "District details added successfully."];

            else $result = ['status' => false, 'msg' => "Something went wrong, try again later"];
        } else $result = ['status' => false, 'msg' => "District already exists. Under the country and state"];

        return Response::json($result);
    }

    /**
     * fetching function - fetching details of a district as per request from table districts for modal request for edit
     */
    public function getDistrictDetails (Request $request)
    {
        $district = District::where('_id', $request->district_id)->first();

        if($district) {

            $state = State::where('country_id', $district['country_id'])->select('_id','name')->get()->toArray();
            return Response::json(['status' => true, 'data' => ['name' => $district['name'],'district_id' => $district['_id'],'state' => $district['state_id'], 'country' => $district['country_id'], 'states' => $state]]);
        } else 
            return Response::json(['status' => false, 'data' => []]);
    }
    /** 
     * update districts details 
     */
    public function update(UpdateDistrictRequest $request)
    {

        if(!($request->js_district_code)) {
            return Response::json(['status' => false, 'msg' => 'Request couldnot process now. Try again later.']);
        }

        $result = [];

        $dist_name = ucwords(strtolower($request->js_district_name));
        $cn_id   = $request->js_country_id;
        $st_id   = $request->js_state_id;
        $dist_id = $request->js_district_code;

        $district = District::where('country_id', $cn_id)->where('state_id', $st_id)->where('name', $dist_name)
                ->where('_id', '!=', $dist_id)
                ->exists();
        if(!$district) {
            $update = District::where('_id', $dist_id)->update(['country_id' => $cn_id, 'name' => $dist_name, 'state_id' => $st_id]);

            if($update) 
                $result = ['status' => true, 'msg' => "District details updated successfully."];
            else 
                $result = ['status' => false, 'msg' => "District details couldn't updated, try again later."];
        } else
            $result = ['status' => false, 'msg' => "District details already exists with the same country and state."];
        
        return Response::json($result);  
    }
    /** 
     * delete districts details 
     */
    public function delete(Request $request)
    {
        $delete = District::where('_id', $request->district_id)->delete();

        if($delete) return Response::json(['status' => true, 'msg' => "District deleted successfully."]);
        else return Response::json(['status' => false, 'msg' => "Something went wrong. Please try again later."]);
    }

    public function fetchAllDistricts($stateId)
    {
        
        $district = District::where('state_id', $stateId)->get();

        return response()->json([
            'district' => $district
        ]);
    }
}
