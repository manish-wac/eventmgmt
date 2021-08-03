
@extends('admin.layouts.app')
@section('headerClass','')

@push('css')

	<title>Taluk | {{env('APP_NAME')}}</title>

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
									<h3 class="portlet-title">TALUKS LIST</h3>
									<div class="col-md-6 add-new">
										<a href="{{route('admin.location.taluk.add')}}"><i style="font-size: 3em;" class="fa fa-3x fa-plus-circle"></i></a>
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

<script type="text/javascript" src="{{asset('assets/js/jquery-confirm-3.3.2.min.js')}}"></script>


<script>
var  BASE_URL = "{{url('/')}}";
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

	$(document).on('click', '.js-delete-state', function () {

		var _id = $(this).attr('data-index');
		Swal.fire({
			title: 'Are you sure, do you want to delete this taluk?',
			text: "You won't be able to revert this!",
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: BASE_URL+'/admin/location/taluk/delete/'+_id ,
					type: "DELETE",
					dataType: "json",
					success: function(result) {
						if (result.status) $('<div class="alert alert-success" id="common-alert">' + result.msg + '</div>').insertBefore($('.wrapper .content .container-fluid'));
						else $('<div class="alert alert-danger" id="common-alert">' + result.msg + '</div>').insertBefore($('.wrapper .content .container-fluid'));
						$("#js-taluk-list").DataTable().ajax.reload();
						setTimeout(function() {
							$('#common-alert').remove();
						}, 1000);
					},
					error : function (error) {
						var errorResp = error.responseJSON;
						if(errorResp) {
							$('<div class="alert alert-danger" id="common-alert">' + error.responseJSON.msg + '</div>').insertBefore($('.wrapper .content .container-fluid'));
						}
					}
				});
			}
    });

	});
});




</script>
  
	
@endpush