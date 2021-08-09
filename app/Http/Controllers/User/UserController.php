<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\Event;
use App\Models\City;
use App\Models\Taluk;
use Session;
use Validator;
use App\Http\Requests\Admin\Location\AddEventRequest;
use Auth;
use DataTables;
use App\Http\Requests\Admin\Location\UpdateEventRequest;

class UserController extends Controller
{
    private $view = 'user.location.event.';

    public function index (Request $request)
    {


        return view($this->view.'index');
    }

    public function dataTable()
    {

        $event = Event::latest()
            ->with('country','state', 'district', 'city')
            ->get();

        return DataTables::of($event)
            ->addIndexColumn()
//            ->addColumn('action', function($row){
//
//                $editUrl = route('admin.location.event.edit', ['id' => $row->id]);
//
//                $btn = '<a href="'.$editUrl.'"><button class="btn btn-label-primary btn-icon mr-1 js-edit-" data-index="'.$row['_id'].'"> <i class="fa fa-edit"></i></button></a>
//                        <button class="btn btn-label-primary btn-icon js-delete-state" data-index="'.$row['_id'].'"> <i class="fa fa-trash"></i> </button>';
//
//                return $btn;
//            })
            //->rawColumns(['action'])
            ->make(true);
    }



}
