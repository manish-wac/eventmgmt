@extends('admin.layouts.app')
@section('headerClass','')

@push('css')

	<title>Merchant Unit | {{env('APP_NAME')}}</title>

@endpush
@section('content')

<div class="content ">
   <div class="container-fluid">
      <div class="row">
         <div class="col-6">
            <!-- BEGIN Portlet -->
            <div class="portlet">
               <div class="portlet-header portlet-header-bordered">
                  <h3 class="portlet-title">Add Local Bodies</h3>
               </div>
               <div class="portlet-body">
			   	  @include('admin.partials.messages')
                  <form method="POST" id="js-edit-merchant-unit-form">
				  	@csrf
					  <div class="form-group">
                     <label for="js-merchant-unit-edit-country">Country</label>
                     <select class="form-control" id="js-merchant-unit-edit-country" name="country" readonly="readonly">
                        <option value="{{$data->country_id}}" selected>{{$data->country->name}} </option>
                     	</select>
					 	<span id="js-merchant-unit-edit-country-error" class="error invalid-feedback"></span>
					 </div>
					 
                     <div class="form-group">
                        <label for="js-merchant-unit-edit-state">State</label>
                        <select class="form-control" id="js-merchant-unit-edit-state" name="state" readonly="readonly">
                        <option value="{{$data->state_id}}" selected>{{$data->state->name}} </option>
                        </select>
						<span id="js-merchant-unit-edit-state-error" class="error invalid-feedback"></span>
                     </div>
                     <div class="form-group">
                        <label for="js-merchant-unit-edit-district">District</label>
                        <select class="form-control" id="js-merchant-unit-edit-district" name="district" readonly="readonly">
                        <option value="{{$data->district_id}}" selected>{{$data->district->name}} </option>
                        </select>
						<span id="js-merchant-unit-edit-district-error" class="error invalid-feedback"></span>
                     </div>
                     <div class="form-group">
                        <label for="js-merchant-unit-edit-taluk">Taluk</label>
                        <select class="form-control" id="js-merchant-unit-edit-taluk" name="taluk" readonly="readonly">
                        <option value="{{$data->taluk_id}}" selected>{{$data->taluk->name}} </option>
                        </select>
						<span id="js-merchant-unit-edit-taluk-error" class="error invalid-feedback"></span>
                     </div>
                  <div class="form-group">
                        <label for="s-merchant-unit-local-body">Local Body</label>
                        <select class="form-control" id="js-merchant-unit-edit-local-body" name="local_body">
                        @foreach($localbodie as $key => $value)
                          <option value="{{$value->_id}}"  {{ ($value->name == $data->local_body) ? 'selected'  : '' }}> {{$value->name}} </option>
                        @endforeach
                        </select>
						<span id="s-merchant-unit-local-body-error" class="error invalid-feedback"></span>
                  </div>
                  <div class="form-group">
                        <label for="js-taluk">Name</label>
                        <input type="text" class="form-control" id="js-local-name" placeholder="Enter Name" name="name" value="{{$data->name}}">
						      <span id="js-local-name-error" class="error invalid-feedback"></span>
                  </div>
                     
                  </form>
				  <div class="form-group">
                        <button class="btn btn-primary mr-2" id="js-btn-submit-merchant-unit">Submit</button>
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
  <script type="text/javascript" src="{{asset('assets/js/admin/edit-merchant-unit.js')}}"></script>
<script>
var BASE_URL   = $("#site-url").val();
var CHECK_MERCHANT_UNIQUE_URL  = "{{route('admin.location.merchant-unit.check-unique')}}";
var MERCHANT_UNIT_LISTING_PAGE = "{{route('admin.location.merchant-unit')}}";



</script>

	
@endpush