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
                  <form action ="{{route('admin.location.merchant-unit.addsubmit')}}" method="POST" id="js-add-merchant-unit-form">
				  	@csrf
					  <div class="form-group">
                     <label for="js-merchant-unit-country">Country</label>
                     <select class="form-control" id="js-merchant-unit-country" name="country">
                        <option value="">Select </option>
						@foreach($country as $eachCountry)
							<option value="{{$eachCountry->id}}">{{$eachCountry->name}} </option>

						@endforeach
                      
                     	</select>
					 	<span id="js-merchant-unit-country-error" class="error invalid-feedback"></span>
					 </div>
					 
                     <div class="form-group">
                        <label for="js-merchant-unit-state">State</label>
                        <select class="form-control" id="js-merchant-unit-state" name="state">
                          <option value=""> Select </option>
                        </select>
						<span id="js-merchant-unit-state-error" class="error invalid-feedback"></span>
                     </div>
                     <div class="form-group">
                        <label for="js-merchant-unit-district">District</label>
                        <select class="form-control" id="js-merchant-unit-district" name="district">
                          <option value=""> Select </option>
                        </select>
						<span id="js-merchant-unit-district-error" class="error invalid-feedback"></span>
                     </div>
                     <div class="form-group">
                        <label for="js-merchant-unit-taluk">Taluk</label>
                        <select class="form-control" id="js-merchant-unit-taluk" name="taluk">
                          <option value=""> Select </option>
                        </select>
						<span id="js-merchant-unit-taluk-error" class="error invalid-feedback"></span>
                     </div>
                  <div class="form-group">
                        <label for="s-merchant-unit-local-body">Local Body</label>
                        <select class="form-control" id="js-merchant-unit-local-body" name="local_body">
                          <option value=""> Select </option>
                        </select>
						<span id="s-merchant-unit-local-body-error" class="error invalid-feedback"></span>
                  </div>
                  <div class="form-group">
                        <label for="js-taluk">Name</label>
                        <input type="text" class="form-control" id="js-local-name" placeholder="Enter Name" name="name">
						      <span id="js-local-name-error" class="error invalid-feedback"></span>
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
  <script type="text/javascript" src="{{asset('assets/js/admin/add-merchant-unit.js')}}"></script>
<script>
var BASE_URL   = $("#site-url").val();
var CHECK_MERCHANT_UNIQUE_URL = "{{route('admin.location.merchant-unit.check-unique')}}";
var MERCHANT_UNIT_LISTING_PAGE = "{{route('admin.location.merchant-unit')}}";



</script>

	
@endpush