<?php

namespace App\Http\Controllers\Admin\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Country;

use App\Http\Requests\Admin\Location\AddNewCountryRequest;
use App\Http\Requests\Admin\Location\UpdateCountryDetailsRequest;

use DataTables;
use Response;
use Auth;
use DB;

class GameController extends Controller
{
    /**
     * loading game list blade
     */
    public function index()
    {
        return view('admin.games.game.index');
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
}
