@extends('admin.master')
@section('content')
<div class="row">
	<div class="col-md-12">
	    <form action="{{ action('\Uistacks\Media\Controllers\MediaController@delete', $media->id) }}" method="POST" role="form">
	        {{ csrf_field() }}
	        <input type="hidden" name="_method" value="DELETE">

	        <div class="form-group">
	            <label for="">label</label>
	            <input type="text" class="form-control" id="" placeholder="Input field">
	        </div>

	        <button type="submit" class="btn btn-primary">Delete</button>
	    </form>
	</div>
</div>
@endsection