
@extends('admin.layouts.app')
@section('headerClass','')

@push('css')

	<title>Promoter | {{env('APP_NAME')}}</title>

@endpush
@section('content')
    @include('admin.partials.messages')
    <div class="content ">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<!-- BEGIN Portlet -->
							<div class="portlet">
								<div class="portlet-header portlet-header-bordered">
									<h3 class="portlet-title">L1 Promoter List</h3>
									<div class="col-md-6 add-new">
										<a href="{{route('admin.promoter.l1-promoter.add')}}"><i style="font-size: 3em;" class="fa fa-3x fa-plus-circle"></i></a>
									</div>
								</div>
                
								<div class="portlet-body">
									
									<!-- BEGIN Datatable -->
									<table id="js-taluk-list" class="table table-bordered table-striped table-hover">
										<thead>
											<tr>
                        						<th>ID</th>
                                                <th>Taluk</th>
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

@endsection

@push('js')

<script>
 $(function () {    
            var table = $('#js-taluk-list').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.location.taluk.datatable') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name', class:'state_name'},
                {data: 'district.name', name: 'district_name', class:'district_name'},
                {data: 'state.name', name: 'state_name', class:'state_name'},
                {data: 'country.name', name: 'country_name', class:'country_name'},
                {data: 'action', width: 'auto', name: 'action', orderable: false, searchable: false},
            ]
        });
    });

</script>
  
	
@endpush