'use strict';

// var tabs = '.nav-tabs li';
var tabs = '#qurative_media_modal .nav-tabs li';
var mediaLibraryTab = '#qurative_media_library_tab';
var uploadFilesTab = '#qurative_upload_files_tab';

var containers = '.qurative-container';
var mediaLibrary = '#qurative_media_library';
var uploadFiles = '#qurative_upload_files';

var maxUploadFileSize = 2000000;
var validateFileSizeErrorMsg = $('#max_file_size_validation').val();

var files;
var dropArea = document.getElementById("qurative_upload_files_area");

var multipleSelect = false;
var individualRequired = false;

var selectButtonName;
var defaultSelectButtonName = 'Choose'

var mediaItemFieldName;

var loadedData = [];

// progress
var progressPercent = 0;

// Settings
var paginationPage = 1;
var isLoading = false;
var stopLoadPagination = false;
var dataPosition = 'top';

var richTextModal = false;
var richTextFieldName;



/*
 * 
 */
function openModalEvent() {
    $('#qurative_media_modal').on('show.bs.modal', function(e) {
        // Reset to default settings
        $('#qurative-no-more-files').hide();
        paginationPage = 1;
        isLoading = false;
        stopLoadPagination = false;
        dataPosition = 'top';
        // Load fresh data
        $('.qurative-media-list ul li').remove();
        loadFiles();

        // Reset progress bar
        $('#qurative_media_modal .upload-error').remove();
        $("#qurative_media_modal .progress").hide();
        $("#qurative_media_modal .progress .progress-bar").css("width", +0 + "%");
        $("#qurative_media_modal .progress .progress-bar").text('');
        $("#qurative_media_modal .progress .progress-bar").attr('aria-valuenow', 0);

        // Remove validation errors
        $('#qurative_media_modal .validation-error').remove();
        $('#qurative_media_modal .upload-files-info').remove();
        $('#qurative_media_modal .media-sidebar .upload-success-message').remove();
    });

}
openModalEvent();

/*
 * 
 */
function initMediafields() {

    $('[data-target="#qurative_media_modal"]').click(function() {
        // Add overflow style to HTML
        $('html').css('overflow', 'hidden');
        // Remove other active media
        $('[data-target="#qurative_media_modal"]').removeClass('active-media-modal');
        // Add active media to current field
        $(this).addClass('active-media-modal');

        /* Get options */
        // selectButtonName
        selectButtonName = $('.active-media-modal').attr('media-data-button-name');
        if (selectButtonName) {
            $('#qurative_media_modal .modal-footer button#set-choosed-file').text(selectButtonName);
        } else {
            $('#qurative_media_modal .modal-footer button#set-choosed-file').text(defaultSelectButtonName);
        }

        // Media item field name
        mediaItemFieldName = $('.active-media-modal').attr('media-data-field-name');

        // Multiple select
        var multipleSelectAttr = $('.active-media-modal').attr('media-data-multiple');
        if (typeof multipleSelectAttr !== typeof undefined && multipleSelectAttr !== false) {
            multipleSelect = true;
        }

        // individual required
        var individualRequiredAttr = $('.active-media-modal').attr('media-data-required');
        if (typeof individualRequiredAttr !== typeof undefined && individualRequiredAttr !== false) {
            individualRequired = true;
        }


        // // Reset to default settings
        // $('#qurative-no-more-files').hide();
        // paginationPage = 1;
        // isLoading = false;
        // stopLoadPagination = false;
        // dataPosition = 'top';
        // // Load fresh data
        // $('.qurative-media-list ul li').remove();
        // loadFiles();
    });
}
initMediafields();

/*
 * 
 */
