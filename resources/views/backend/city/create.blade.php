@extends('backend.layouts.app')
@section('city','active')
@section('content')
<main class="content">
				<div class="container-fluid p-0">
					<div class="d-flex justify-content-between">
                        <h1 class="h3 mb-3"><strong>City Create Form</strong></h1>
                        <div class="py-3 d-flex flex-row-reverse">
                            <button class="btn btn-secondary back-btn">Back <i class="align-middle" data-feather="arrow-left"></i></a>
                        </div>
                    </div>
                    <div class="">
						<div class="card">
							<div class="card-body">
									<div class = "p-2">
                                        <!-- @include('backend.layouts.flash') -->
										<form action="{{ route('city.store') }}" method="post" id="create" enctype="multipart/form-data">
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
                                                    <label for="">Package(Region & State)</label>
                                                    <select name="package_id" class="form-control" >
                                                    @foreach($packages as  $package)
                                                        <option value="{{$package->id}}">{{ $package->title }}</option>
                                                    @endforeach
                                                    </select>
                                                    @error('package_id')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror 
                                            </div>
                                            <div class="from-group mt-2">
                                                    <label for="">Image</label>
                                                    <input type="file" id="fileupload" name="image[]"  class="form-control" multiple>
                                                    <div class="validation text-danger pt-2" style="display:none;"> Upload Max 4 Files allowed </div>
                                                    @error('image')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror 
                                            </div>
                                            <div class="from-group mt-2">
                                                    <label for="">Cover Photo</label>
                                                    <input type="file" id="fileupload" name="cover" class="form-control">
                                                    @error('cover')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror 
                                            </div>
                                            <div class="from-group mt-2 d-none">
                                                    <label for="">Video</label>
                                                    <input type="file"  name="video" class="form-control">
                                                    @error('video')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror 
                                            </div>
                                            <div class="from-group d-none">
                                                <label for="">Video Link</label>
                                                <input type="text" name="link" class="form-control">
                                                @error('link')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                @enderror 
                                            </div>
                                            <div class="from-group mt-2">
                                                    <label for="">Summary</label>
                                                    <textarea   name="summary"  id="inp_editor2" class="form-control"></textarea>
                                                    @error('summary')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror 
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
{!! JsValidator::formRequest('App\Http\Requests\CityRequest' , '#create') !!}
<script type="text/javascript">
    var editor2 = new RichTextEditor("#inp_editor2");
</script>
<script>
    $(document).ready(function(){
        $('#fileupload').change(function(){
                var input = document.getElementById('fileupload');
                if(input.files.length >= 5){
                    $('.validation').css('display','block');
                }else{
                    $('.validation').css('display','none');
                }
                });
            });
</script>
@endpush