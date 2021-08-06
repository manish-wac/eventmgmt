<?php

namespace App\Http\Controllers\Admin\Location;

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

class EventController extends Controller
{

    private $view = 'admin.location.event.';

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
            ->addColumn('action', function($row){

                $editUrl = route('admin.location.event.edit', ['id' => $row->id]);

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

    public function addSubmit(AddEventRequest $request)
    {
       $validated = $request->validated();

        $event= $validated['title'];

       $oEvent = new Event;
       $oEvent->title = $event;
       $oEvent->district_id = $validated['district'];
       $oEvent->taluk_id = $validated['taluk'];
       $oEvent->state_id = $validated['state'];
       $oEvent->country_id = $validated['country'];
       $oEvent->city_id = $validated['city'];
       $oEvent->location = $validated['location'];
       $oEvent->address = $validated['address'];
       $oEvent->eventrange = $validated['eventrange'];
//       $oEvent->event_to = $validated['event_to'];
        $oEvent->regrange = $validated['regrange'];
//        $oEvent->reg_to = $validated['reg_to'];
        $oEvent->status = $validated['status'];

        if($request->file('file')) {
            $oEvent->file = $validated['file'];
            $imageName = time() . '.' . $oEvent->file->extension();
            $oEvent->file->move(public_path('photo'), $imageName);
            $oEvent->file = $imageName;
        }


       $oEvent->save();

        Session::flash('success', 'Event Added successfully');
        return redirect()->route('admin.location.event');
    }

    public function edit($id)
    {
        $event = Event::find($id);
        if(empty($event)) {
            abort(404);
        }

        $district = District::where('state_id', $event->state_id)->get();
        $city = City::where('district_id', $event->district_id)->get();
        $taluk = Taluk::where('_id', $event->taluk_id)->get();

        return view($this->view.'edit')->with(compact('event', 'district', 'taluk'))
            ->with(compact('city', $city));
    }

    public function update(UpdateEventRequest $request, $id)
    {

//        dd($request);
        $event = Event::find($id);
        if(empty($event)) {
            abort(404);
        }
       $validated  = $request->validated();
       $districtId = $validated['district'];
       $event      = $validated['title'];

       //check uniqueness

//       if(Event::where('district_id', $districtId)
//                    ->where('name', $event)->where('_id', '!=', $id)->exists()) {
//            return response()->json([
//                'status' => false,
//                'msg'    => 'Event Name Already exists'
//            ], 400);
//       }


       $oEvent = Event::find($id);

//       print_r($oEvent);
//       exit();

        $oEvent->title = $event;
        $oEvent->district_id = $validated['district'];
        $oEvent->state_id = $validated['state'];
        $oEvent->country_id = $validated['country'];
        $oEvent->city_id = $validated['city'];
        $oEvent->location = $validated['location'];
        $oEvent->address = $validated['address'];
        $oEvent->event_from = $validated['eventrange'];
        $oEvent->reg_from = $validated['regrange'];
        $oEvent->status = $validated['status'];

        if($request->file('file')) {
            $oEvent->file = $validated['file'];
            $imageName = time() . '.' . $oEvent->file->extension();
            $oEvent->file->move(public_path('photo'), $imageName);
            $oEvent->file = $imageName;
        }


       $oEvent->save();
//        Session::flash('success', 'Event Updated successfully');
//        return redirect()->route('admin.location.event');
       if($oEvent->id) {

           return response()->json([
                'status' => true,
                'event_id' => $oEvent->id,
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
//        $delete = Event::where('_id', $id)->delete();

//        print_r($delete);
//        exit();


//        if($delete) return Response::json(['status' => true, 'msg' => "District deleted successfully."]);
//        else return Response::json(['status' => false, 'msg' => "Something went wrong. Please try again later."]);

        try {
            Event::destroy($id);
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

    public function fetchAllEvent($districtId)
    {
        $event = Event::where('district_id', $districtId)->get();

        return response()->json([
            'event' => $event
        ]);
    }

    public function checkUniqueName(Request $request)
    {
        $districtId = $request->get('district');
        $eventName = $request->get('event');
        $eventId   = $request->get('eventId');

        $exists = false;
        if($eventId) {
            $event = Event::where('district_id', $districtId)
                                ->where('name', $eventName)
                                ->first();

            if(!empty($event) && $event->id != $eventId)
                $exists = true;



        }
        else {
            $exists = Event::where('district_id', $districtId)
                                ->where('name', $eventName)
                                ->exists();
        }

        if($exists)
            return response()->json("Event Name already exists");
        else
            return response()->json(true);
    }
}
