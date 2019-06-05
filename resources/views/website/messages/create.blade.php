@extends('website.layouts.app-dash')
@section('title')
    Create a new message
@endsection
@section('header')
    <link rel="stylesheet" href="{{asset('public/media-dev.css')}}" />
@endsection
@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Inner container -->
        <div class="d-md-flex align-items-md-start">
            <!-- Right content -->
            <div class="tab-content w-100 overflow-auto">
                <div class="tab-pane fade active show" id="profile">

                    <!-- Profile info -->
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Profile information</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" href="{{ route('messages') }}"><i class="icon-backward"></i> Back</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('messages.store') }}" method="post">
                                {{ csrf_field() }}
                                <div class="col-md-12">
                                    <!-- Subject Form Input -->
                                    <div class="form-group">
                                        <label class="control-label">Subject</label>
                                        <input type="text" class="form-control" name="subject" placeholder="Subject"
                                               value="{{ old('subject') }}">
                                    </div>

                                    <!-- Message Form Input -->
                                    <div class="form-group">
                                        <label class="control-label">Message</label>
                                        <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="recipients" class="d-block font-weight-semibold">Recipients</label>
                                        @if($users->count() > 0)
                                            @foreach($users as $user)
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label" title="{{ $user->name }}">
                                                        <input class="uniform-checker border-indigo-600 text-indigo-800" type="checkbox" name="recipients[]" value="{{ $user->id }}">{!!$user->name!!}
                                                    </label>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    <!-- Submit Form Input -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-danger form-control">Send →</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /profile info -->

                </div>

            </div>
            <!-- /right content -->

        </div>
        <!-- /inner container -->

    </div>
    <!-- /content area -->

@endsection
@section('footer')
    <!--Media -->
    @include('Media::scripts.scripts')
    <!--end media -->
    <script src="{{asset('public/media-dev.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#set-choosed-file').on('click', function () {
                if($("input[name*='main_image_id']").val() !== undefined){
//                   alert($("input[name*='main_image_id']").val());
                    $('#frm_change_picture').submit();
                }
            });
        });
    </script>
@stop