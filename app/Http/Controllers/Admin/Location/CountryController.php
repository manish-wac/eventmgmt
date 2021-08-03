<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Country;

use App\Http\Requests\Admin\Location\AddNewCountryRequest;
use App\Http\Requests\Admin\Location\UpdateCountryDetailsRequest;

use DataTables;
use Response;
use Auth;
use DB;

class CountryController extends Controller
{
    /**
     * loading country list blade
     */
    public function index()
    {
        return view('admin.location.country');
    }
    /**
     * jquery listing data table using yajra datatable
     */
    public function dataTable(Request $request)
    {

        $data = Country::query();
            return DataTables::of(Country::latest()->get())
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<button class="btn btn-label-primary btn-icon mr-1 js-edit-country" data-index="'.$row['_id'].'"> <i class="fa fa-edit"></i></button>
                        <button class="btn btn-label-primary btn-icon js-delete-country" data-index="'.$row['_id'].'"> <i class="fa fa-trash"></i> </button>';
                
                    return $btn;
            })
            //->rawColumns(['action'])
            ->make(true);
    }
    /**
     * create function - creating a new entry for location_country table
     */
    public function createCountry (AddNewCountryRequest $request) 
    {
        $cn_name = ucwords(strtolower($request->js_country_name));
        $cn_code = strtoupper($request->js_country_code);

        if(!(Country::where('sortcode', $cn_code)->orWhere('name', $cn_name)->exists())) {
            $insert = Country::create([
                'name' => $cn_name,
                'sortcode'      => $cn_code,
            ]);

            if($insert) return back()->with('country-success', "Country details added successfully.") ;

            else return back()->with('country-fail', "Something went wrong, try again later")->withInput();
        } else return back()->with('country-fail', "Country already exists.")->withInput();
    }
    /**
     * (not using now )fetching function - fetching details of a country as per request from table location_country for modal request for edit
     */
    public function getCountryDetails (Request $request)
    {
        $country = Country::where('_id', $request->_id)->where('sortcode', $request->country_code);
        if($country) return Response::json(['status' => true, 'data' => ['name' => $country['name'], 'code' => $country['sortcode'], '_id' => $request->_id]]);
        else return Response::json(['status' => false, 'data' => []]);
    }
    /**
     * update function - updating details of a country as per request from table location_country
     */
    public function updateCountryDetails(UpdateCountryDetailsRequest $request) 
    {
        $cn_name = ucwords(strtolower($request->js_update_cn_name));
        $cn_code = strtoupper($request->js_update_cn_code);

        $country = Country::where('_id', '!=', $request->collection_id)->where(function($query) use ($cn_name,$cn_code){
            $query->orWhere('name', $cn_name);
            $query->orWhere('sortcode', $cn_code);
        })->exists();

        if(!$country) {
            $update = Country::where('_id', $request->collection_id)->update(['sortcode' => $cn_code, 'name' => $cn_name]);

            if($update) 
                return back()->with('country-update-success', "Country details updated successfully.")->withInput();
            else 
                return back()->with('country-update-fail', "Country details couldn't updated, try again later.")->withInput();
        } else
            return back()->with('country-update-fail', "This details already exists with another country.")->withInput();
    }
    /**
     * delete function - delete countries from table location_country
     */
    public function deleteCountry(Request $request) {
        $delete = Country::where('_id', $request->country_id)->delete();

        if($delete) return Response::json(['status' => true, 'msg' => "Country deleted successfully."]);
        else return Response::json(['status' => false, 'msg' => "Something went wrong. Please try again later."]);
    }

    /**
     * get all countres - this master data will be used in dropdowns 
     */
    public function getAllCountries()
    {
        $countries = Country::all();
        return response()->json($countries);
    }
}
