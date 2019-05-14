@extends('admin.master')
@section('page_title')
Upload Media
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="{{ action('\Uistacks\Media\Controllers\MediaController@storeFile') }}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h1>Upload New Media</h1>
            <div class="form-group">
                <input type="file" name="file" id="">
                <p class="help-block">
                    Switch to the multi-file uploader.
                </p>
                <p class="help-block">
                    Maximum upload file size: 2 MB.
                </p>
            </div>
        
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</div>
@endsection