@php
    $pageNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/countries', 'name' => trans('Countries::countries.countries')];
    $action = action('\Uistacks\Locations\Controllers\CountriesController@store');
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
        $pageNameMode = trans('Core::operations.edit');
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Countries::countries.country')];
        $action = action('\Uistacks\Locations\Controllers\CountriesController@update', $item->id);
        $method = 'PATCH';
        $backFieldLabel = trans('admin.back_after_update');
        $submitButton = trans('admin.update');
    }else{
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Countries::countries.country')];
    }
@endphp

@extends('admin.master')
@section('page_title')
    {{ trans('Countries::countries.countries') }}: {{ $pageNameMode }} {{ trans('Countries::countries.country') }}
@endsection
@section('content')
    <!-- Include Media model -->
    @include('Media::modals.modal')
    <!-- end include Media model -->

    <!-- Include Media model -->
    @include('Media::modals.gallery-modal')
    <!-- end include Media model -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> {{ $pageNameMode }} {{ trans('Countries::countries.country') }}</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ $action }}" method="POST" role="form" enctype="multipart/form-data">
                        @if($method === 'PATCH')
                            <input type="hidden" name="_method" value="PATCH">
                        @endif
                        {{ csrf_field() }}
                        <div class="col-md-9">
                            @include('Core::groups.languages', [
                                'fields' => [
                                    0 => [
                                        'type' => 'input_text',
                                        'properties' => [
                                            'field_name' => 'name',
                                            'name' => trans('Core::operations.name'),
                                            'placeholder' => ''
                                        ]
                                    ]
                                ]
                            ])
                            <div class="form-group">
                                <label for="ISO Code">{{trans('Countries::countries.iso_code')}}</label>
                                <input type="text" class="form-control" name="iso_code" id="iso_code" value="{{isset($trans['en']['iso_code']) ? $trans['en']['iso_code'] : ""}}" />
                            </div>
                            <div class="form-group">
                                <label for="Phone Code">{{trans('Countries::countries.phone_code')}}</label>
                                <input type="text" class="form-control" name="phone_code" id="phone_code" value="{{isset($trans['en']['phone_code']) ? $trans['en']['phone_code'] : ""}}" />
                            </div>
                            <div class="form-group">
                                <label for="Phone Code">{{trans('Countries::countries.phone_length')}}</label>
                                <input type="text" class="form-control" name="phone_length" id="phone_length" value="{{isset($trans['en']['phone_length']) ? $trans['en']['phone_length'] : ""}}" />
                            </div>
                            <div class="form-group">
                                <label for="Phone Code">{{trans('Countries::countries.phone_starting_number')}}</label>
                                <input type="text" class="form-control" name="phone_starting_number" id="phone_starting_number" value="{{isset($trans['en']['phone_starting_number']) ? $trans['en']['phone_starting_number'] : ""}}" />
                            </div>
                            <div class="form-group">
                                <label for="Flag">{{trans('Countries::countries.flag')}}</label>
                                <input type="file" name="flag" />
                            </div>
                            <div class="form-group">
                                <label for="Previous Image">{{trans('Countries::countries.current_image')}}</label>
                                @php
                                    if(isset($trans)){
                                    $exist_flag = url('/').'/uploads/countries-flag/'.$trans['en']['flag'];
                                        if (file_exists($exist_flag)) {
                                            $exist_flag = $exist_flag;
                                        } else {
                                            $exist_flag = url('/').'/admin_assets/img/countries_flags/'.$trans['en']['flag'];
                                        }
                                    }
                                @endphp
                                <img src="{{isset($trans['en']['flag']) ? $exist_flag : ""}}" />
                            </div>
                        </div>
                        <div class="col-md-3 sidbare">
                            <!-- Language field -->
                        @include('Core::fields.languages')
                        <!-- End Language field -->

                            @include('Core::fields.checkbox', [
                                'field_name' => 'active',
                                'name' => trans('admin.active'),
                                'placeholder' => ''
                            ])
                            <div class="checkbox">
                                <label><input name="back" type="checkbox" value="1" class="minimal-blue" @if(old('back') == 1) checked @endif> {{$backFieldLabel}}</label>
                            </div>

                            <button type="submit" class="btn btn-block btn-primary">{{ $submitButton }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <!--Language -->
    @include('Core::language.scripts.scripts')
    <!--end Language -->

    <!--Media -->
    @include('Media::scripts.scripts')
    <!--end media -->

    <!--jquery-dependency-fields -->
    <script src="/vendor/core/js/jquery-dependency-fields/scripts.js"></script>
    <!--end jquery-dependency-fields -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#lang-en').attr('onClick','return false');
            $('#lang-ar').attr('onClick','return false');
        });
    </script>
@endsection