<!-- fullwidth modal-->
<div class="bootbox modal fade bootbox-alert show" id="Bulk-confirm" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title"><i class="material-icons">delete</i> {{ trans('admin.bulk_delete_confirmation') }}</h4>
                <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="bulkDeleteForm" action="{{ route('admin-bulk-delete-items') }}" method="POST" role="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="confirm-table" name="table" value="{{ $dbTable }}">
                <div class="modal-body">
                    <div class="alert alert-danger alert-styled-left alert-dismissible">
                        <h6 class="font-weight-semibold">Please make sure, what type of action you are performing</h6>
                        <p>Would you like to delete these item(s)?</p>
                        <p>You won't be able to revert this action!</p>
                    </div>
                    <div id="bulk-data"></div>
                    {{-- @if($Language->all()->count()> 1)
                        <div class="form-group">
                            <label>{{ trans('admin.select_languages_you_need_to_delete') }}</label>
                            @foreach($Language->all() as $key => $lang)
                            <div class="checkbox">
                                <label for="checkboxes-0">
                                  <input type="checkbox" name="language[{{$key}}]" value="{{$lang->code}}"@if(Lang::getlocale() == $lang->code) checked @endif>
                                  {{$lang->name}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <input type="hidden" name="language[0]" value="{{Lang::getlocale()}}">
                    @endif --}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-danger">{{ trans('admin.delete') }}</button>
                    <button type="button" data-dismiss="modal" class="btn btn-outline-primary">{{ trans('admin.cancel') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END modal-->