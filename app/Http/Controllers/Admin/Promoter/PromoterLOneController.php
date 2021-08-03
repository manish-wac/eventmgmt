<?php

namespace App\Http\Controllers\Admin\Promoter;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\PromotorLevel;
use App\Models\User;
use App\Http\Requests\Admin\Promotor\PromoterLoneRequest;


class PromoterLOneController extends Controller
{

    private $view = 'admin.promoter.';

    public function index(){
        return view($this->view.'index');
        dd('sss');
    }

    public function add(){
        $country = Country::all();
        $promoterLevel = PromotorLevel::all();
        return view($this->view.'add')->with(compact('country','promoterLevel'));
    }

    public function addSubmit(PromoterLoneRequest $request)
    {
       $validated = $request->validated();


       //check uniqueness

    //    if(Taluk::where('district_id', $districtId)->where('name', $taluk)->exists()) {
    //         return response()->json([
    //             'status' => false,
    //             'msg'    => 'Taluk Name Already exists'
    //         ], 400);
    //    }
       
       $oPromotor = new User;
       $oTaluk->first_name = $taluk;
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
}
