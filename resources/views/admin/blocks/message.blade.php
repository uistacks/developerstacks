@if (Session::has('message'))
    <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ Session::get('message') }}
    </div>
@endif
  

@if(isset($errors) && $errors->count() > 0)
    <div class="alert alert-danger">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <ul>
            @foreach ($errors->all() as $error)
           
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
