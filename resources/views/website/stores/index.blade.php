@php
    $dbTable = '';
    if($items->count()){
        $dbTable = $items[0]['table'];
    }
@endphp
@extends('website.master')
@section('page_title')

@endsection
@section('content')
    <style type="text/css">
        .paymentWrap {
            padding: 50px;
        }

        .paymentWrap .paymentBtnGroup {
            max-width: 800px;
            margin: auto;
        }

        .paymentWrap .paymentBtnGroup .paymentMethod {
            padding: 40px;
            box-shadow: none;
            position: relative;
        }

        .paymentWrap .paymentBtnGroup .paymentMethod.active {
            outline: none !important;
        }

        .paymentWrap .paymentBtnGroup .paymentMethod.active .method {
            border-color: #4cd264;
            outline: none !important;
            box-shadow: 0px 3px 22px 0px #7b7b7b;
        }

        .paymentWrap .paymentBtnGroup .paymentMethod .method {
            position: absolute;
            right: 3px;
            top: 3px;
            bottom: 3px;
            left: 3px;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            border: 2px solid transparent;
            transition: all 0.5s;
        }
        .paymentWrap .paymentBtnGroup .paymentMethod .method.credit-card {
            background-image: url("{{ asset('public/website_assets/img/Instagram.png') }}");
        }
        .paymentWrap .paymentBtnGroup .paymentMethod .method.paypal {
            background-image: url("{{ asset('public/website_assets/img/facebook.png') }}");
        }


        .paymentWrap .paymentBtnGroup .paymentMethod .method:hover {
            border-color: #4cd264;
            outline: none !important;
        }
    </style>
    @include('website.regions.header')
    <!-- Include single delete confirmation model -->
    @include('Core::modals.confirm-delete')
    <!-- Include bulk delete confirmation model -->
    @include('Core::modals.bulk-confirm-delete')
    <div class="db-main-blk">
        <div class="container">
            <div class="db-main-menu">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation">
                        <a href="{{ action('WebsiteController@dashboard') }}" >{{ trans('project.my_account') }}</a>
                    </li>
                    <li role="presentation" class="active">
                        <a href="{{ action('StoreController@index') }}" >{{ trans('project.my_stores') }}</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="db-mysho-set">
                        {{--<div class="container row">--}}
                            {{--<div class="form-group">--}}
                                {{--<button class="btn btn-sm btn-success" data-toggle="modal" data-target="#product-import-method"><i class="fa fa-file"></i> Import Products</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <form method="POST" action="{{ action('StoreController@bulkOperations')}}" id="bulk" class="form-inline">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="table-responsive cust-table">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" name="check_all" id="checkall">
                                        </th>
                                        <th>
                                            {{ trans('Stores::stores.store') }}
                                        </th>
                                        <th>
                                            {{ trans('Stores::stores.location') }}
                                        </th>
                                        <th>{{ trans('Core::operations.status') }}</th>
                                        <th>{{ trans('Core::operations.created_at') }}</th>
                                        <th>{{ trans('Core::operations.operations') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--<tr>--}}
                                    {{--<td>01</td>--}}
                                    {{--<td>ASDDD</td>--}}
                                    {{--<td>425, Marketyard Pune-1444</td>--}}
                                    {{--<td>--}}
                                    {{--<div class="action-list">--}}
                                    {{--<ul class="clearfix">--}}
                                    {{--<li>--}}
                                    {{--<a href="javascript:void(0)" class="colo-app"><i class="fa fa-eye"></i></a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<a href="javascript:void(0)" class="colo-yellow"><i class="fa fa-edit"></i></a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<a href="javascript:void(0)" class="colo-rej"><i class="fa fa-trash"></i></a>--}}
                                    {{--</li>--}}
                                    {{--</ul>--}}
                                    {{--</div>--}}
                                    {{--</td>--}}
                                    {{--</tr>--}}
                                    @foreach($items as $item)
                                        <tr @if($item->trans) data-title="{{ $item->trans->name }}" @endif>
                                            <td>
                                                <input type="checkbox" name="ids[]" class="check_list" value="{{$item->id}}">
                                            </td>
                                            <td class="user_name_col_{{$item->id}}">
                                                <a href="{{ action('SearchController@storeDetail',$item->id) }}">
                                                @if($item->trans)
                                                    {{ $item->trans->name }}
                                                @endif
                                                </a>
                                            </td>
                                            <td>
                                                @if(isset($item->trans))
                                                    {{ $item->trans->location }}
                                                @else
                                                    {{ 'N/A' }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->active == true)
                                                    {{ trans('Core::operations.active') }}
                                                @else
                                                    {{ trans('Core::operations.inactive') }}
                                                @endif
                                            </td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <a class="colo-app" href="{{ action('StoreController@edit', $item->id) }}"><i class="fa fa-edit"></i> {{ trans('Core::operations.edit') }}</a>
                                                {{--<a class="colo-rej" onclick="confirmDelete(this)" data-toggle="modal" data-href="#full-width" data-id="{{ $item->id }}" @if($item->trans) data-title="{{ $item->trans->name }}" @endif href="#full-width"><i class="fa fa-trash"></i> {{ trans('Core::operations.delete') }}</a>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <label for="operation">{{ trans('Core::operations.with_select') }}</label>
                                <select name="operation" id="operation" class="form-control" required="required">
                                    <option value="">- {{ trans('Core::operations.select') }} -</option>
                                    <option value="activate">{{ trans('Core::operations.activate') }}</option>
                                    <option value="deactivate">{{ trans('Core::operations.deactivate') }}</option>
                                    <option value="delete">{{ trans('Core::operations.delete') }}</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ trans('Core::operations.go') }}</button>
                            <div class="table-footer">
                                <div class="count"><i class="fa fa-folder-o"></i> {{ $items->total() }} {{ trans('Core::operations.item') }}</div>
                                <div class="pagination-area"> {!! $items->render() !!} </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <!-- Modal -->
    <div class="modal fade" id="product-import-method" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Import Product Method
                    </h4>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">

                    <form role="form">
                        <div class="row">
                            <div class="paymentCont">
                                <div class="headingWrap">
                                    <h3 class="headingTop text-center">Select Your Product Import Method</h3>
                                    <!--                                        <p class="text-center">Select Your Payment Method</p>-->
                                </div>
                                <div class="paymentWrap">
                                    <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                                        <label class="btn paymentMethod active" id="btn_card_level">
                                            <div class="method credit-card"></div>
                                            <input type="radio" name="pay_type" id="opt_card" value="creditCard" checked="checked"/>
                                        </label>
                                        <label class="btn paymentMethod" id="btn_paypal_level">
                                            <div class="method paypal"></div>
                                            <input type="radio" name="pay_type" id="opt_paypal" value="paypal">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning"
                            data-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
<!--close modal-->
    <script src="{{ asset('public/admin_assets/js/index-operations.js') }}"></script>
@endsection