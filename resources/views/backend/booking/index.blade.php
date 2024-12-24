@extends('backend.layouts.app')
@section('booking','active')
@section('content')
<main class="content">
				<div class="container-fluid p-0">
					<div class="d-flex justify-content-between"> 
						<h1 class="h3"><strong>Booking Table</strong></h1>
						<div class="py-3">
							<a href="{{ route('booking.create') }}" class="btn btn-secondary">Booking Create <i class="align-middle" data-feather="plus-circle"></i></a>
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
													<th style="">Package Name</th>
													<th style="">Number of person</th>
													<th style="">User Info</th>
													<th style="">Date Of Travel</th>
													<th style="">Payment</th>
													<th style="">Booking Date</th>
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

			ajax: "{{ route('booking.index') }}",

			order: [
				[6,'desc']
			],

			columns: [
				{data: 'id', name: 'id',class:'text-center'},

				{data: 'package_name', name: 'package_name',class:'text-center'},

				{data: 'number_of_person', name: 'number_of_person',class:'text-center'},

				{data: 'user_name', name: 'user_name',class:'text-center'},

				{data: 'date_of_travel', name: 'date_of_travel',class:'text-center',searchable: false,sortable:false},

				{data: 'payment_method', name: 'payment_method',class:'text-center'},

				{data: 'booking_date', name: 'booking_date',class:'text-center',searchable: false,sortable:false},

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
                          url : '/admin/booking/' + id,
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