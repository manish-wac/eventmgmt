<?php
//echo '<pre>';
//print_r($event->file);
//echo '</pre>';
//exit();
//?>
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
                  <h3 class="portlet-title">Edit Event</h3>
               </div>
               <div class="portlet-body">
			   	  @include('admin.partials.messages')

                  <form action ="{{route('admin.location.event.update', ['id'=> $event->id])}}" method="POST" enctype="multipart/form-data" id="js-edit-event-form">
				  	@csrf
                    <input type="hidden" id="js-hdn-record-id" value="{{$event->id}}">
					  <div class="form-group">
                     <label for="js-country">Country</label>
                     <select class="form-control" id="js-country" name="country" readonly>
                        <option value="{{$event->country_id}}">{{$event->country->name ?? null}} </option>


                     	</select>
					 	<span id="js-country-error" class="error invalid-feedback"></span>
					 </div>

                     <div class="form-group">
                        <label for="js-state">State</label>
                        <select class="form-control" id="js-state" name="state" readonly>
                          <option value="{{$event->state_id}}"> {{$event->state->name ?? null}}</option>
                        </select>
						<span id="js-state-error" class="error invalid-feedback"></span>
                     </div>
                     <div class="form-group">
                        <label for="js-district">District</label>
                        <select class="form-control" id="js-district" name="district">
                          <option value=""> Select </option>
                          @foreach($district as $eachDistrict)
                            <option value="{{$eachDistrict->id}}" @if($eachDistrict->id == $event->district_id) selected="selected" @endif>{{$eachDistrict->name}}</option>
                          @endforeach
                        </select>
						<span id="js-district-error" class="error invalid-feedback"></span>
                     </div>

                      <div class="form-group">
                          <label for="js-taluk">Taluk</label>
                          <select class="form-control" id="js-taluk" name="taluk">
                              <option value=""> Select </option>
                              @foreach($taluk as $eachTaluk)
                                  <option value="{{$eachTaluk->id}}" @if($eachTaluk->id == $event->taluk_id) selected="selected" @endif>{{$eachTaluk->name}}</option>
                              @endforeach
                          </select>
                          <span id="js-taluk-error" class="error invalid-feedback"></span>
                      </div>


                      <div class="form-group">
                          <label for="js-city">City</label>
                          <select class="form-control" id="js-city" name="city">
                              <option value=""> Select </option>
                              @foreach($city as $eachCity)
                                  <option value="{{$eachCity->id}}" @if($eachCity->id == $event->city_id) selected="selected" @endif>{{$eachCity->name}}</option>
                              @endforeach
                          </select>
                          <span id="js-district-error" class="error invalid-feedback"></span>
                      </div>


                     <div class="form-group">
                        <label for="js-event">Event</label>
                        <input type="text" class="form-control" id="js-event" placeholder="Enter Event Name" name="title" value="{{$event->title}}">
						      <span id="js-event-error" class="error invalid-feedback"></span>
                     </div>

                      <div class="form-group">
                          <label for="js-event">Location</label>
                          <input type="text" class="form-control" id="js-event" placeholder="Enter Event Location" name="location" value="{{$event->location}}">
                          <span id="js-event-error" class="error invalid-feedback"></span>
                      </div>

                      <div class="form-group">
                          <label for="js-event">Address</label>
                          <input type="text" class="form-control" id="js-event" placeholder="Enter Event Address" name="address" value="{{$event->address}}">
                          <span id="js-event-error" class="error invalid-feedback"></span>
                      </div>

                      <div class="form-group">
                          <label for="js-event">Event From</label>
                          <input type="date" class="form-control" id="js-event" placeholder="Enter Event From" name="event_from" value="{{$event->event_from}}">
                          <span id="js-event-error" class="error invalid-feedback"></span>
                      </div>

                      <div class="form-group">
                          <label for="js-event">Event To</label>
                          <input type="date" class="form-control" id="js-event" placeholder="Enter Event To" name="event_to" value="{{$event->event_to}}">
                          <span id="js-event-error" class="error invalid-feedback"></span>
                      </div>

                      <div class="form-group">
                          <label for="js-event">Registration From</label>
                          <input type="date" class="form-control" id="js-event" placeholder="Enter Registration From" name="reg_from" value="{{$event->reg_from}}">
                          <span id="js-event-error" class="error invalid-feedback"></span>
                      </div>

                      <div class="form-group">
                          <label for="js-event">Registration To</label>
                          <input type="date" class="form-control" id="js-event" placeholder="Enter Registration To" name="reg_to" value="{{$event->reg_to}}">
                          <span id="js-event-error" class="error invalid-feedback"></span>
                      </div>

                      <div class="form-group">
                          <label for="js-event">Status</label>
                          <select name="status" id="status">
                              <?php
                              $event_status=$event->status;
                              ?>
                              <option value="0" <?php  if($event_status==0){echo 'selected';}?>>Draft</option>
                              <option value="1" <?php  if($event_status==1){echo 'selected';}?>>Registration started</option>
                              <option value="2" <?php  if($event_status==2){echo 'selected';}?>>Registration closed</option>
                              <option value="3" <?php  if($event_status==3){echo 'selected';}?>>Event completed</option>
                          </select>
                      </div>


{{--                      <div class="form-group">--}}
{{--                          <label for="js-event">Status</label>--}}
{{--                          <select class="form-control" id="js-city" name="city">--}}
{{--                              <option value=""> Select </option>--}}
{{--                              @foreach($event as $eachEvent)--}}
{{--                                  {{$eachEvent}}--}}
{{--                                  <option value="{{$eachEvent->status}}" @if($eachEvent->status == $event->status) selected="selected" @endif>{{$eachCity->status}}</option>--}}
{{--                              @endforeach--}}
{{--                          </select>--}}
{{--                          <span id="js-district-error" class="error invalid-feedback"></span>--}}
{{--                      </div>--}}


                      <div class="form-group">
                          <label for="js-event">Uploaded Image:</label>
                          <img src="{{ asset('photo/'.$event->file) }}">
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
  <script type="text/javascript" src="{{asset('assets/js/admin/edit-event.js')}}"></script>
<script>
var BASE_URL   = $("#site-url").val();
var CHECK_EVENT_UNIQUE_URL = "{{route('admin.location.event.check-unique')}}";
var EVENT_LISTING_PAGE = "{{route('admin.location.event')}}";



</script>


@endpush
