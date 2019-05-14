@php
    $pageNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/locations', 'name' => trans('Locations::locations.locations')];
    $action = action('\Uistacks\Locations\Controllers\StatesController@store');
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
        $pageNameMode = trans('Core::operations.edit');
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Locations::locations.location')];
        $action = action('\Uistacks\Locations\Controllers\StatesController@update', $item->id);
        $method = 'PATCH';
        $backFieldLabel = trans('admin.back_after_update');
        $submitButton = trans('admin.update');
    }else{
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Locations::locations.location')];
    }
@endphp

@extends('admin.master')
@section('page_title')
    {{ trans('Locations::locations.locations') }}: {{ $pageNameMode }} {{ trans('Locations::locations.location') }}
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('public/media-dev.css')}}" />
@endsection
@section('content')
    <!-- Include Media model -->
    @include('Media::modals.modal')
    <!-- end include Media model -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> {{ $pageNameMode }} {{ trans('Locations::locations.location') }}</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ $action }}" method="POST" role="form" >
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
                                    ],
                                    1 => [
                                        'type' => 'textarea',
                                        'properties' => [
                                            'field_name' => 'description',
                                            'name' => "Description",
                                            'placeholder' => ''
                                        ]
                                    ]
                                ]
                            ])

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
    <script src="{{ asset('public/media-dev.js')}}"></script>
    <!-- google maps -->
    <!--end jquery-dependency-fields -->
    <script type="text/javascript">
        $(document).ready(function () {
            //add marker for edit page
            $('#lang-en').attr('onClick','return false');
            $('#lang-ar').attr('onClick','return false');
            // Load country sub_categorys
            $('#category_id').off().on("change", function() {
                loadSubCategories(this.value);
            });
            var oldcategory = "{{ old('category_id') }}";
            if (oldcategory != '') {
                loadSubCategories(oldcategory);
            }
        });
        function loadSubCategories(countryId) {
            $("#sub_category option").remove();
            $.get("{{url('/')}}/{{ Lang::getLocale() }}/admin/get-sub-cat/" + countryId, function(data) {
                $("#sub_category").append($("<option></option>").attr("value", "").text("-- Select Sub Category --"));
                for (var i = 0; i < data.subCategory.length; i++) {
                    $("#sub_category").append($("<option></option>").attr("value", data.subCategory[i].id).text(data.subCategory[i].trans.name));
                    // Check if old data equal sub_category
                    var oldsub_category = "{{ old('sub_category') }}";
                    if (oldsub_category != '') {
                        $('#sub_category').val(oldsub_category);
                    }
                }
            });
        }
    </script>
@endsection