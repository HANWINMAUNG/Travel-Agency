@extends('backend.layouts.app')
@section('category','active')
@section('content')
<main class="content">
				<div class="container-fluid p-0">
					<div class="d-flex justify-content-between">
						<h1 class="h3 mb-3"><strong>Category Edit Form</strong></h1>
						<div class="py-3 d-flex flex-row-reverse">
							<button class="btn btn-secondary back-btn">Back <i class="align-middle" data-feather="arrow-left"></i></button>
						</div>
					</div>
                    <div class="">
						<div class="card">
							<div class="card-body">
									<div class = "p-2">
                                        @include('backend.layouts.flash')
										<form action="{{ route('category.update' , $category->id) }}" method="post" id="update">
                                            @csrf
                                            @method('PATCH')
                                            <div class="from-group mt-2">
                                                    <label for="">Title</label>
                                                    <input type="text"  name="title" class="form-control" value="{{ $category->title }}">
													@error('title')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror 
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
{!! JsValidator::formRequest('App\Http\Requests\CategoryUpdateRequest' , '#update') !!}
<script type="text/javascript">
</script>
@endpush