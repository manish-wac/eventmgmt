<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Location\AddNewStateRequest;
use App\Http\Requests\Admin\Location\UpdateStateDetailsRequest;
use App\Models\State;
use App\Models\Country;
use DataTables;
use Response;
use Validator;
use Auth;
use DB;
class StateController extends Controller
{
    public function index () 
    {
        $country = Country::select('_id','name')->get();
        if($country) $country = $country->toArray();

        return view('admin.location.state', compact('country'));
    }

    /**
     * jquery listing data table using yajra datatable
     */
    public function dataTable(Request $request)
    {
        return DataTables::of(State::latest()->with('country')->get())
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<button class="btn btn-label-primary btn-icon mr-1 js-edit-state" data-index="'.$row['_id'].'"> <i class="fa fa-edit"></i></button>
                        <button class="btn btn-label-primary btn-icon js-delete-state" data-index="'.$row['_id'].'"> <i class="fa fa-trash"></i> </button>';
                
                    return $btn;
            })
            //->rawColumns(['action'])
            ->make(true);
    }

    public function addSubmit(AddNewStateRequest $request)
    {
        $state_name = ucwords(strtolower($request->js_state_name));
        $state_code = strtoupper($request->js_state_code);
        $country_id = $request->js_country_id;

        $state = State::where('country_id', $country_id)->where(function($query) use ($state_name,$state_code){
            $query->orWhere('name', $state_name);
            $query->orWhere('state_code', $state_code);
        })->exists();

        if(!($state)) {
            $insert = State::create([
                'name'       => $state_name,
                'state_code' => $state_code,
                'country_id' => $country_id
            ]);

            if($insert) $result = ['status' => true, 'msg' => "State details added successfully."];

            else $result = ['status' => false, 'msg' => "Something went wrong, try again later"];
        } else $result = ['status' => false, 'msg' => "State already exists."];

        return Response::json($result);
    }

    /**
     * fetching function - fetching details of a state as per request from table state for modal request for edit
     */
    public function getStateDetails (Request $request)
    {
        $state = State::where('_id', $request->state_id)->first();
        if($state) return Response::json(['status' => true, 'data' => ['name' => $state['name'], 'code' => $state['state_code'], 'country' => $state['country_id']]]);
        else return Response::json(['status' => false, 'data' => []]);
    }
    /**
     * update function - update states table data as per request
     */
    public function update(UpdateStateDetailsRequest $request)
    {
        if(!($request->js_state_id)) {
            return Response::json(['status' => false, 'msg' => 'Request couldnot process now. Try again later.']);
        }

        $result = [];

        $st_name = ucwords(strtolower($request->js_state_name));
        $st_code = strtoupper($request->js_state_code);
        $cn_id   = $request->js_country_id;
        $st_id   = $request->js_state_id;

        $state = State::where('country_id', $cn_id)->where(function($query) use ($st_name,$st_code){
                    $query->orWhere('name', $st_name);
                    $query->orWhere('state_code', $st_code);
                })
                ->where('_id', '!=', $st_id)
                ->exists();

        if(!$state) {
            $update = State::where('_id', $st_id)->update(['country_id' => $cn_id, 'name' => $st_name, 'state_code' => $st_code]);

            if($update) 
                $result = ['status' => true, 'msg' => "State details updated successfully."];
            else 
                $result = ['status' => false, 'msg' => "State details couldn't updated, try again later."];
        } else
            $result = ['status' => false, 'msg' => "State details already exists with the same country."];
        
        return Response::json($result);
    }
    /**
     * delete function - delete state from states details
     */
    public function delete(Request $request)
    {
        $delete = State::where('_id', $request->state_id)->delete();

        if($delete) return Response::json(['status' => true, 'msg' => "State deleted successfully."]);
        else return Response::json(['status' => false, 'msg' => "Something went wrong. Please try again later."]);
    }

    public function fetchAllStates($countryId)
    {
        $states = State::where('country_id', $countryId)->select('name','_id')->get();
        return response()->json([
            'states' => $states,

        ]);
    }
}
