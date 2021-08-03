<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LocalBodies;
use App\Models\MerchantUnit;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\Taluk;
use Session;
use Validator;
use App\Http\Requests\Admin\Location\AddNewMerchantUnitRequest;
use App\Http\Requests\Admin\Location\UpdateMerchantUnitRequest;
use Auth;
use DataTables; 
use Response;
use DB;

class MerchantUnitController extends Controller
{

    private $view = 'admin.location.merchant-unit.';

    public function index (Request $request) 
    {
        
        
        return view($this->view.'index');
    }

    public function dataTable()
    {   

        $merchantUnit = MerchantUnit::latest()
                ->with('country','state', 'district','taluk','localBody')
                ->get();
        return DataTables::of($merchantUnit)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="'.route('admin.location.merchant-unit.edit',$row['_id']).'"><button class="btn btn-label-primary btn-icon mr-1 js-edit-"> <i class="fa fa-edit"></i></button></a>
                        <button class="btn btn-label-primary btn-icon js-delete-merchant-unit" data-index="'.$row['_id'].'"> <i class="fa fa-trash"></i> </button>';
                
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

    public function addSubmit(AddNewMerchantUnitRequest $request)
    {
       $validated = $request->validated();
    
       $name      = $validated['name'];

       //check uniqueness
       
       $oMerchantUnit = new MerchantUnit;
       $oMerchantUnit->name = $name;
       $oMerchantUnit->district_id = $validated['district'];
       $oMerchantUnit->state_id = $validated['state'];
       $oMerchantUnit->country_id = $validated['country'];
       $oMerchantUnit->taluk_id = $validated['taluk'];
       $oMerchantUnit->local_body = $validated['local_body'];
       $oMerchantUnit->created_by = Auth::guard('admin')->user();
       $oMerchantUnit->save();

       if($oMerchantUnit->id) {
           Session::flash('success', 'Merchant Unit Added successfully');
           return response()->json([
                'status' => true,
                'merchant_id' => $oMerchantUnit->id,
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
        if(!($id)) url()->previous();
        $data = MerchantUnit::where('_id', $id)->with('country','state', 'district','taluk')->first();
        $localbodie = LocalBodies::where('taluk_id',$data->taluk_id)->get();
        return view($this->view.'edit')->with(compact('data','localbodie'));
    }

    public function update(UpdateMerchantUnitRequest $request,$id)
    {
        $validated = $request->validated();
    
        $name      = $validated['name'];

       $oMerchantUnit = MerchantUnit::where('_id', $id)->first();
       $oMerchantUnit->name = $name;
       $oMerchantUnit->district_id = $validated['district'];
       $oMerchantUnit->state_id = $validated['state'];
       $oMerchantUnit->country_id = $validated['country'];
       $oMerchantUnit->taluk_id = $validated['taluk'];
       $oMerchantUnit->local_body = $validated['local_body'];
       $oMerchantUnit->created_by = Auth::guard('admin')->user();
       $oMerchantUnit->save();

       if($oMerchantUnit->id) {
           Session::flash('success', 'Document Updated successfully');
           return response()->json([
                'status' => true,
                'merchant_id' => $oMerchantUnit->id,
           ]);
       }
       else {
           return response()->json([
                'status' => false,
                'msg'    => 'Something went wrong'
            ], 400);
       }

    }

    public function delete(Request $request)
    {
        $delete = MerchantUnit::where('_id', $request->id)->delete();
        
        if($delete) return Response::json(['status' => true, 'msg' => "deleted successfully."]);
        else return Response::json(['status' => false, 'msg' => "Something went wrong. Please try again later."]);
    }

    public function checkUniqueName(Request $request)
    {
        $local_body = $request->get('local_body');
        $name = $request->get('name');
        $merchantId   = $request->get('localBodyId');

        $exists = false;
        if($merchantId) {
            $merchantUnit = MerchantUnit::find($merchantId);  
        }
        else {
            $exists = MerchantUnit::where('local_body', $local_body)
                                ->where('name', $name)
                                ->exists();
        }

        if($exists)
            return response()->json("Mechant Unit Name already exists");
        else
            return response()->json(true);
    }
}
