@extends('admin.layouts.app')
@section('headerClass','')

@push('css')

	<title>Country | {{env('APP_NAME')}}</title>

@endpush
@section('content')

<div class="content ">
   <div class="container-fluid">
      <div class="row">
         <div class="col-6">
            <!-- BEGIN Portlet -->
            <div class="portlet">
               <div class="portlet-header portlet-header-bordered">
                  <h3 class="portlet-title">Add New Question</h3>
               </div>
               <div class="portlet-body">
			   	  @include('admin.partials.messages')
                  <form id="js-add-new-questions-form">
                     <div class="results">

                     </div>
				  	      @csrf
                     <!-- BEGIN Form Row -->
                     <div class="form-group">
                        <label for="question">Enter question to configure</label>
							   <!-- BEGIN Float Label -->
								<div class="float-label">
									<input type="text" id="question" name="question" class="form-control" placeholder="Enter question">									
								</div>
								<!-- END Float Label -->
							</div>
							<!-- END Form Group -->
                     <label for="">Options</label>
                     <div class="form-row">
                        
								<div class="col-md-1 mb-1">
									<span class="form-control options">A</span>
								</div>
								<div class="col-md-8 mb-6">
								   <input type="text" class="form-control" name="option_1" id="option_1" value="">
								</div>
								<div class="col-md-3 mb-3">
									<!-- BEGIN Custom Radio -->
                           <div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" name="isAnswer" value="1" id="is_answer_1">
										<label class="custom-control-label" for="is_answer_1">Is Answer</label>
									</div>
									<!-- END Custom Radio -->
								</div>
							</div>
                     <div class="form-row">
                        
								<div class="col-md-1 mb-1">
									<span class="form-control options">B</span>
								</div>
								<div class="col-md-8 mb-6">
								   <input type="text" class="form-control" name="option_2" id="option_2" value="">
								</div>
								<div class="col-md-3 mb-3">
									<!-- BEGIN Custom Radio -->
                           <div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" name="isAnswer" value="2" id="is_answer_2">
										<label class="custom-control-label" for="is_answer_2">Is Answer</label>
									</div>
									<!-- END Custom Radio -->
								</div>
							</div>
                     <div class="form-row">
                        
								<div class="col-md-1 mb-1">
									<span class="form-control options">C</span>
								</div>
								<div class="col-md-8 mb-6">
								   <input type="text" class="form-control" name="option_3" id="option_3" value="">
								</div>
								<div class="col-md-3 mb-3">
									<!-- BEGIN Custom Radio -->
                           <div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" name="isAnswer" value="3" id="is_answer_3">
										<label class="custom-control-label" for="is_answer_3">Is Answer</label>
									</div>
									<!-- END Custom Radio -->
								</div>
							</div>
                     <div class="form-row">
                        
								<div class="col-md-1 mb-1">
									<span class="form-control options">D</span>
								</div>
								<div class="col-md-8 mb-6">
								   <input type="text" class="form-control" id="option_4" name="option_4" value="">
								</div>
								<div class="col-md-3 mb-3">
									<!-- BEGIN Custom Radio -->
                           <div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" name="isAnswer" value="4" id="is_answer_4">
										<label class="custom-control-label" for="is_answer_4">Is Answer</label>
									</div>
									<!-- END Custom Radio -->
								</div>
							</div>
                     <button type="submit" class="btn btn-primary">Add</button>                     
                  </form>
               </div>
            </div>
            <!-- END Portlet -->
         </div>
      </div>
   </div>
</div>

@endsection

@push('js')
  <script type="text/javascript" src="{{asset('assets/js/admin/games/add-game-questions.js')}}"></script>

	
@endpush