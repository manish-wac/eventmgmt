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
                  <h3 class="portlet-title">Add Local Bodies</h3>
               </div>
               <div class="portlet-body">
			   	  @include('admin.partials.messages')
                  <form action ="{{route('admin.location.local-bodies.addsubmit')}}" method="POST" id="js-add-local-bodies-form">
				  	@csrf
					  <div class="form-group">
                     <label for="js-local-body-country">Country</label>
                     <select class="form-control" id="js-local-body-country" name="country">
                        <option value="">Select </option>
						@foreach($country as $eachCountry)
							<option value="{{$eachCountry->id}}">{{$eachCountry->name}} </option>

						@endforeach
                      
                     	</select>
					 	<span id="js-local-body-country-error" class="error invalid-feedback"></span>
					 </div>
					 
                     <div class="form-group">
                        <label for="js-local-body-state">State</label>
                        <select class="form-control" id="js-local-body-state" name="state">
                          <option value=""> Select </option>
                        </select>
						<span id="js-local-body-state-error" class="error invalid-feedback"></span>
                     </div>
                     <div class="form-group">
                        <label for="js-local-body-district">District</label>
                        <select class="form-control" id="js-local-body-district" name="district">
                          <option value=""> Select </option>
                        </select>
						<span id="js-local-body-district-error" class="error invalid-feedback"></span>
                     </div>
                     <div class="form-group">
                        <label for="js-local-body-taluk">Taluk</label>
                        <select class="form-control" id="js-local-body-taluk" name="taluk">
                          <option value=""> Select </option>
                        </select>
						<span id="js-local-body-taluk-error" class="error invalid-feedback"></span>
                     </div>
                  <div class="form-group">
                        <label for="js-local-body-type">Type</label>
                        <select class="form-control" id="js-local-body-type" name="type">
                          <option value=""> Select </option>
                        @foreach(config('shoppingchallenge.LocalBodies') as $key => $value)
                           <option value="{{$key}}"> {{$value}} </option>
                        @endforeach
                        </select>
						     <span id="js-local-body-type-error" class="error invalid-feedback"></span>
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
  <script type="text/javascript" src="{{asset('assets/js/admin/add-local-bodies.js')}}"></script>
<script>
var BASE_URL   = $("#site-url").val();
var LOCAL_BODY_LISTING_PAGE = "{{route('admin.location.local-bodies')}}";



</script>

	
@endpush