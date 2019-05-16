<!-- fullwidth modal-->
<div class="bootbox modal fade bootbox-alert show" id="full-width" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title"><i class="material-icons">delete</i> {{ trans('admin.delete_confirmation') }}</h4>
                <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{ route('admin-delete-item') }}" method="POST" role="form">
                <input type="hidden" id="confirm-id" name="id" value="">
                <input type="hidden" name="table" value="{{ $dbTable }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                    <div class="alert alert-danger alert-styled-left alert-dismissible">
                        <h6 class="font-weight-semibold">Please make sure, what type of action you are performing</h6>
                        <p>Would you like to delete this item?</p>
                        <p>You won't be able to revert this!</p>
                    </div>
                    {{--<div class="form-group row">
                        <label for="captcha">I am not a robot</label>

                    </div>--}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Do you really want to delete it?')">{{ trans('admin.delete') }}</button>
                    <button type="button" data-dismiss="modal" class="btn btn-outline-primary">{{ trans('admin.cancel') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END modal-->