function setMediafields() {
    var mediaItem;
    var thumbnail;
    var mediaId;
    $('#qurative_media_modal .modal-footer button#set-choosed-file').on('click', function() {
        // Check if media opend from richText or form anchor
        if (richTextModal == true) {
            $('#' + richTextFieldName).val($('.qurative-media-list li.selected.details').children('div').children('img').attr('src').replace('thumbnail/', ''));
            richTextModal = false;
        } else {
            // Check its individual or bulk media
            // if individual remove old image
            if (multipleSelect === false) {
                $('.active-media-modal .media-item').remove();
            }

            // Append items
            $('.qurative-media-list li.selected').each(function() {
                thumbnail = $(this).children('div').children('img').attr('src');
                mediaId = $(this).attr('data-id');
                // Prepare media item
                mediaItem = '<div class="media-item">';
                mediaItem += '<img src="' + thumbnail + '"/>';
                // Check if multiple or not required image add close button
                if (multipleSelect === true || individualRequired === false) {
                    mediaItem += '<a href="javascript:void(0);" class="img-delete">x</a>';
                }
                mediaItem += '<input type="hidden" name="' + mediaItemFieldName + '" value="' + mediaId + '"/>';
                mediaItem += '</div>';

                // Check if gallery add items to parent .qurative-media-gallery
                if (multipleSelect === true) {
                    $('.active-media-modal').parent().children('.qurative-media-gallery').append(mediaItem);
                } else {
                    // Individual
                    $('.active-media-modal').append(mediaItem);
                }
            });

        }
        // finally hide the modal
        $('#qurative_media_modal').modal('hide');
    });
}
setMediafields();

/*
 * 
 */
function enableDisableSetChoosedButton() {
    // Default status
    $('#qurative_media_modal .modal-footer button#set-choosed-file').prop("disabled", true);

    // Check if have any selected files.
    if ($('.qurative-media-list li.selected').length > 0) {
        $('#qurative_media_modal .modal-footer button#set-choosed-file').prop("disabled", false);
    } else if ($('.qurative-media-list li.selected').length === 0) {
        // hide info at sidebar
        $('#qurative_media_modal .file-info').hide();
        $('.media-img-content').removeClass('col-md-9').addClass('col-md-12');
    }
}


/*
 * Set default tab
 */
activeContainer(uploadFiles);

// Listen tab click
$(mediaLibraryTab).click(function() {
    // Active container
    activeContainer(mediaLibrary);
});

// Listen tab click
$(uploadFilesTab).click(function() {
    // Active container
    activeContainer(uploadFiles);
});

/*
 * Set active container
 */
function activeContainer(activeContainer) {
    // Remove all active tabs
    $(tabs).removeClass('active');

    // Hide or show Set media item button
    $('#set-choosed-file').hide();
    if (activeContainer == mediaLibrary) {
        $('#set-choosed-file').show();
    }
    // Add active tab
    $(activeContainer + '_tab').parent().addClass('active');

    // Hide all Containers
    $(containers).hide();

    // Show current container
    $(activeContainer).show();
}

/*
 * Style browse button
 */
function styleBrowseButton() {
    $("#qurative_browse_button").click(function() {
        $("#files").click();
    });
}
styleBrowseButton();

function drop() {
    dropArea.addEventListener("dragleave", function(evt) {
        var target = evt.target;
        if (target && target === dropArea) {
            this.className = "";
            $('.media-modal .qurative-browse-form').css('display', 'block');
            $('.media-modal .qurative-drag-info').css('display', 'none');
        }
        evt.preventDefault();
        evt.stopPropagation();
    }, false);

    dropArea.addEventListener("dragenter", function(evt) {
        this.className = "over-drage";
        $('.media-modal .qurative-browse-form').css('display', 'none');
        $('.media-modal .qurative-drag-info').css('display', 'block');
        evt.preventDefault();
        evt.stopPropagation();
    }, false);

    dropArea.addEventListener("dragover", function(evt) {
        evt.preventDefault();
        evt.stopPropagation();
    }, false);

    dropArea.addEventListener("drop", function(evt) {
        files = evt.dataTransfer.files;
        // Upload files
        ajaxUploadFiles();
        this.className = "";
        $('.media-modal .qurative-browse-form').css('display', 'block');
        $('.media-modal .qurative-drag-info').css('display', 'none');
        evt.preventDefault();
        evt.stopPropagation();
    }, false);
}
drop();

/*
 * init
 */
function init() {
    $('#qurative_media_modal').on('change', '#files', prepareUpload);
}
init();

