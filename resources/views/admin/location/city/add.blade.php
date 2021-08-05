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
                  <h3 class="portlet-title">Add City</h3>
               </div>
               <div class="portlet-body">
			   	  @include('admin.partials.messages')
                  <form action ="{{route('admin.location.city.addsubmit')}}" method="POST" id="js-add-city-form">
				  	@csrf
					  <div class="form-group">
                     <label for="js-country">Country</label>
                     <select class="form-control" id="js-country" name="country">
                        <option value="">Select </option>
						@foreach($country as $eachCountry)
							<option value="{{$eachCountry->id}}">{{$eachCountry->name}} </option>

						@endforeach

                     	</select>
					 	<span id="js-country-error" class="error invalid-feedback"></span>
					 </div>

                     <div class="form-group">
                        <label for="js-state">State</label>
                        <select class="form-control" id="js-state" name="state">
                          <option value=""> Select </option>
                        </select>
						<span id="js-state-error" class="error invalid-feedback"></span>
                     </div>
                     <div class="form-group">
                        <label for="js-district">District</label>
                        <select class="form-control" id="js-district" name="district">
                          <option value=""> Select </option>
                        </select>
						<span id="js-district-error" class="error invalid-feedback"></span>
                     </div>

                      <div class="form-group">
                          <label for="js-taluk">Taluk</label>
                          <select class="form-control" id="js-taluk" name="taluk">
                              <option value=""> Select </option>
                          </select>
                          <span id="js-district-error" class="error invalid-feedback"></span>
                      </div>



                     <div class="form-group">
                        <label for="js-city">City</label>
                        <input type="text" class="form-control" id="js-city" placeholder="Enter City Name" name="city">
						      <span id="js-city-error" class="error invalid-feedback"></span>
                     </div>

                  </form>
				  <div class="form-group">
                        <button class="btn btn-primary mr-2" id="js-btn-submit">Submit</button>
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
  <script type="text/javascript" src="{{asset('assets/js/admin/add-city.js')}}"></script>
<script>
var BASE_URL   = $("#site-url").val();
var CHECK_CITY_UNIQUE_URL = "{{route('admin.location.city.check-unique')}}";
var CITY_LISTING_PAGE = "{{route('admin.location.city')}}";



</script>


@endpush
