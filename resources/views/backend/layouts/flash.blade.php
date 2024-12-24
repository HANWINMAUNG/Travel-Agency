@if($errors->has('fail'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{$errors->first('fail')}}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
@endif
@if($errors->any())
 <div style="color:red" class="text-center">
         @foreach($errors->all() as $error)
            <p>{!! $error !!}</p>
         @endforeach    
 </div>
 @endif