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
    <div class="card">
        <div class="card-body">
            <form class="form-validate-jquery" method="POST" action="{{ $action }}" novalidate="novalidate">
                @csrf
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">{{ $pageNameMode }}</legend>

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
                    {{--@include('Core::fields.input_text', [
                        'field_name' => 'youtube',
                        'name' => trans('Settings::settings.youtube'),
                        'value' => $youtube,
                        'placeholder' => ''
                    ])--}}

                </fieldset>

                <div class="d-flex justify-content-end align-items-center">
                    {{--<button type="reset" class="btn btn-danger legitRipple" id="reset">Reset <i class="icon-reload-alt ml-2"></i></button>--}}
                    <button type="submit" class="btn btn-success ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection