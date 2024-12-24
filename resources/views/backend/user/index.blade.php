@extends('backend.layouts.app')
@section('user','active')
@section('content')
<main class="content">
				<div class="container-fluid p-0">
					<div class="d-flex justify-content-between"> 
						<h1 class="h3"><strong>User Table</strong></h1>
						<div class="py-3">
							<a href="{{ route('user-account.create') }}" class="btn btn-secondary">User Create <i class="align-middle" data-feather="plus-circle"></i></a>
						</div>
					</div>
                    <div class="">
						<div class="card">
							<div class="card-body">
									<div class = "p-2">
										<table class = "table table-hover" id="data-table" style="width:100%;">
											<thead>
												<tr>
												    <th style="">No</th>
													<th style="">User Name</th>
													<th style="">Email</th>
													<th style="">Phone</th>
													<th style="">Gender</th>
													<th style="">Joined Date</th>
													<th style="">Updated Date</th>
													<th style="">Actions</th>													
												</tr>
											</thead>
											<tbody class = "">
											</tbody>
										</table>
									</div>
							</div>
						</div>
					</div>				
				</div>
</main> 
@endsection
@push('script')
<script type="text/javascript">

		$(function () {

		var table = new DataTable('#data-table',{
			
			scrollX: true,

			processing: true,

			serverSide: true,

			ajax: "{{ route('user-account.index') }}",

			order: [
				[6,'desc']
			],

			columns: [

				{data: 'id', name: 'id',class:'text-center'},

				{data: 'name', name: 'name',class:'text-center'},

				{data: 'email', name: 'email',class:'text-center'},

				{data: 'phone', name: 'phone',class:'text-center'},

				{data: 'gender', name: 'gender',class:'text-center'},

				{data: 'created_at', name: 'created_at',class:'text-center',searchable: false,sortable:false},

				{data: 'updated_at', name: 'updated_at',class:'text-center',searchable: false,sortable:false},

				{data: 'action', name: 'action',class:'text-center',searchable: false,sortable:false},
				
			]
		}); 
		$(document).on('click','.delete',function(e){
			e.preventDefault();
			var id = $(this).data('id');
			Swal.fire({
				title: 'Are you sure,you want to delete?',
				showCancelButton: true,
				confirmButtonText: 'Confirm',
				}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
                          url : '/admin/user-account/' + id,
						  type : 'DELETE',
						  success : function(){
							table.ajax.reload();
						  }
					});
				}
				})
		});
		
		});
</script>
@endpush