// Grab the files and set them to our variable
function prepareUpload(event) {
    var selectedFiles = event.target.files;
    var notValidSizeFilesNames = [];
    var sizeValidationErrorMessage = '';
    files = [];

    // Remove any previous errors
    $('#qurative_media_modal .validation-error').remove();
    $('#qurative_media_modal .upload-files-info').remove();
    $('#qurative_media_modal .media-sidebar .upload-success-message').remove();

    // Validtate selected Files
    for (var i = 0; i < selectedFiles.length; i++) {
        //validate FileSize 
        if (validateFileSize(selectedFiles[i]) !== false) {
            // Remove not valide file and push valid file to array
            files.push(selectedFiles[i]);
        } else {
            // Push file name to validation erros list
            notValidSizeFilesNames.push(selectedFiles[i].name);
        }
    }

    // Show validation errors
    if (notValidSizeFilesNames.length > 0) {
        sizeValidationErrorMessage += '<div class="validation-error alert alert-danger">';
        sizeValidationErrorMessage += '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
        sizeValidationErrorMessage += validateFileSizeErrorMsg + '<br />';
        for (var i = 0; i < notValidSizeFilesNames.length; i++) {
            sizeValidationErrorMessage += notValidSizeFilesNames[i] + '<br />';
        }
        sizeValidationErrorMessage += '</div>';
        $('#qurative_upload_files_area').append(sizeValidationErrorMessage);
        $('#qurative_media_modal .media-sidebar').prepend(sizeValidationErrorMessage);
    }

    // Upload valid files
    var uploadFilesMessage = {
        uploadProgress: ' Loading.. ',
        fromOriginal: ' File out ',
        fromSelected: ' Selected file '
    };

    $('#qurative_media_modal .progress').after('<div class="upload-files-info">' + uploadFilesMessage.uploadProgress + files.length + uploadFilesMessage.fromOriginal + selectedFiles.length + uploadFilesMessage.fromSelected + '</div>');
    if (files.length > 0) {
        ajaxUploadFiles();
    }
}


/*
 * Validate file size.
 * Show error message if size is greater than limit.
 */
function validateFileSize(file) {
    if (file.size > maxUploadFileSize) {
        return false;
    }
}

/*
 * Upload file
 * 
 */
function ajaxUploadFiles() {
    var data = new FormData();
    $.each(files, function(key, value) {
        data.append(key, value);
    });

    $.ajax({
        url: javascript_site_path + 'api/bulk-media?files',
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'json',
        xhr: function() {
            //upload Progress
            var xhr = $.ajaxSettings.xhr();
            if (xhr.upload) {
                xhr.upload.addEventListener('progress', function(event) {
                    // Upload progress
                    var position = event.loaded || event.position;
                    var total = event.total;
                    if (event.lengthComputable) {
                        progressPercent = Math.ceil(position / total * 100);
                    }
                    //update progress bar
                    $('#qurative_media_modal .upload-error').remove();
                    $("#qurative_media_modal .progress").show();
                    $("#qurative_media_modal .progress .progress-bar").css("width", +progressPercent + "%");
                    $("#qurative_media_modal .progress .progress-bar").text(progressPercent + "%");
                    $("#qurative_media_modal .progress .progress-bar").attr('aria-valuenow', progressPercent);
                    $("#qurative_media_modal .progress .progress-bar").css("background-color", "#337ab7");
                }, true);
            }
            return xhr;
        },
        mimeType: "multipart/form-data"
    }).done(function(data) { //
        if (typeof data.error === 'undefined') {
            // Success
            uploadedSuccess(data, 'top', true);
        } else {
            // Handle errors here
            console.log('ERRORS: ' + data.error);
        }
        // Hide progress
        $("#qurative_media_modal .progress").hide();
        $("#qurative_media_modal .progress .progress-bar").css("width", +0 + "%");
        $("#qurative_media_modal .progress .progress-bar").text('');
        $("#qurative_media_modal .progress .progress-bar").attr('aria-valuenow', 0);
    }).fail(function(error) {
        $("#qurative_media_modal .progress .progress-bar").css("background-color", "#F44336");
        var uploadError = '<div class="upload-error alert alert-danger">' + error.responseJSON.message + '</div>';
        $('#qurative_upload_files_area').append(uploadError);
    });
}

/*
 * Upload file
 * 
 */
