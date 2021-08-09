
@extends('admin.layouts.app')
@section('headerClass','')

@push('css')

	<title>Country | {{env('APP_NAME')}}</title>

@endpush
@section('content')

    <!-- BEGIN Page Content -->
			<div class="content ">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<!-- BEGIN Portlet -->
							<div class="portlet">
								<div class="portlet-header portlet-header-bordered">
									<h3 class="portlet-title">Datatable column rendering</h3>
                  <div class="col-md-6 add-new">
                    <a data-target="#add-new-country" data-toggle="modal"><i style="font-size: 3em;" class="fa fa-3x fa-plus-circle"></i></a>
                  </div>
								</div>
                
								<div class="portlet-body">
								Will update soon
									<!-- BEGIN Datatable -->
									{{--<table id="country-list" class="table table-bordered table-striped table-hover">
										<thead>
											<tr>
                        <th>ID</th>
												<th>Country</th>
												<th>Code</th>
												<th>Action</th>
																							
											</tr>
										</thead>
										<tbody>
										<!-- data appending here -->
                                        </tbody>
									</table> --}}
									<!-- END Datatable -->
								</div>
							</div>
							<!-- END Portlet -->
						</div>
					</div>
				</div>
			</div>
			<!-- END Page Content -->
      <!-- begin::Default Js files include -->
      @include('admin.layouts.footer')
      <!-- END: Default Js files include -->
  </div>
  <!-- BEGIN Modal -->
  <div class="modal fade" id="add-new-country">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Country</h5>					
					<button type="button" class="btn btn-icon" data-dismiss="modal">
						<i class="fa fa-times"></i>
					</button>
					
				</div>
				<form action="{{ route('admin.location.add-new-country') }}" id="add-new-country-form" method="POST">
                    @csrf
					<input type="hidden" id="country-session" value="{{Session::get('country-fail') || Session::get('country-success') || $errors->has('js_country_code') || $errors->has('js_country_name')}}"/>
					<div class="results">
            @if(Session::get('country-fail'))
							
							<div class="alert alert-danger">
								{{ Session::get('country-fail')}}
							</div>
            @endif

						@if(Session::get('country-success'))
							
							<div class="alert alert-success">
								{{ Session::get('country-success')}}  
							</div>
            @endif

          </div>

					<div class="modal-body">
						<!-- BEGIN Form Group -->
						<div class="form-group">
							<div class="float-label float-label-lg">
								<input class="form-control form-control-lg @error('js_country_code') {{'is-invalid'}} @enderror" type="text" id="js-country-code" name="js_country_code" placeholder="Please insert your email" value="{{old('js_country_code')}}">
								<label for="js-country-code">Country Code*: </label>                                                
							</div>
              <span class="text-danger">@error('js_country_code') {{$message}} @enderror</span>
						</div>
            <div class="form-group">
							<div class="float-label float-label-lg">
								<input class="form-control form-control-lg @error('js_country_name') {{'is-invalid'}} @enderror" type="text" id="js-country-name" name="js_country_name" placeholder="Please insert your email" value="{{old('js_country_name')}}">
								<label for="js-country-name">Country Name*: </label>                                                
							</div>
              <span class="text-danger">@error('js_country_name') {{$message}} @enderror</span>
						</div>

							<!-- END Form Group -->
						
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary mr-2">Submit</button>
						{{-- <button class="btn btn-outline-danger">Reset</button> --}}
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- END Modal -->
  <!-- BEGIN Modal -->
  <div class="modal fade" id="edit-country">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Update Country Details</h5>					
					<button type="button" class="btn btn-icon" data-dismiss="modal">
						<i class="fa fa-times"></i>
					</button>
					
				</div>
				<form action="{{ route('admin.location.update-country-details') }}" id="js-update-country-details" method="POST">
                    @csrf
					<input type="hidden" id="country-session" value="{{Session::get('country-update-fail') || Session::get('country-update-success') || $errors->has('js_update_cn_code') || $errors->has('js_update_cn_name') || $errors->has('collection_id')}}"/>
					<div class="results">
            @if(Session::get('country-update-fail') || $errors->has('collection_id'))
							
							<div class="alert alert-danger">
              {{$errors->has('collection_id') ? 'Something went wrong. Try again later.' : Session::get('country-update-fail')}}
							</div>
            @endif

						@if(Session::get('country-update-success'))
							
							<div class="alert alert-success">
								{{ Session::get('country-update-success')}}  
							</div>
            @endif

          </div>

					<div class="modal-body">
						<!-- BEGIN Form Group -->
						<div class="form-group">
							<div class="float-label float-label-lg">
								<input class="form-control form-control-lg @error('js_update_cn_code') {{'is-invalid'}} @enderror" type="text" id="js-update-cn-code" name="js_update_cn_code" placeholder="Please insert your email" value="{{old('js_update_cn_code')}}">
								<label for="js-country-code">Country Code*: </label>                                                
							</div>
              <span class="text-danger">@error('js_update_cn_code') {{$message}} @enderror</span>
						</div>
            <div class="form-group">
							<div class="float-label float-label-lg">
								<input class="form-control form-control-lg @error('js_update_cn_name') {{'is-invalid'}} @enderror" type="text" id="js-update-cn-name" name="js_update_cn_name" placeholder="Please insert your email" value="{{old('js_update_cn_name')}}">
								<label for="js-country-name">Country Name*: </label>                                                
							</div>
              <span class="text-danger">@error('js_update_cn_name') {{$message}} @enderror</span>
						</div>
            <input type="hidden" id="collection_id" name="collection_id" class="form-control form-control-lg"/>
							<!-- END Form Group -->
						
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary mr-2">Submit</button>
						{{-- <button class="btn btn-outline-danger">Reset</button> --}}
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- END Modal -->
@push('js')
  
	<script type="text/javascript" src="{{asset('assets/theme/app/datatable/advanced/column-rendering.js')}}"></script>
	
    <script>
        $(function () {    
            // var table = $('#country-list').DataTable({
            // processing: true,
            // serverSide: true,
            // ajax: "{{ route('admin.auth.country') }}",
            // columns: [
            //     {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            //     {data: 'name', name: 'name', class:'country_name'},
            //     {data: 'sortcode', name: 'sortcode', class:'country_code'},
            //     {data: 'action', width: 'auto', name: 'action', orderable: false, searchable: false},
            // ]
        	// });
        
        });
    </script>
  <script type="text/javascript" src="{{asset('assets/js/jquery-confirm-3.3.2.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/location-country.js')}}"></script>
@endpush

@endsection