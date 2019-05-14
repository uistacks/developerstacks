@extends('admin.master')
@section('page_title')
Media
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="admin-top-operation">
            <a class="btn btn-default" href="{{ action('\Uistacks\Media\Controllers\MediaController@upload')}}">Upload</a>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>File</th>
                    <th>Author</th>
                    <th>Upload Date</th>
                    <th>Last update</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach($media as $file)
                    <tr>
                        <td>
                            <strong class="has-media-icon">
                                <a href="{{ action('\Uistacks\Media\Controllers\MediaController@edit', $file->id)}}" aria-label="“dog usage” (Edit)">
                                    <span class="media-icon image-icon">
                                        <img width="60" height="60" class="attachment-60x60 size-60x60" src="/{{ $file->options['styles']['small'] }}" alt="">
                                    </span>
                                    {{ $file->options['trans']['en']['title'] }}
                                </a>     
                            </strong>
                            <p>{{ $file->name }}</p>                          
                        </td>
                        <td>
                            @if($file->upload_by)
                                Ramesh Singh
                            @endif
                            Ramesh Singh
                        </td>
                        <td>{{ $file->created_at }}</td>
                        <td>{{ $file->updated_at }}</td>
                        <td>
                            <a href="{{ $file->file }}" target="_blank">View</a>
                            <a href="{{ action('\Uistacks\Media\Controllers\MediaController@confirmDelete', $file->id)}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>File</th>
                    <th>Author</th>
                    <th>Upload Date</th>
                    <th>Last update</th>
                    <th>Operations</th>
                </tr>
            </tfoot>
        </table>

        <div class="table-footer">
            <div class="count"><i class="fa fa-folder-o"></i> {{ $media->total() }} item</div>
            <div class="pagination-area"> {!! $media->render() !!} </div>
        </div>
    </div>
</div>
@endsection