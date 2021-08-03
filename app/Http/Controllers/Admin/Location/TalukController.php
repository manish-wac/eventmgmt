<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\Taluk;
use Session;
use Validator;
use App\Http\Requests\Admin\Location\AddTalukRequest;
use Auth;
use DataTables; 
use App\Http\Requests\Admin\Location\UpdateTalukRequest;

class TalukController extends Controller
{

    private $view = 'admin.location.taluk.';

    public function index (Request $request) 
    {
        
        
        return view($this->view.'index');
    }

    public function dataTable()
    {   

        $taluk = Taluk::latest()
                ->with('country','state', 'district')
                ->get();
        return DataTables::of($taluk)
            ->addIndexColumn()
            ->addColumn('action', function($row){

                $editUrl = route('admin.location.taluk.edit', ['id' => $row->id]);

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

    public function addSubmit(AddTalukRequest $request)
    {
       $validated = $request->validated();
    
       $districtId = $validated['district'];
       $taluk      = $validated['taluk'];

       //check uniqueness

       if(Taluk::where('district_id', $districtId)->where('name', $taluk)->exists()) {
            return response()->json([
                'status' => false,
                'msg'    => 'Taluk Name Already exists'
            ], 400);
       }
       
       $oTaluk = new Taluk;
       $oTaluk->name = $taluk;
       $oTaluk->district_id = $validated['district'];
       $oTaluk->state_id = $validated['state'];
       $oTaluk->country_id = $validated['country'];
       $oTaluk->created_by = Auth::guard('admin')->user();
       $oTaluk->save();

       if($oTaluk->id) {
           Session::flash('success', 'Taluk Added successfully');
           return response()->json([
                'status' => true,
                'taluk_id' => $oTaluk->id,
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
        $taluk = Taluk::find($id);
        if(empty($taluk)) {
            abort(404);
        }

        $district = District::where('state_id', $taluk->state_id)->get();

        return view($this->view.'edit')->with(compact('taluk', 'district'));
    }

    public function update(UpdateTalukRequest $request, $id)
    {
        $taluk = Taluk::find($id);
        if(empty($taluk)) {
            abort(404);
        }
       $validated  = $request->validated();
       $districtId = $validated['district'];
       $taluk      = $validated['taluk'];

       //check uniqueness

       if(Taluk::where('district_id', $districtId)
                    ->where('name', $taluk)->where('_id', '!=', $id)->exists()) {
            return response()->json([
                'status' => false,
                'msg'    => 'Taluk Name Already exists'
            ], 400);
       }


       $oTaluk = Taluk::find($id);
       $oTaluk->name = $taluk;
       $oTaluk->district_id = $validated['district'];
       $oTaluk->state_id = $validated['state'];
       $oTaluk->country_id = $validated['country'];
       $oTaluk->created_by = Auth::guard('admin')->user();
       $oTaluk->save();

       if($oTaluk->id) {
           Session::flash('success', 'Taluk Upadated successfully');
           return response()->json([
                'status' => true,
                'taluk_id' => $oTaluk->id,
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
        try {

            Taluk::destroy($id);
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

    public function fetchAllTaluk($districtId)
    {
        $taluk = Taluk::where('district_id', $districtId)->get();

        return response()->json([
            'taluk' => $taluk
        ]);
    }

    public function checkUniqueName(Request $request)
    {
        $districtId = $request->get('district');
        $talukName = $request->get('taluk');
        $talukId   = $request->get('talukId');

        $exists = false;
        if($talukId) {
            $taluk = Taluk::where('district_id', $districtId)
                                ->where('name', $talukName)
                                ->first();

            if(!empty($taluk) && $taluk->id != $talukId)
                $exists = true;                    

            
            
        }
        else {
            $exists = Taluk::where('district_id', $districtId)
                                ->where('name', $talukName)
                                ->exists();
        }

        if($exists)
            return response()->json("Taluk Name already exists");
        else
            return response()->json(true);
    }
}
