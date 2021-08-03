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
                  <h3 class="portlet-title">Edit Taluk</h3>
               </div>
               <div class="portlet-body">
			   	  @include('admin.partials.messages')
                   
                  <form action ="{{route('admin.location.taluk.update', ['id'=> $taluk->id])}}" method="POST" id="js-edit-taluk-form">
				  	@csrf
                    <input type="hidden" id="js-hdn-record-id" value="{{$taluk->id}}"> 
					  <div class="form-group">
                     <label for="js-country">Country</label>
                     <select class="form-control" id="js-country" name="country" readonly>
                        <option value="{{$taluk->country_id}}">{{$taluk->country->name ?? null}} </option>
						
                      
                     	</select>
					 	<span id="js-country-error" class="error invalid-feedback"></span>
					 </div>
					 
                     <div class="form-group">
                        <label for="js-state">State</label>
                        <select class="form-control" id="js-state" name="state" readonly>
                          <option value="{{$taluk->state_id}}"> {{$taluk->state->name ?? null}}</option>
                        </select>
						<span id="js-state-error" class="error invalid-feedback"></span>
                     </div>
                     <div class="form-group">
                        <label for="js-district">District</label>
                        <select class="form-control" id="js-district" name="district">
                          <option value=""> Select </option>
                          @foreach($district as $eachDistrict)
                            <option value="{{$eachDistrict->id}}" @if($eachDistrict->id == $taluk->district_id) selected="selected" @endif>{{$eachDistrict->name}}</optiom>
                          @endforeach
                        </select>
						<span id="js-district-error" class="error invalid-feedback"></span>
                     </div>
                     <div class="form-group">
                        <label for="js-taluk">Taluk</label>
                        <input type="text" class="form-control" id="js-taluk" placeholder="Enter Taluk Name" name="taluk" value="{{$taluk->name}}">
						      <span id="js-taluk-error" class="error invalid-feedback"></span>
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
  <script type="text/javascript" src="{{asset('assets/js/admin/edit-taluk.js')}}"></script>
<script>
var BASE_URL   = $("#site-url").val();
var CHECK_TALUK_UNIQUE_URL = "{{route('admin.location.taluk.check-unique')}}";
var TALUK_LISTING_PAGE = "{{route('admin.location.taluk')}}";



</script>

	
@endpush