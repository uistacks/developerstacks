@php
    $pageNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/roles', 'name' => trans('Roles::roles.roles')];
    $action = action('\Uistacks\Roles\Controllers\RolesController@store');
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
        $pageNameMode = trans('Core::operations.edit');
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Roles::roles.role')];
        $action = action('\Uistacks\Roles\Controllers\RolesController@update', $item->id);
        $method = 'PATCH';
        $backFieldLabel = trans('admin.back_after_update');
        $submitButton = trans('admin.update');
    }else{
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Roles::roles.role')];
    }
@endphp

@extends('admin.master')
@section('title')
    {{ trans('Roles::roles.roles') }}: {{ $pageNameMode }} {{ trans('Roles::roles.role') }}
@endsection
@section('content')
    <!-- Include Media model -->
    @include('Media::modals.modal')
    <!-- end include Media model -->

    <!-- Include Media model -->
    @include('Media::modals.gallery-modal')
    <!-- end include Media model -->

    <div class="card">
        <div class="card-body">
            <form id="frm_create_edit" action="{{ $action }}" method="POST" role="form">
                @if($method === 'PATCH')
                    <input type="hidden" name="_method" value="PATCH">
                @endif
                @csrf
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">{{ $pageNameMode }}</legend>
                    <div class="row">
                        <div class="col-md-8">

                            @include('Core::groups.languages', [
                                'fields' => [
                                    0 => [
                                        'type' => 'input_text',
                                        'properties' => [
                                            'field_name' => 'title',
                                            'name' => trans('Core::operations.name'),
                                            'placeholder' => ''
                                        ]
                                    ]
                                ]
                            ])

                            <hr/>
                            <h4><i>{{trans('Roles::roles.all_permissions')}}</i></h4>

                            @if(isset($permissions) && count($permissions)>0)
                                <input type="checkbox" name="check_all" id="checkall">
                                {{trans('Core::operations.select_all')}}
                                @foreach($permissions as $per)
                                    @if($per->id == 20 || $per->id == 21)
                                        <div class="checkbox">
                                            <label><input name="permissions[]" checked type="checkbox" value="{{ $per->id }}" class="check_list" @if(isset($arr_role_permission) && count($arr_role_permission) > 0) @if(in_array($per->id,$arr_role_permission)) checked @endif  @endif> {{ $per->name }}</label>
                                        </div>
                                    @else
                                        <div class="checkbox">
                                            <label><input name="permissions[]" type="checkbox" value="{{ $per->id }}" class="check_list" @if(isset($arr_role_permission) && count($arr_role_permission) > 0) @if(in_array($per->id,$arr_role_permission)) checked @endif  @endif> {{ $per->name }}</label>
                                        </div>
                                    @endif
                                @endforeach
                                {{--<div class="col-md-3">--}}
                                {{--<button type="submit" class="btn btn-block btn-primary">{{trans('Core::operations.save_changes')}}</button>--}}
                                {{--</div>--}}
                            @endif
                            <hr/>

                        </div>

                        <div class="col-md-4">

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

                            <button type="submit" id="btn_create" class="btn btn-outline-success btn-block"><i class="material-icons">save</i> {{ $submitButton }}</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

@endsection

@section('footer')
    <!--jquery-dependency-fields -->
    <script src="{{ asset('assets/js/index-operations.js') }}"></script>
    <!--end jquery-dependency-fields -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#lang-en').attr('onClick','return false');
            $('#lang-ar').attr('onClick','return false');
        });
    </script>
@endsection