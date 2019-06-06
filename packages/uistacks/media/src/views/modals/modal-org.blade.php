<style type="text/css">

</style>
<input type="hidden" id="max_file_size_validation" value="{{trans('Media::media.max_file_size_validation')}}"/>
<div class="bootbox modal fade bootbox-alert show" id="qurative_media_modal" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
    <div class="modal-dialog modal-lg">
        <div id="drop-area"></div>
        <div class="modal-content">
            <div class="modal-header bg-purple">
                <h4 class="modal-title">
                    <i class="material-icons">image</i>
                    {{ trans('admin.media_manager') }}
                </h4>
                <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs nav-tabs-highlight mb-0 media-tab media-gradient">
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="qurative_media_library_tab">{{trans('Media::media.media_library')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="qurative_upload_files_tab">{{trans('Media::media.upload_files')}}</a>
                    </li>
                </ul>
                <div class="tab-content card card-body border border-top-0 rounded-top-0 shadow-0 mb-0">
                    <div class="qurative-container" id="qurative_media_library">
                        <div class="row">
                            <div class="col-md-3 file-info">
                                <div class="media-sidebar">

                                    {{--<div class="file-info">--}}
                                    <h2>{{trans('Media::media.file_information')}}</h2>
                                    <div class="thumbnail thumbnail-image">
                                        <img src="" draggable="false" alt="">
                                    </div>
                                    <div class="details">
                                        <div class="filename"><b></b></div>
                                        <div class="uploaded"></div>
                                        <div class="file-size"></div>
                                        <div class="dimensions"></div>
                                        {{-- <a class="edit" href="">Edit</a> --}}
                                        <a id="delete_file" class="btn btn-sm btn-outline-danger" href="javascript:void(0);" data-file-id=""><i class="material-icons">delete</i> {{trans('Media::media.delete')}}</a>
                                        <div class="compat-meta"></div>
                                    </div>
                                    <div style="clear: both;"></div>
                                    <div>
                                        <div class="form-group">
                                            <label for="url">{{trans('Media::media.link')}}</label>
                                            <input type="text" class="form-control" id="media_item_url" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="title">{{trans('Media::media.title')}}</label>
                                            <input type="text" class="form-control" id="media_item_title" value="">
                                        </div>

                                        <div class="form-group">
                                            <label for="caption">{{trans('Media::media.comment')}}</label>
                                            <textarea class="form-control" id="media_item_caption" rows="3"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="alt">{{trans('Media::media.alt_text')}}</label>
                                            <input type="text" class="form-control" id="media_item_alt">
                                        </div>

                                        <div class="form-group">
                                            <label for="description">{{trans('Media::media.description')}}</label>
                                            <textarea class="form-control" id="media_item_description" rows="3"></textarea>
                                        </div>
                                    </div>
                                    {{--</div>--}}
                                </div>
                            </div>
                            <div class="col-md-9 media-img-content">
                                <div class="media-content">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="qurative_media_search" placeholder="Search...">
                                    </div>
                                    <div class="qurative-media-list">
                                        <ul></ul>
                                        <div id="qurative-no-more-files">{{trans('Media::media.no_other_files')}}</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="qurative-container" id="qurative_upload_files">
                        <div id="qurative_upload_files_area">
                            <div class="qurative-browse-form">
                                <form action="" method="POST" role="form" enctype="multipart/form-data">
                                    <input style="display: none;" type="file" id="files" name="files" multiple>
                                </form>
                                <div id="qurative_browse_button"
                                     class="fileuploader-dragdrop"
                                     ondragover="allowDrop(event)"
                                     ondragleave="leaveDrop(event)"
                                >
                                    <h4 class="fileuploader-input-caption"><span>Drag and drop images here</span></h4>
                                    <p>or</p>
                                    {{--<a href="javascript:;" id="qurative_browse_button" class="btn-sm btn-primary">Browse Images</a>--}}
                                    <a href="javascript:;" class="btn-sm btn-primary">Browse Images</a>
                                </div>
                                <p>or</p>
                                <div class="row">
                                    <div class="col-md-6 offset-md-3">
                                        <div class="input-group">
                                            <input  type="text" name="urlFile" id="urlFile" placeholder="Enter image url" class="form-control border-right-0"  />
                                            <span class="input-group-append">
                                                <button type="button" class="btn bg-primary" id="hide_spin" onclick="fetchImageUrlToGallery()">
                                                    <span class="ladda-label">{{trans('Media::media.go')}}</span>
                                                </button>
                                            </span>
                                            {{--<i class="icon-spinner9 spinner" id="go_spin" style="display:none;"></i>--}}
                                            <img src="{{ url('/') }}/assets/images/loading.gif" id="go_spin" style="display:none;" />
                                        </div>
                                    </div>
                                </div>
                                {{--                                <p>{{trans('Media::media.maximum_file_size')}}</p>--}}
                            </div>
                            {{--<p class="qurative-drag-info">{{trans('Media::media.drop_file_to_upload')}}</p>--}}
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" data-dismiss="modal" class="btn-sm btn-outline-success" id="set-choosed-file">Select Images</button>
            </div>
        </div>
    </div>
</div>
<script>
    function allowDrop(event) {
        event.preventDefault();
//        event.target.style.border = "2px dotted green";
        $('#qurative_browse_button').addClass('drag-drop');
    }
    function leaveDrop() {
        $('#qurative_browse_button').removeClass('drag-drop');
    }
</script>
