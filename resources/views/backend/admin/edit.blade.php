@extends('backend.layouts.app')
@section('admin','active')
@section('content')
<main class="content">
				<div class="container-fluid p-0">
					<div class="d-flex justify-content-between">
                        <h1 class="h3 mb-3"><strong>Admin Edit Form</strong></h1>
                        <div class="py-3 d-flex flex-row-reverse">
                            <button class="btn btn-secondary back-btn">Back <i class="align-middle" data-feather="arrow-left"></i></button>
                        </div>
                    </div>
                    <div class="">
						<div class="card">
							<div class="card-body">
									<div class = "p-2">
                                        <!-- @include('backend.layouts.flash') -->
										<form action="{{ route('admin-account.update' , $admin_account->id) }}" method="post" id="update" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="from-group">
                                                <label for="">Name</label>
                                                <input type="text" name="name" value="{{ $admin_account->name }}" class="form-control">
                                                @error('name')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                @enderror 
                                            </div>
                                            <div class="from-group mt-2">
                                                <label for="">Email</label>
                                                <input type="email" name="email"  value="{{ $admin_account->email }}" class="form-control">
                                                @error('email')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                @enderror 
                                            </div>
                                            <div class="from-group mt-2">
                                                <label for="">Phone</label>
                                                <input type="text" name="phone" value="{{ $admin_account->phone }}" class="form-control">
                                                @error('phone')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                @enderror 
                                            </div>
                                            <div class="from-group mt-2">
                                                <label for="">Password</label>
                                                <input type="password" value="" name="password" class="form-control">
                                                @error('password')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                @enderror 
                                            </div>
                                            <div class="from-group mt-2">
                                                    <label for="">Gender</label>
                                                    <select name="gender" class="form-control">
                                                    @if($admin_account->gender == 'Male')
                                                        <option selected>Male</option>
                                                        <option>Female</option> 
                                                    @else
                                                        <option selected>Female</option>
                                                        <option >Male</option> 
                                                    @endif 
                                                    </select>
                                                    @error('gender')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror 
                                            </div>
                                            <div class="from-group mt-2">
                                                    <label for="">Profile</label>
                                                    <input type="file" name="profile" class="form-control">
                                                    <div class=" rounded-md bg-white">
                                                        @if(!$admin_account->profile == '')
                                                        <img src="{{asset('images/' . $admin_account->profile)}}" alt="" style="width:200px;height:200px;padding-top:px;object-fit:contain;" class="pt-1">
                                                        @else
                                                        <img src="{{asset('backend/assets/img/noimage.jpg')}}" alt="" style="width:200px;height:200px;padding-top:px;object-fit:contain;" class="pt-1">
                                                        @endif
                                                    </div>
                                                    @error('profile')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror 
                                            </div>
                                            <div class="from-group mt-2">
                                                    <label for="">Address</label>
                                                    <textarea  name="address" class="form-control" rows="3">{{ $admin_account->address }}</textarea>
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
{!! JsValidator::formRequest('App\Http\Requests\AdminUpdateRequest' , '#update') !!}
<script type="text/javascript">
</script>
@endpush