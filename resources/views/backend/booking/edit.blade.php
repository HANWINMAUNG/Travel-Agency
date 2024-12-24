@extends('backend.layouts.app')
@section('booking','active')
@section('content')
<main class="content">
				<div class="container-fluid p-0">
					<div class="d-flex justify-content-between">
                        <h1 class="h3 mb-3"><strong>Booking Edit Form</strong></h1>
                        <div class="py-3 d-flex flex-row-reverse">
                            <button class="btn btn-secondary back-btn">Back <i class="align-middle" data-feather="arrow-left"></i></button>
                        </div>
                    </div>
                    <div class="">
						<div class="card">
							<div class="card-body">
									<div class = "p-2">
                                        <!-- @include('backend.layouts.flash') -->
										<form action="{{ route('booking.update' , $booking->id) }}" method="post" id="update">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group mt-2">
                                                    <label for="">Package Name</label>
                                                    <select name="package_id" class="form-control" >
                                                    @foreach($packages as $key =>$package)
                                                        <option value="{{$package->id}}" {{ $package->id == $booking->package_id ? 'selected' : '' }}>{{ $package->title }}</option>
                                                    @endforeach
                                                    </select>
                                            </div>
                                            <div class="form-group mt-2">
                                                    <label for="">User Name</label>
                                                    <select name="user_id" class="form-control" >
                                                    @foreach($users as $key =>$user)
                                                        <option value="{{$user->id}}" {{ $user->id == $booking->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                                                    @endforeach
                                                    </select>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="">Number Of People</label>
                                                <input type="number" name="number_of_person" class="form-control" value="{{ $booking->number_of_person }}">
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="">Note</label>
                                                <textarea name="note" id="" class="form-control">{{ $booking->note ?? '' }}</textarea>
                                            </div>
                                            <div class="row">
                                                <div class="form-group mt-2 col-6">
                                                    <label for="">Phone Number</label>
                                                    <input type="text" name="phone_number" class="form-control" id="" value="{{ $booking->User->phone }}">
                                                </div>
                                                <div class="form-group mt-2 col-6">
                                                    <label for="">Email Address</label>
                                                    <input type="text" name="email" class="form-control" id="" value="{{ $booking->User->email }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group mt-2 col-6">
                                                    <label for="">Date Of Travel</label>
                                                    <input type="date" name="date_of_travel" class="form-control" id="" value="{{ $booking->date_of_travel }}">
                                                </div>
                                                <div class="form-group mt-2 col-6">
                                                    <label for="">Payment Method</label>
                                                    <select name="payment_method" class="form-control" >
                                                        <option value="K Pay" {{ "K Pay" == $booking->payment_method ? 'selected' : '' }}>K Pay</option>
                                                        <option value="Wave Pay" {{ "Wave Pay" == $booking->payment_method ? 'selected' : '' }}>Wave Pay</option>
                                                        <option value="AYA Pay" {{ "AYA Pay" == $booking->payment_method ? 'selected' : '' }}>AYA Pay</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center pt-4">
                                                <button class="btn btn-secondary back-btn" style="margin-right:10px;">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
									</div>
							</div>
						</div>
					</div>				
				</div>
</main> 
@endsection
@push('script')
{!! JsValidator::formRequest('App\Http\Requests\BookingRequest' , '#update') !!}
<script type="text/javascript">
</script>
@endpush