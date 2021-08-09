@extends('admin.layouts.app')
@section('headerClass','')

@push('css')

	<title>Local Body | {{env('APP_NAME')}}</title>

@endpush
@section('content')

<div class="content ">
   <div class="container-fluid">
      <div class="row">
         <div class="col-6">
            <!-- BEGIN Portlet -->
            <div class="portlet">
               <div class="portlet-header portlet-header-bordered">
                  <h3 class="portlet-title">Edit Local Bodies</h3>
               </div>
               <div class="portlet-body">
			   	  @include('admin.partials.messages')
                  <form method="POST" id="js-edit-local-bodies-form">
				  	  @csrf
					   <div class="form-group">
                     <label for="js-local-body-edit-country">Country</label>
                     <select class="form-control" id="js-local-body-edit-country" name="country" readonly="readonly">
							   <option value="{{$data->country_id}}" selected>{{$data->country->name}} </option>
                     </select>
					 	<span id="js-local-body-edit-country-error" class="error invalid-feedback"></span>
					   </div>
					 
                  <div class="form-group">
                        <label for="js-local-body-edit-state">State</label>
                        <select class="form-control" id="js-local-body-edit-state" name="state" readonly="readonly">
                           <option value="{{$data->state_id}}" selected>{{$data->state->name}} </option>
                        </select>
						      <span id="js-local-body-edit-state-error" class="error invalid-feedback"></span>
                  </div>
                  <div class="form-group">
                        <label for="js-local-body-edit-district">District</label>
                        <select class="form-control" id="js-local-body-edit-district" name="district" readonly="readonly">
                            <option value="{{$data->district_id}}" selected>{{$data->district->name}} </option>
                        </select>
						      <span id="js-local-body-edit-district-error" class="error invalid-feedback"></span>
                  </div>
                  <div class="form-group">
                        <label for="js-local-body-edit-taluk">Taluk</label>
                        <select class="form-control" id="js-local-body-edit-taluk" name="taluk">
                          <option value=""> Select </option>
                        @foreach($taluk as $key => $value)
                          <option value="{{$value->_id}}"  {{ ($value->_id == $data->taluk_id) ? 'selected'  : '' }}> {{$value->name}} </option>
                        @endforeach
                        </select>
						      <span id="js-local-body-edit-taluk-error" class="error invalid-feedback"></span>
                  </div>
                  <div class="form-group">
                        <label for="js-local-body-edit-type">Type</label>
                        <select class="form-control" id="js-local-body-edit-type" name="type">
                          <option value=""> Select </option>
                          
                        @foreach(config('shoppingchallenge.LocalBodies') as $key => $value)
                           <option value="{{$key}}" {{ ($key == $data->type) ? 'selected'  : '' }}> {{$value}} </option>
                        @endforeach
                        </select>
						      <span id="js-local-body-edit-type-error" class="error invalid-feedback"></span>
                  </div>
                  <div class="form-group">
                        <label for="js-local-name-edit">Name</label>
                        <input type="text" class="form-control" id="js-local-name-edit" placeholder="Enter Name" name="name" value="{{$data->name}}">
						      <span id="js-local-name-edit-error" class="error invalid-feedback"></span>
                  </div>
                     
                  </form>
				  <div class="form-group">
                        <button class="btn btn-primary mr-2" id="js-btn-submit">Submit</button>
                        <button class="btn btn-default mr-2" id="js-btn-cancel">Cancel</button>
                  </div>
               </div>
            </div>
            <!-- END Portlet -->
         </div>
      </div>
   </div>
</div>

@endsection

@push('js')
  <script type="text/javascript" src="{{asset('assets/js/admin/edit-local-bodies.js')}}"></script>
<script>
var BASE_URL   = $("#site-url").val();
var LOCAL_BODY_LISTING_PAGE = "{{route('admin.location.local-bodies')}}";



</script>

	
@endpush