<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Table design <small>Custom design</small></h2>
                    <div class="navbar-right">
                        <a class="btn btn-success" href="{{ action('\Uistacks\Users\Controllers\AdminController@create')}}"><i class="fa fa-plus-circle"></i> {{ trans('Core::operations.create') }} {{ $itemTitle }}</a>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    @if($items->count() || $_GET)
                        @include('Users::users.admin-filter')
                    @endif

                    <form method="POST" action="{{ action('\Uistacks\Users\Controllers\AdminController@bulkOperations')}}" id="bulk" class="form-inline">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                <tr class="headings">
                                    {{--<th>--}}
                                    {{--<input type="checkbox" id="check-all" class="flat">--}}
                                    {{--</th>--}}
                                    <th>
                                        <input type="checkbox" name="check_all" id="checkall">
                                    </th>
                                    <th>{{ trans('Core::operations.image') }}</th>
                                    <th>{{ trans('Core::operations.name') }}</th>
                                    <th>{{ trans('Core::operations.mobile') }}</th>
                                    <th>{{ trans('Core::operations.email') }}</th>
                                    <th>{{ trans('Core::operations.created_at') }}</th>
                                    <th>{{ trans('Core::operations.updated_at') }}</th>
                                    <th>{{ trans('Core::operations.status') }}</th>
                                    <th>{{ trans('Core::operations.operations') }}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($items as $k => $item)
                                    <tr class="@if($k % 2 == 0) even @else odd @endif pointer" @if($item->trans) data-title="{{ $item->trans->name }}" @endif>
                                        <td>
                                            <input type="checkbox" name="ids[]" class="check_list" value="{{$item->id}}">
                                        </td>
                                        <td>
                                            @if(isset($item->media) && isset($item->media->main_image) && isset($item->media->main_image->styles['thumbnail']))
                                                <img width="60" height="60" src="{{url('/')}}/{{ $item->media->main_image->styles['thumbnail'] }}" alt="">
                                            @else
                                                <img src="{{ asset('public/images/select_main_img.png') }}" width="60">
                                            @endif
                                        </td>
                                        <td class="user_name_col_{{$item->id}}">{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            @if($item->updated_at)
                                                {{ $item->updated_at }}
                                            @else
                                                {{ trans('Core::operations.nothing')}}
                                            @endif
                                        </td>
                                        <td>
                                            {{--@if($item->active == true)--}}
                                            {{--{{ trans('Core::operations.active') }}--}}
                                            {{--@else--}}
                                            {{--{{ trans('Core::operations.inactive') }}--}}
                                            {{--@endif--}}
                                            <div id="enable_div{!! $item->id!!}"  @if ($item->active == 1)  style="display:inline-block" @else style="display:none;" @endif >
                                                <a class="label label-success" title="" onClick="changeStatus({!! $item->id !!}, 0);" href="javascript:void(0);" id="status_{!! $item->id !!}">{{ trans('Core::operations.active') }}</a>
                                            </div>
                                            <div id="disable_div{!! $item->id !!}" @if ($item->active == 0) style="display:inline-block" @else  style="display:none;" @endif >
                                                <a class="label label-danger" title="" onClick="changeStatus({!! $item->id !!}, 1);" href="javascript:void(0);" id="status_{!! $item->id !!}">{{ trans('Core::operations.inactive') }}</a>
                                            </div>
                                        {{--@if(Request::segment(4)== 'admin')--}}
                                        {{--<td>--}}
                                        {{--<a class="btn btn-sm btn-danger" href="{{ action('\Uistacks\Users\Controllers\UsersController@givePermission', [$role, $item->id]) }}"><i class="fa fa-edit"></i> {{ trans('Core::operations.permission') }}</a>--}}
                                        {{--</td>--}}
                                        {{--@endif--}}
                                        <td>
                                            <a href="{{ action('\Uistacks\Users\Controllers\AdminController@edit', $item->id) }}"><i class="fa fa-edit"></i> {{ trans('Core::operations.edit') }}</a>
                                            <a onclick="confirmDelete(this)" data-toggle="modal" data-href="#full-width" data-id="{{ $item->id }}" @if($item->trans) data-title="{{ $item->trans->name }}" @endif href="#full-width"><i class="fa fa-trash"></i> {{ trans('Core::operations.delete') }}</a>
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
