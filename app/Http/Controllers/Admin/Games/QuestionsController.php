<?php

namespace App\Http\Controllers\Admin\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Question;

use App\Http\Requests\Admin\Games\AddQuestionRequest;

use DataTables;
use Response;
use Auth;
use DB;

class QuestionsController extends Controller
{
    private $view = 'admin.games.questions.';
    /**
     * loading game list blade
     */
    public function index()
    {
        return view($this->view.'index');
    }

    /**
     * jquery listing data table using yajra datatable
     */
    public function dataTable(Request $request)
    {

        return DataTables::of(Question::latest()->get())
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<button class="btn btn-label-primary btn-icon mr-1 js-edit-country" data-index="'.$row['_id'].'"> <i class="fa fa-edit"></i></button>
                        <button class="btn btn-label-primary btn-icon js-delete-country" data-index="'.$row['_id'].'"> <i class="fa fa-trash"></i> </button>';
                
                    return $btn;
            })
            //->rawColumns(['action'])
            ->make(true);
    }

    public function add() {
        // $country = Country::all();
        return view($this->view.'add');
    }

    public function addSubmit(AddQuestionRequest $request) {

        $validated = $request->validated();
    
        $question      = $validated['question'];
        $answer        = $validated['isAnswer'];

        $option        = [
                            ['text' => $validated['option_1'] , 'is_correct_answer' => ($answer == 1) ? true : false],
                            ['text' => $validated['option_2'] , 'is_correct_answer' => ($answer == 2) ? true : false],
                            ['text' => $validated['option_3'] , 'is_correct_answer' => ($answer == 3) ? true : false],
                            ['text' => $validated['option_4'] , 'is_correct_answer' => ($answer == 4) ? true : false]
                        ];
        

        $nQuestion = new Question;
        $nQuestion->question = $question;
        $nQuestion->answer_opions = $option;
        $nQuestion->created_by = Auth::guard('admin')->user()->_id;
        $nQuestion->save();

        if($nQuestion->id)
            $result = [ 'status' => true, 'msg' => 'Question added successfully.' ];
        else
            $result = [ 'status' => false, 'msg'    => 'Something went wrong' ];
        
        return Response::json($result); 
    }
}
