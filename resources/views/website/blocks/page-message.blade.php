@if(isset($errors) && $errors->count() > 0)
    <div class="alert alert-danger" style="margin-top: 10px;">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif