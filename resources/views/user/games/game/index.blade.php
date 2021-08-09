
@extends('admin.layouts.app')
@section('headerClass','')

@push('css')

	<title>Local Bodies | {{env('APP_NAME')}}</title>

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
									<h3 class="portlet-title">LOCAL BODIES LIST</h3>
									<div class="col-md-6 add-new">
										<a href="{{route('admin.location.local-bodies.add')}}"><i style="font-size: 3em;" class="fa fa-3x fa-plus-circle"></i></a>
									</div>
								</div>
                
								<div class="portlet-body">
									
									<!-- BEGIN Datatable -->
									<table id="js-games-list" class="table table-bordered table-striped table-hover">
										<thead>
											<tr>
                        						<th>ID</th>
												<th>Name</th>
                                                <th>Code</th>
                                                <th>Date</th>
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
<script type="text/javascript" src="{{asset('assets/js/admin/index-local-bodies.js')}}"></script>

<script>
 $(function () {    
            var table = $('#js-games-list').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.games.games-list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
				{data: 'name', name: 'name', class:'name'},
                {data: 'type', name: 'type', class:'type'},
                {data: 'district.name', name: 'district_name', class:'district_name'},
                {data: 'action', width: 'auto', name: 'action', orderable: false, searchable: false},
            ]
        });
    });

</script>
  
	
@endpush