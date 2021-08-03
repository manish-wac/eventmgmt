
@extends('admin.layouts.app')
@section('headerClass','')

@push('css')

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
									<h3 class="portlet-title">DISTRICT LIST</h3>
									<div class="col-md-6 add-new">
										<a data-target="#add-new-district" data-toggle="modal"><i style="font-size: 3em;" class="fa fa-3x fa-plus-circle"></i></a>
									</div>
								</div>
                
								<div class="portlet-body">
									<!-- BEGIN Datatable -->
									<table id="district-list" class="table table-bordered table-striped table-hover">
										<thead>
											<tr>
                        						<th>ID</th>
												<th>District</th>
												<th>State</th>
												<th>Country</th>
												<th>Action</th>																							
											</tr>
										</thead>
										<tbody>
										<!-- data appending here -->
                                        </tbody>
									</table>
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
  <div class="modal fade" id="add-new-district">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add New District</h5>					
					<button type="button" class="btn btn-icon" data-dismiss="modal">
						<i class="fa fa-times"></i>
					</button>
					
				</div>
				{{ Form::open(['url' => '', 'id' => 'add-new-district-form', 'class' => 'form-horizontal add-new-district-form'])  }}
					<div class="results">
						

          			</div>

					<div class="modal-body">
						<!-- BEGIN Form Group -->
						<div class="form-group">
							<!-- BEGIN Float Label -->
							<div class="float-label float-label-lg">
								<select id="country" name="js_country_id" class="form-control form-control-lg">
									<option value="" selected="selected" disabled>Choose country</option>
									@foreach($country as $key => $value)
										<option value="{{$value['_id']}}">{{$value['name']}}</option>
									@endforeach
								</select>
								<label for="country">Country*</label>
							</div>
							<span class="error invalid-feedback"></span>
							<!-- END Float Label -->
						</div>
						<div class="form-group">
							<!-- BEGIN Float Label -->
							<div class="float-label float-label-lg country-not-selected">
								<select id="state" name="js_state_id" class="form-control form-control-lg ">
									<option value="" selected="selected" disabled>Choose state</option>

									<!-- state data will append here through jquery -->
								</select>
								<label for="state">State*</label>
							</div>
							<span class="error invalid-feedback"></span>
							<!-- END Float Label -->
						</div>
            			<div class="form-group">
							<div class="float-label float-label-lg country-not-selected">
								<input class="form-control form-control-lg" type="text" id="js-district-name" name="js_district_name" placeholder=" ">
								<label for="js-district-name">District Name* </label>                                                
							</div>
              				<span class="error invalid-feedback"></span>
						</div>
							<!-- END Form Group -->						
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary mr-2">Submit</button>
						{{-- <button class="btn btn-outline-danger">Reset</button> --}}
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<!-- END Modal -->
  <!-- BEGIN Modal -->
  <div class="modal fade" id="update-district">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Update District Details</h5>					
					<button type="button" class="btn btn-icon" data-dismiss="modal">
						<i class="fa fa-times"></i>
					</button>
					
				</div>
				{{ Form::open(['url' => '', 'id' => 'update-district-form', 'class' => 'form-horizontal update-district-form'])  }}
					<div class="results">
						

          			</div>

					<div class="modal-body">
						<!-- BEGIN Form Group -->
						<div class="form-group">
							<!-- BEGIN Float Label -->
							<div class="float-label float-label-lg">
								<select id="country" name="js_country_id" class="form-control form-control-lg">
									<option value="" selected="selected" disabled>Choose country</option>
									@foreach($country as $key => $value)
										<option value="{{$value['_id']}}">{{$value['name']}}</option>
									@endforeach
								</select>
								<label for="country">Country*</label>
							</div>
							<span class="error invalid-feedback"></span>
							<!-- END Float Label -->
						</div>
						<div class="form-group">
							<!-- BEGIN Float Label -->
							<div class="float-label float-label-lg">
								<select id="state" name="js_state_id" class="form-control form-control-lg ">
									<option value="" selected="selected" disabled>Choose state</option>
									<!-- state data will append here through jquery -->
								</select>
								<label for="state">State*</label>
							</div>
							<span class="error invalid-feedback"></span>
							<!-- END Float Label -->
						</div>
            			<div class="form-group">
							<div class="float-label float-label-lg">
								<input class="form-control form-control-lg" type="text" id="js-district-name" name="js_district_name" placeholder=" ">
								<label for="js-district-name">District Name* </label>                                                
							</div>
              				<span class="error invalid-feedback"></span>
						</div>
						<!-- END Form Group -->
						<input class="form-control" type="hidden" id="js-district-code" name="js_district_code">
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary mr-2">Update</button>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<!-- END Modal -->
  <!-- BEGIN Modal -->
  @push('js')
    <script>
        $(function () {    
            var table = $('#district-list').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.auth.district-list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name', class:'district'},
                {data: 'state.name', name: 'state_name', class:'state_name'},
                {data: 'country.name', name: 'country_name', class:'country_name'},
                {data: 'action', width: 'auto', name: 'action', orderable: false, searchable: false},
            ]
        });
        
        });
    </script>
  <script type="text/javascript" src="{{asset('assets/js/jquery-confirm-3.3.2.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/location-district.js')}}"></script>
@endpush

@endsection