function uploadedSuccess(data, dataPosition, newData) {
    // Add new uploaded files to mediaLibrary
    addUploadedDataToMediaLibrary(data, dataPosition, newData);
    // Show successfull upload message at side menu
    var successUploadMessage = 'A file has been successfully added';
    var successUpload = '';
    successUpload += '<div class="upload-success-message alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
    successUpload += '<strong>' + data.length + '</strong> ' + successUploadMessage + '</div>';
    // Remove upload file info
    $('#qurative_media_modal .upload-files-info').remove();
    // Add success mesage to sidebar
    $('#qurative_media_modal .media-sidebar').prepend(successUpload);
    // Active container
    activeContainer(mediaLibrary);
}

/*
 * addUploadedDataToMediaLibrary
 * 
 */
function addUploadedDataToMediaLibrary(data, dataPosition, newData) { // default top for new uploaded data

    if (dataPosition == "")
        dataPosition = "";

    if (newData == "")
        newData = "";



    var thumbnail = '';
    // Loop through data
    for (var i = 0; i < data.length; i++) {
        thumbnail += '<li data-id="' + data[i].id + '">';
        thumbnail += '<div>';
        thumbnail += '<img src="' + javascript_site_path + '' + getThumbnailCoverImage(data[i]) + '">';
        thumbnail += '</div>';
        thumbnail += '<button type="button" class="button-link check" tabindex="0">';
        thumbnail += '<span class="media-modal-icon"></span>';
        thumbnail += '<span class="screen-reader-text">Deselect</span>';
        thumbnail += '</button>';
        thumbnail += '</li>';
        loadedData.push(data[i]);
    }
    // Push new data to media library
    if (dataPosition == 'bottom') {
        $('.qurative-media-list ul').append(thumbnail);
    } else if (dataPosition == 'search') {
        $(".qurative-media-list ul").replaceWith('<ul>' + thumbnail + '</ul>');
    } else {
        $('.qurative-media-list ul').prepend(thumbnail);
        // Select new files
        if (newData === true) {
            data.reverse();
            for (var i = 0; i < data.length; i++) {
                activeFileDetails($('.qurative-media-list ul li[data-id="' + data[i].id + '"] div'));
            }
        }

    }
    toggleSelectFile();
}

function getThumbnailCoverImage(file) {
    var imagesExtensions = ['jpg', 'png', 'gif','jpeg','JPG','PNG','GIF','JPEG'];
    var videosExtensions = ['flv', 'mp4', 'oog', 'webm', 'avi'];
    var audiosExtensions = ['3gp', 'mp3', 'wav'];

    var thumbnailCoverImage = 'vendor/media/images/file.png';
    if (imagesExtensions.indexOf(file.extension) != -1) {
        thumbnailCoverImage = file.options.styles.thumbnail;
    } else if (videosExtensions.indexOf(file.extension) != -1) {
        thumbnailCoverImage = 'vendor/media/images/video.png';
    } else if (audiosExtensions.indexOf(file.extension) != -1) {
        thumbnailCoverImage = 'vendor/media/images/audio.png';
    } else if (file.extension == 'pdf') {
        thumbnailCoverImage = 'vendor/media/images/pdf.png';
    } else if (file.extension == 'docx' || file.extension == 'doc') {
        thumbnailCoverImage = 'vendor/media/images/word.png';
    } else if (file.extension == 'pptx') {
        thumbnailCoverImage = 'vendor/media/images/powerpoint.png';
    }
    return thumbnailCoverImage;
}
/*
 * loadFiles
 * 
 */
