@php
    $pageNameMode = trans('Settings::settings.smtp');
    $breadcrumbs[] = ['url' => '', 'name' => trans('Settings::settings.setting').' '.trans('Settings::settings.smtp')];
    $action = action('\Uistacks\Settings\Controllers\SettingsController@updateSmtp');
    $submitButton = trans('admin.update');
@endphp

@extends('admin.master')
@section('title')
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

                </fieldset>

                <div class="d-flex justify-content-end align-items-center">
                    {{--<button type="reset" class="btn btn-danger legitRipple" id="reset">Reset <i class="icon-reload-alt ml-2"></i></button>--}}
                    <button type="submit" class="btn btn-success ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection