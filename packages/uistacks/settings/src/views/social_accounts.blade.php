@php
    $pageNameMode = trans('Settings::settings.accounts');
    $breadcrumbs[] = ['url' => '', 'name' => trans('Settings::settings.setting').' '.trans('Settings::settings.accounts')];
    $action = action('\Uistacks\Settings\Controllers\SettingsController@updateSocialAccounts');
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
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="{{ $action }}" method="POST" role="form" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}

                            @include('Core::fields.input_text', [
                            'field_name' => 'facebook',
                            'name' => trans('Settings::settings.facebook'),
                            'value' => $facebook,
                            'placeholder' => ''
                        ])
                            @include('Core::fields.input_text', [
                                'field_name' => 'twitter',
                                'name' => trans('Settings::settings.twitter'),
                                'value' => $twitter,
                                'placeholder' => ''
                            ])
                            @include('Core::fields.input_text', [
                                'field_name' => 'gplus',
                                'name' => trans('Settings::settings.gplus'),
                                'value' => $gplus,
                                'placeholder' => ''
                            ])
                            @include('Core::fields.input_text', [
                                'field_name' => 'instagram',
                                'name' => trans('Settings::settings.instagram'),
                                'value' => $instagram,
                                'placeholder' => ''
                            ])
                            @include('Core::fields.input_text', [
                                'field_name' => 'youtube',
                                'name' => trans('Settings::settings.youtube'),
                                'value' => $youtube,
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