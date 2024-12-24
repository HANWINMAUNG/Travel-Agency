@extends('backend.layouts.app')
@section('package','active')
@section('content')
<main class="content">
				<div class="container-fluid p-0">
					<div class="d-flex justify-content-between">
                        <h1 class="h3 mb-3"><strong>Package Create Form</strong></h1>
                        <div class="py-3 d-flex flex-row-reverse">
                            <button class="btn btn-secondary back-btn">Back <i class="align-middle" data-feather="arrow-left"></i></a>
                        </div>
                    </div>
                    <div class="">
						<div class="card">
							<div class="card-body">
									<div class = "p-2">
                                        <!-- @include('backend.layouts.flash') -->
										<form action="{{ route('package.store') }}" method="post" id="create" enctype="multipart/form-data">
                                            @csrf
                                            <div class="from-group">
                                                <label for="">Title</label>
                                                <input type="text" name="title" class="form-control">
                                                @error('title')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                @enderror 
                                            </div>
                                            <div class="from-group mt-2">
                                                    <label for="">Category</label>
                                                    <select name="category" class="form-control" >
                                                    @foreach($categories as $key => $category)
                                                        <option value="{{$key}}">{{ $category }}</option>
                                                    @endforeach
                                                    </select>
                                                    @error('category')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror 
                                            </div>
                                            <div class="from-group">
                                                <label for="">Price</label>
                                                <input type="number" name="price" class="form-control">
                                                @error('price')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                @enderror 
                                            </div>
                                            <div class="from-group">
                                                <label for="">Quantity</label>
                                                <input type="number" name="quantity" class="form-control">
                                                @error('quantity')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                @enderror 
                                            </div>
                                            <div class="from-group">
                                                <label for="">Dates</label>
                                                <input type="text" name="date" class="form-control">
                                                @error('date')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                @enderror 
                                            </div>
                                            <div class="from-group mt-2">
                                                    <label for="">Image</label>
                                                    <input type="file" id="fileupload" name="image"  class="form-control">
                                                    @error('image')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                            <div class="from-group mt-2">
                                                    <label for="">Cover Photo</label>
                                                    <input type="file" id="fileupload" name="cover_photo" class="form-control">
                                                    @error('quantity')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                            <div class="from-group mt-2">
                                                    <label for="">Description</label>
                                                    <textarea   name="description" id="inp_editor1" class="form-control"></textarea>
                                            </div>
                                            <div class="from-group mt-2">
                                                    <label for="">Summary</label>
                                                    <textarea   name="summary"  id="inp_editor2" class="form-control"></textarea>
                                            </div>
                                            <div class="d-flex justify-content-center mt-4">
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
{!! JsValidator::formRequest('App\Http\Requests\PackageRequest' , '#create') !!}
<script type="text/javascript">
     var editor1 = new RichTextEditor("#inp_editor1");
     var editor2 = new RichTextEditor("#inp_editor2");
</script>
@endpush