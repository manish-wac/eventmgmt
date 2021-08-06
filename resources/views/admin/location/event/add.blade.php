@extends('admin.layouts.app')
@section('headerClass','')




@push('css')

	<title>Country | {{env('APP_NAME')}}</title>
    <link href="{{asset('assets/css/jquery.comiseo.daterangepicker.css')}}" rel="stylesheet">
@endpush
@section('content')

<div class="content ">
   <div class="container-fluid">
      <div class="row">
         <div class="col-6">
            <!-- BEGIN Portlet -->
            <div class="portlet">
               <div class="portlet-header portlet-header-bordered">
                  <h3 class="portlet-title">Add Event</h3>
               </div>
               <div class="portlet-body">
			   	  @include('admin.partials.messages')
{{--                  <form action ="{{route('admin.location.event.addsubmit')}}" method="POST" id="js-add-event-form" enctype="multipart/form-data">--}}
                      <form method="POST" class="panel-body" id="js-add-event-form" action="{{route('admin.location.event.addsubmit')}}" enctype="multipart/form-data">
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
                              <span id="js-taluk-error" class="error invalid-feedback"></span>
                          </div>

                      <div class="form-group">
                          <label for="js-city">City</label>
                          <select class="form-control" id="js-city" name="city">
                              <option value=""> Select </option>
                          </select>
                          <span id="js-city-error" class="error invalid-feedback"></span>
                      </div>

                     <div class="form-group">
                        <label for="js-event">Event</label>
                        <input type="text" class="form-control" id="js-event" placeholder="Enter Event Title" name="title" value="{{old('title')}}">
						      <span id="js-event-error" class="error invalid-feedback"></span>
                     </div>

                      <div class="form-group">
                          <label for="js-event">Location</label>
                          <input type="text" class="form-control" id="js-event" placeholder="Enter Event Location" name="location" value="{{old('location')}}">
                          <span id="js-event-error" class="error invalid-feedback"></span>
                      </div>

                      <div class="form-group">
                          <label for="js-event">Address</label>
                          <input type="text" class="form-control" id="js-event" placeholder="Enter Event Address" name="address" value="{{old('address')}}">
                          <span id="js-event-error" class="error invalid-feedback"></span>
                      </div>

                      <div class="form-group">
                          <label for="js-event">Select Event Range From - To</label>
                          <input class="form-control" id="eventrange" name="eventrange" value="{{old('eventrange')}}">
                          <span id="js-event-error" class="error invalid-feedback"></span>
                      </div>

                    <div class="form-group">
                         <label for="js-event">Select Registration Range From - To</label>
                          <input class="form-control" id="regrange" name="regrange" value="{{old('regrange')}}">
                           <span id="js-event-error" class="error invalid-feedback"></span>
                      </div>

{{--                          <div class="form-group">--}}
{{--                              <label for="js-event">Event From</label>--}}
{{--                              <input type="date" class="form-control" id="js-event" placeholder="Enter Event From" name="event_from" value="{{old('event_from')}}">--}}
{{--                              <span id="js-event-error" class="error invalid-feedback"></span>--}}
{{--                          </div>--}}


{{--                      <div class="form-group">--}}
{{--                          <label for="js-event">Event To</label>--}}
{{--                          <input type="date" class="form-control" id="js-event" placeholder="Enter Event To" name="event_to" value="{{old('event_to')}}">--}}
{{--                          <span id="js-event-error" class="error invalid-feedback"></span>--}}
{{--                      </div>--}}

{{--                      <div class="form-group">--}}
{{--                          <label for="js-event">Registration From</label>--}}
{{--                          <input type="date" class="form-control" id="js-event" placeholder="Enter Registration From" name="reg_from" value="{{old('reg_from')}}">--}}
{{--                          <span id="js-event-error" class="error invalid-feedback"></span>--}}
{{--                      </div>--}}

{{--                      <div class="form-group">--}}
{{--                          <label for="js-event">Registration To</label>--}}
{{--                          <input type="date" class="form-control" id="js-event" placeholder="Enter Registration To" name="reg_to" value="{{old('reg_to')}}">--}}
{{--                          <span id="js-event-error" class="error invalid-feedback"></span>--}}
{{--                      </div>--}}

                      <div class="form-group">
                          <label for="js-event">Status</label>
                          <select name="status" id="status" class="form-control">
                              <option value="0">Draft</option>
                              <option value="1">Registration started</option>
                              <option value="2">Registration closed</option>
                              <option value="3">Event completed</option>
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="js-event">Select logo to upload:</label>
{{--                      <input type="file" name="logo" id="logo">--}}
                          <input name="file" type="file" accept="image/png, image/jpg, image/jpeg">
                      </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-primary mr-2" id="js-btn-submit">Submit</button>
                          </div>
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
  <script type="text/javascript" src="{{asset('assets/js/admin/add-event.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/jquery.comiseo.daterangepicker.js')}}"></script>
  <script>
      $(function() { $("#eventrange").daterangepicker(); });
      $(function() { $("#regrange").daterangepicker(); });
  </script>
  <script>
var BASE_URL   = $("#site-url").val();
var CHECK_EVENT_UNIQUE_URL = "{{route('admin.location.event.check-unique')}}";
var EVENT_LISTING_PAGE = "{{route('admin.location.event')}}";



</script>


@endpush