function loadFiles(q,page) {

    if(q=="")
        q = "";

    if(page=="")
        page = 1;

    $.ajax({
        url: javascript_site_path + 'api/media',
        type: 'GET',
        cache: false,
        data: {
            q: q,
            page: page
        },
        dataType: 'json',
        success: function(data, textStatus, jqXHR) {
            if (typeof data.error === 'undefined') {
                // Success
                if (page && page > 1) {
                    dataPosition = 'bottom';
                } else if (page && page == 1 && q !== '') {
                    dataPosition = 'search';
                    paginationPage = 1;
                    isLoading = false;
                    stopLoadPagination = false;
                    scrollPaginationLoad();

                } else if (page && page == 1 && q == '') {
                    $('.qurative-media-list ul li').remove();
                }

                addUploadedDataToMediaLibrary(data.data, dataPosition);
                // Reset settings
                isLoading = false;
                dataPosition = 'top';

                if (data.data.length == 0) {
                    // Show no more files message
                    $('#qurative-no-more-files').show();
                    stopLoadPagination = true;
                } else {
                    $('#qurative-no-more-files').hide();
                    stopLoadPagination = false;
                }
            } else {
                // Handle errors here
                console.log('ERRORS: ' + data.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Handle errors here
            console.log('ERRORS: ' + textStatus);
            // STOP LOADING SPINNER
        }
    });
}
loadFiles();


function searchFiles() {
    $('#qurative_media_search').off('keyup').on('keyup', function() {
        // Empty
        $('.qurative-media-list ul li').remove();
        $('#qurative-no-more-files').hide();

        // load filss
        loadFiles($('#qurative_media_search').val(), 1);
    });
}
searchFiles();

function scrollPaginationLoad() {
    $('.qurative-media-list').off('scroll').on('scroll', function() {
        if ($('.qurative-media-list').scrollTop() + $('.qurative-media-list').height() >= $('.qurative-media-list ul').height() && !isLoading && !stopLoadPagination) {
            isLoading = true;
            paginationPage++;

            // Call load data function
            loadFiles('', paginationPage);
        }

    });
}
scrollPaginationLoad();

/*
 * Toggle select file
 */
function toggleSelectFile() {

    $('.qurative-media-list li button').off("click").on('click', function() {
        $(this).removeClass('active');
        $(this).parent().removeClass('selected');
        $(this).parent().removeClass('details');
        activeOtherSelectedFileDetails();

        // Enable or Disable Set Choosed Button
        enableDisableSetChoosedButton();
    });

    $('.qurative-media-list li div').off("click").on('click', function() {
        if ($(this).parent().hasClass('selected') && $(this).parent().hasClass('details')) {
            $(this).parent().removeClass('selected');
            $(this).parent().removeClass('details');
            activeOtherSelectedFileDetails();
        } else if (($(this).parent().hasClass('selected') === false && $(this).parent().hasClass('details') === false)
            || ($(this).parent().hasClass('selected') === true && $(this).parent().hasClass('details') === false)) {
            activeFileDetails($(this));
        }

        // Hide button
        $(this).parent().children('button').removeClass('active');
        // // Show button if li is selected
        if ($(this).parent().hasClass('selected')) {
            $(this).parent().children('button').addClass('active');
        }

        // Enable or Disable Set Choosed Button
        enableDisableSetChoosedButton();
    });

    // Enable or Disable Set Choosed Button
    enableDisableSetChoosedButton();
}

toggleSelectFile();

/*
 * Toggle select file
 */
function activeFileDetails($selectedListItemDiv) {
    // Check if multiple select allowed 
    if (multipleSelect === false) {
        $('.qurative-media-list li').removeClass('selected');
        $('.qurative-media-list li button').removeClass('active');
    }
    $('.qurative-media-list li').removeClass('details');
    $selectedListItemDiv.parent().addClass('details');
    $selectedListItemDiv.parent().addClass('selected');

    if ($selectedListItemDiv.parent().hasClass('selected')) {
        $selectedListItemDiv.parent().children('button').addClass('active');
    }


    var activeItem = getLoadedDataByFileID($selectedListItemDiv.parent().attr('data-id'));
    // Set sidebar fields with current data
    $('#qurative_media_modal .file-info .thumbnail img').attr('src', javascript_site_path + getThumbnailCoverImage(activeItem));
    $('#qurative_media_modal .file-info .details .filename b').text(activeItem.filename);
    $('#qurative_media_modal .file-info .details .uploaded').text(activeItem.created_at);
    $('#qurative_media_modal .file-info .details .file-size').text(activeItem.file_size);
    $('#qurative_media_modal .file-info .details .dimensions').text(activeItem.width + ' × ' + activeItem.height);

    $('#delete_file').attr('data-file-id', activeItem.id);
    $('#media_item_url').val(activeItem.url);
    $('#media_item_title').val(activeItem.title);
    $('#media_item_caption').val(activeItem.caption);
    $('#media_item_alt').val(activeItem.alt);
    $('#media_item_description').val(activeItem.description);
    // Show info at sidebar
    $('.media-img-content').removeClass('col-md-12').addClass('col-md-9');
    $('#qurative_media_modal .file-info').show();

    // Listen to events
    updateItemfieldsListener(activeItem);
    // Listen to delete file event
    listenToDeleteFile();
}

/*
 * 
 */
function updateItemfieldsListener(activeItem) {
    var item = {};
    // Fields
    item.title = $('#media_item_title').val();
    item.caption = $('#media_item_caption').val();
    item.alt = $('#media_item_alt').val();
    item.description = $('#media_item_description').val();

    // Events
    // Title field
    $('#media_item_title').off('change').on('change', function() {
        item.title = $('#media_item_title').val();
        updateItemfields(activeItem, item);
    });

    // Caption field
    $('#media_item_caption').off('change').on('change', function() {
        item.caption = $('#media_item_caption').val();
        updateItemfields(activeItem, item);
    });

    // Alt field
    $('#media_item_alt').off('change').on('change', function() {
        item.alt = $('#media_item_alt').val();
        updateItemfields(activeItem, item);
    });

    // Description field
    $('#media_item_description').off('change').on('change', function() {
        item.description = $('#media_item_description').val();
        updateItemfields(activeItem, item);
    });
}

function updateItemfields(activeItem, item) {
    // Update local data "LoadedData"
    activeItem.title = item.title;
    activeItem.caption = item.caption;
    activeItem.alt = item.alt;
    activeItem.description = item.description;
    var updatedItem = updateLoadedDataByFileID(activeItem.id, activeItem);

    // Then update server
    $.ajax({
        url: javascript_site_path + 'api/media/' + activeItem.id,
        type: 'PATCH',
        data: item,
        cache: false,
        dataType: 'json',
        success: function(data, textStatus, jqXHR) {
            if (typeof data.error === 'undefined') {
                // Success

            } else {
                // Handle errors here
                console.log('ERRORS: ' + data.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Handle errors here
            console.log('ERRORS: ' + textStatus);
            // STOP LOADING SPINNER
        }
    });
}

/*
 * 
 */
function getLoadedDataByFileID(id) {
    for (var i = 0; i < loadedData.length; i++) {
        if (loadedData[i].id == id) {
            return loadedData[i];
        }
    }
}

/*
 * 
 */
function updateLoadedDataByFileID(id, newData) {
    for (var i = 0; i < loadedData.length; i++) {
        if (loadedData[i].id == id) {
            loadedData[i] = newData;
        }
        return loadedData[i];
    }
}

/*
 * 
 */
function activeOtherSelectedFileDetails() {
    $('.qurative-media-list li.selected div').each(function(index, element) {

        if (index === 0) {
            activeFileDetails($(element));
        }
    });
}

/*
 * 
 */
function listenToDeleteFile() {
    $('body').off('click').on('click', '#delete_file', function() {
        if (confirm('Do you really want this image?')) {
            $.ajax({
                url: javascript_site_path + 'api/media/' + $('#delete_file').attr('data-file-id'),
                type: 'DELETE',
                //data: item,
                cache: false,
                dataType: 'json',
                success: function (data, textStatus, jqXHR) {
                    if (typeof data.error === 'undefined') {
                        // Success
                        // hide info at sidebar
                        $('#qurative_media_modal .file-info').hide();
                        $('.media-img-content').removeClass('col-md-9').addClass('col-md-12');
                        $('li.details.selected').remove();
                    } else {
                        // Handle errors here
                        console.log('ERRORS: ' + data.error);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Handle errors here
                    console.log('ERRORS: ' + textStatus);
                    // STOP LOADING SPINNER
                }
            });
        }
    });
}

/*
 * 
 */
function closeModalEvent() {
    $('#qurative_media_modal').on('hide.bs.modal', function(e) {
        $('html').css('overflow', '');
        // Rest settings
        $('.active-media-modal').removeClass('active-media-modal');
        $('#qurative_media_modal .modal-footer button#set-choosed-file').text(defaultSelectButtonName);
        multipleSelect = false;
        individualRequired = false;
    });
}
closeModalEvent();



function sortMediaGallery() {
    $(".qurative-media-gallery").sortable(
        {helper: "clone"}
    );
}
sortMediaGallery();

function removeMediaItem() {
    // $('body').off('click').on('click', '.media-item .img-delete', function() {
    $(document).on('click', '.media-item a.img-delete', function(e) {
        $(this).parent().remove();
    })
}
removeMediaItem();