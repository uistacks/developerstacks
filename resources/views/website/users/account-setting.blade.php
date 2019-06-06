@php
    $breadcrumbs[] =  ['url' => route('user-dashboard'), 'name' => 'Dashboard'];
    $breadcrumbs[] =  ['url' => '', 'name' => 'Account Setting'];
@endphp
@extends('website.layouts.app-dash')
@section('title')
    Account Setting
@endsection
@section('header')

@endsection
@section('content')

    <!-- Inner container -->
    <div class="d-md-flex align-items-md-start">
        <!-- Right content -->
        <div class="tab-content w-100 overflow-auto">
            <div class="tab-pane fade active show" id="profile">

                <!-- Account settings -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Account settings</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" href="{{ route('user-dashboard') }}" ><i class="icon-backward"></i> Back</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="#">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Username</label>
                                        <input type="text" value="Kopyov" readonly="readonly" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Current password</label>
                                        <input type="password" value="password" readonly="readonly" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>New password</label>
                                        <input type="password" placeholder="Enter new password" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Repeat password</label>
                                        <input type="password" placeholder="Repeat new password" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Profile visibility</label>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" name="visibility" class="form-input-styled" checked data-fouc>
                                                Visible to everyone
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" name="visibility" class="form-input-styled" data-fouc>
                                                Visible to friends only
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" name="visibility" class="form-input-styled" data-fouc>
                                                Visible to my connections only
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" name="visibility" class="form-input-styled" data-fouc>
                                                Visible to my colleagues only
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Notifications</label>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-input-styled" checked data-fouc>
                                                Password expiration notification
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-input-styled" checked data-fouc>
                                                New message notification
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-input-styled" checked data-fouc>
                                                New task notification
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-input-styled">
                                                New contact request notification
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /account settings -->

            </div>

        </div>
        <!-- /right content -->

    </div>
    <!-- /inner container -->

@endsection
@section('footer')

@stop