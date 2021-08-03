<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LocalBodies;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\Taluk;
use Session;
use Validator;
use App\Http\Requests\Admin\Location\AddLocalBodiRequest;
use App\Http\Requests\Admin\Location\UpdateLocalBodiRequest;
use Auth;
use DataTables; 
use Response;
use DB;

class LocalBodiesController extends Controller
{

    private $view = 'admin.location.local-body.';

    public function index (Request $request) 
    {
        
        
        return view($this->view.'index');
    }

    public function dataTable()
    {   

        $localbodies = LocalBodies::latest()
                ->with('country','state', 'district','taluk')
                ->get();
        return DataTables::of($localbodies)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="'.route('admin.location.local-bodies.edit',$row['_id']).'"><button class="btn btn-label-primary btn-icon mr-1 js-edit-"> <i class="fa fa-edit"></i></button></a>
                        <button class="btn btn-label-primary btn-icon js-delete-local-bodies" data-index="'.$row['_id'].'"> <i class="fa fa-trash"></i> </button>';
                
                    return $btn;
            })
            ->addColumn('type', function($row) {
                return config('shoppingchallenge.LocalBodies.'.$row->type.'');
            })
            //->rawColumns(['action'])
            ->make(true);
    }

    public function add()
    {
        $country = Country::all();
        return view($this->view.'add')->with(compact('country'));
    }

    public function addSubmit(AddLocalBodiRequest $request)
    {
       $validated = $request->validated();
    
       $type      = $validated['type'];

       //check uniqueness
       
       $oLocalBodies = new LocalBodies;
       $oLocalBodies->type = $type;
       $oLocalBodies->district_id = $validated['district'];
       $oLocalBodies->state_id = $validated['state'];
       $oLocalBodies->country_id = $validated['country'];
       $oLocalBodies->taluk_id = $validated['taluk'];
       $oLocalBodies->name = $validated['name'];
       $oLocalBodies->created_by = Auth::guard('admin')->user();
       $oLocalBodies->save();

       if($oLocalBodies->id) {
           Session::flash('success', 'Local bodi Added successfully');
           return response()->json([
                'status' => true,
                'local_bodi_id' => $oLocalBodies->id,
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
        $data = LocalBodies::where('_id', $id)->with('country','state', 'district','taluk')->first();
        $taluk = Taluk::where('state_id',$data->state_id)->get();
        return view($this->view.'edit')->with(compact('data','taluk'));
    }

    public function update(UpdateLocalBodiRequest $request,$id)
    {
        $validated = $request->validated();
    
        $type      = $validated['type'];

       $oLocalBodies = LocalBodies::where('_id', $id)->first();
       $oLocalBodies->type = $type;
       $oLocalBodies->district_id = $validated['district'];
       $oLocalBodies->state_id = $validated['state'];
       $oLocalBodies->country_id = $validated['country'];
       $oLocalBodies->taluk_id = $validated['taluk'];
       $oLocalBodies->name = $validated['name'];
       $oLocalBodies->save();

       if($oLocalBodies->id) {
           Session::flash('success', 'Document Updated successfully');
           return response()->json([
                'status' => true,
                'local_bodi_id' => $oLocalBodies->id,
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
        $delete = LocalBodies::where('_id', $request->id)->delete();
        
        if($delete) return Response::json(['status' => true, 'msg' => "deleted successfully."]);
        else return Response::json(['status' => false, 'msg' => "Something went wrong. Please try again later."]);
    }

    public function fetchAllLocalBodies($talukId)
    {
        $local_bodi = LocalBodies::where('taluk_id', $talukId)->get();

        return response()->json([
            'local_bodi' => $local_bodi
        ]);
    }
}
