@php
    $pageNameMode = trans('Settings::settings.smtp');
    $breadcrumbs[] = ['url' => '', 'name' => trans('Settings::settings.setting').' '.trans('Settings::settings.smtp')];
    $action = action('\Uistacks\Settings\Controllers\SettingsController@updateSmtp');
    $submitButton = trans('admin.update');
@endphp

@extends('admin.master')
@section('page_title')
{{ trans('Settings::settings.settings') }}: {{ $pageNameMode }}
@endsection
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{ trans('Settings::settings.settings') }}</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        {{--<input type="text" class="form-control" placeholder="Search for...">--}}
                        {{--<span class="input-group-btn">--}}
                        {{--<button class="btn btn-default" type="button">Go!</button>--}}
                        {{--</span>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ $pageNameMode }} <small>Management</small></h2>
                        {{--<ul class="nav navbar-right panel_toolbox">--}}
                        {{--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>--}}
                        {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                        {{--<ul class="dropdown-menu" role="menu">--}}
                        {{--<li><a href="#">Settings 1</a>--}}
                        {{--</li>--}}
                        {{--<li><a href="#">Settings 2</a>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li><a class="close-link"><i class="fa fa-close"></i></a></li>--}}
                        {{--</ul>--}}
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="{{ $action }}" method="POST" role="form" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}

                            @include('Core::fields.input_text', [
                            'field_name' => 'driver',
                            'name' => trans('Settings::settings.driver'),
                            'value' => $driver,
                            'placeholder' => ''
                        ])
                            @include('Core::fields.input_text', [
                                'field_name' => 'host',
                                'name' => trans('Settings::settings.host'),
                                'value' => $host,
                                'placeholder' => ''
                            ])
                            @include('Core::fields.input_text', [
                                'field_name' => 'port',
                                'name' => trans('Settings::settings.port'),
                                'value' => $port,
                                'placeholder' => ''
                            ])
                            @include('Core::fields.input_text', [
                                'field_name' => 'username',
                                'name' => trans('Settings::settings.username'),
                                'value' => $username,
                                'placeholder' => ''
                            ])
                            @include('Core::fields.input_text', [
                                'field_name' => 'password',
                                'name' => trans('Settings::settings.password'),
                                'value' => $password,
                                'placeholder' => ''
                            ])
                            @include('Core::fields.input_text', [
                                'field_name' => 'address',
                                'name' => trans('Settings::settings.address'),
                                'value' => $address,
                                'placeholder' => ''
                            ])
                            @include('Core::fields.input_text', [
                                'field_name' => 'name',
                                'name' => trans('Settings::settings.name'),
                                'value' => $name,
                                'placeholder' => ''
                            ])
                            @include('Core::fields.input_text', [
                                'field_name' => 'encryption',
                                'name' => trans('Settings::settings.encryption'),
                                'value' => $encryption,
                                'placeholder' => ''
                            ])

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-save"></i> {{ $submitButton }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection