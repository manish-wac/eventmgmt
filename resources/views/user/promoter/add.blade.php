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
                  <h3 class="portlet-title">Add Promoter</h3>
               </div>
               <div class="portlet-body">
			   	  @include('admin.partials.messages')
                  <form action ="{{route('admin.promoter.l1-promoter.add')}}" method="POST" id="js-add-promoter-l1-form">
				  	@csrf
                    <div class="form-group">
                        <label for="js-first-name">First Name</label>
                        <input type="text" class="form-control" id="js-first-name" placeholder="Enter First Name" name="first_name">
                        <span id="js-first-name-error" class="error invalid-feedback"></span>
                    </div>
					 
                    <div class="form-group">
                        <label for="js-last-name">Last Name</label>
                        <input type="text" class="form-control" id="js-last-name" placeholder="Enter Last Name" name="last_name">
                        <span id="js-last-name-error" class="error invalid-feedback"></span>
                    </div>
                    <div class="form-group">
                        <label for="js-email">Email</label>
                        <input type="email" class="form-control" id="js-email" placeholder="Enter Mail Address" name="email">
                        <span id="js-email-error" class="error invalid-feedback"></span>
                    </div>
                    <div class="form-group">
                        <label for="js-level-type">Level</label>
                        <select class="form-control" id="js-level-type" name="level" readonly>
                          <option value=""> Select </option>
                        @foreach($promoterLevel as $key => $value)
                           <option value="{{$value->id}}" {{ ($value->name == 'L1') ? 'selected'  : '' }}> {{$value->name}} </option>
                        @endforeach
                        </select>
                        <span id="js-level-type-error" class="error invalid-feedback"></span>
                    </div>
                    <div class="form-group">
                     <label for="js-promoter-l1-country">Country</label>
                     <select class="form-control" id="js-promoter-l1-country" name="country" readonly>
                        <option value="">Select </option>
                        @foreach($country as $eachCountry)
                          <option value="{{$eachCountry->id}}" {{ ($eachCountry->name == 'India') ? 'selected'  : '' }}>{{$eachCountry->name}}</option>
                        @endforeach
                     	</select>
					 	          <span id="js-promoter-l1-country-error" class="error invalid-feedback"></span>
					          </div>
                    <div class="form-group">
                        <label for="js-promoter-l1-state">State</label>
                        <select class="form-control" id="js-promoter-l1-state" name="state">
                          <option value=""> Select </option>
                        </select>
						<span id="js-promoter-l1-state-error" class="error invalid-feedback"></span>
                    </div>
                    <div class="form-group">
                        <label for="js-promoter-l1-district">District</label>
                        <select class="form-control" id="js-promoter-l1-district" name="district">
                          <option value=""> Select </option>
                        </select>
						<span id="js-promoter-l1-district-error" class="error invalid-feedback"></span>
                    </div>
                    <div class="form-group">
                        <label for="js-promoter-l1-taluk">Taluk</label>
                        <select class="form-control" id="js-promoter-l1-taluk" name="taluk">
                          <option value=""> Select </option>
                        </select>
						<span id="js-promoter-l1-taluk-error" class="error invalid-feedback"></span>
                    </div>
                    <div class="form-group">
                        <label for="js-promoter-l1-country-code">Country Code</label>
                        <select class="form-control" id="js-promoter-l1-country-code" name="country_code" readonly>
                          <option value="+91"> +91 </option>
                        </select>
						<span id="js-promoter-l1-country-code-error" class="error invalid-feedback"></span>
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
  <script type="text/javascript" src="{{asset('assets/js/admin/add-promoter.js')}}"></script>
<script>
var BASE_URL   = $("#site-url").val();
var LOCAL_BODY_LISTING_PAGE = "{{route('admin.location.local-bodies')}}";



</script>

	
@endpush