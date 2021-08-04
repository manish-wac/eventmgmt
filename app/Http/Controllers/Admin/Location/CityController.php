<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\City;
use Session;
use Validator;
use App\Http\Requests\Admin\Location\AddCityRequest;
use Auth;
use DataTables;
use App\Http\Requests\Admin\Location\UpdateCityRequest;

class CityController extends Controller
{

    private $view = 'admin.location.city.';

    public function index (Request $request)
    {


        return view($this->view.'index');
    }

    public function dataTable()
    {

        $city = City::latest()
                ->with('country','state', 'district')
                ->get();
        return DataTables::of($city)
            ->addIndexColumn()
            ->addColumn('action', function($row){

                $editUrl = route('admin.location.city.edit', ['id' => $row->id]);

                $btn = '<a href="'.$editUrl.'"><button class="btn btn-label-primary btn-icon mr-1 js-edit-" data-index="'.$row['_id'].'"> <i class="fa fa-edit"></i></button></a>
                        <button class="btn btn-label-primary btn-icon js-delete-state" data-index="'.$row['_id'].'"> <i class="fa fa-trash"></i> </button>';

                    return $btn;
            })
            //->rawColumns(['action'])
            ->make(true);
    }

    public function add()
    {
        $country = Country::all();
        return view($this->view.'add')->with(compact('country'));
    }

    public function addSubmit(AddCityRequest $request)
    {
       $validated = $request->validated();

       $districtId = $validated['district'];
       $city      = $validated['city'];

       //check uniqueness

       if(City::where('district_id', $districtId)->where('name', $city)->exists()) {
            return response()->json([
                'status' => false,
                'msg'    => 'City Name Already exists'
            ], 400);
       }

       $oCity = new City;
       $oCity->name = $city;
       $oCity->district_id = $validated['district'];
       $oCity->state_id = $validated['state'];
       $oCity->country_id = $validated['country'];
       $oCity->created_by = Auth::guard('admin')->user();
       $oCity->save();

       if($oCity->id) {
           Session::flash('success', 'City Added successfully');
           return response()->json([
                'status' => true,
                'city_id' => $oCity->id,
           ]);
       }
       else {
           return response()->json([
                'status' => false,
                'msg'    => 'Something went wrong'
            ], 400);
       }


    }

    public function edit($id)
    {
        $city = City::find($id);
        if(empty($city)) {
            abort(404);
        }

        $district = District::where('state_id', $city->state_id)->get();

        return view($this->view.'edit')->with(compact('city', 'district'));
    }

    public function update(UpdateCityRequest $request, $id)
    {
        $city = City::find($id);
        if(empty($city)) {
            abort(404);
        }
       $validated  = $request->validated();
       $districtId = $validated['district'];
       $city      = $validated['city'];

       //check uniqueness

       if(City::where('district_id', $districtId)
                    ->where('name', $city)->where('_id', '!=', $id)->exists()) {
            return response()->json([
                'status' => false,
                'msg'    => 'City Name Already exists'
            ], 400);
       }


       $oCity = City::find($id);
       $oCity->name = $city;
       $oCity->district_id = $validated['district'];
       $oCity->state_id = $validated['state'];
       $oCity->country_id = $validated['country'];
       $oCity->created_by = Auth::guard('admin')->user();
       $oCity->save();

       if($oCity->id) {
           Session::flash('success', 'City Upadated successfully');
           return response()->json([
                'status' => true,
                'city_id' => $oCity->id,
           ]);
       }
       else {
           return response()->json([
                'status' => false,
                'msg'    => 'Something went wrong'
            ], 400);
       }






    }

    public function delete($id)
    {


//        print_r($id);
//        exit();
//        $delete = City::where('_id', $id)->delete();

//        print_r($delete);
//        exit();


//        if($delete) return Response::json(['status' => true, 'msg' => "District deleted successfully."]);
//        else return Response::json(['status' => false, 'msg' => "Something went wrong. Please try again later."]);

        try {
            City::destroy($id);
            return response()->json([
                 'status' => true,
                  'msg' => 'Deleted Successfully',
            ]);
        }
        catch(\Throwable $e) {
            report($e);
            return response()->json([
                 'status' => false,
                'msg'    => 'Something went wrong'
            ], 400);
        }
    }

    public function fetchAllCity($districtId)
    {
        $city = City::where('district_id', $districtId)->get();

        return response()->json([
            'city' => $city
        ]);
    }

    public function checkUniqueName(Request $request)
    {
        $districtId = $request->get('district');
        $cityName = $request->get('city');
        $cityId   = $request->get('cityId');

        $exists = false;
        if($cityId) {
            $city = City::where('district_id', $districtId)
                                ->where('name', $cityName)
                                ->first();

            if(!empty($city) && $city->id != $cityId)
                $exists = true;



        }
        else {
            $exists = City::where('district_id', $districtId)
                                ->where('name', $cityName)
                                ->exists();
        }

        if($exists)
            return response()->json("City Name already exists");
        else
            return response()->json(true);
    }
}
