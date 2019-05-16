$('#checkall').on('click',function(){
    if(this.checked){
        $('.check_list').each(function(){
            this.checked = true;
        });
    }else{
        $('.check_list').each(function(){
            this.checked = false;
        });
    }
});

$('.check_list').on('click',function(){
    if($('.check_list:checked').length == $('.check_list').length){
        $('#checkall').prop('checked',true);
    }else{
        $('#checkall').prop('checked',false);
    }
});

//single delete item

function confirmDelete(item) {
    var id = item.getAttribute("data-id");
    var title = item.getAttribute("data-title");

    $("#confirm-id").val(id);
    document.getElementById("confirm-title").innerHTML = title;
}


// Bulk items delete
function bulkconfirmDelete() {
    var bulkForm = $('#bulk');
    var operation = $('#operation');
    var bulkDataHtml = $('#bulk-data');

    bulkForm.submit(function( event ) {
      if(operation.val() === 'delete'){
        event.preventDefault();
        if($('.check_list:checked').length > 0){
            // Manage checked items
            bulkDataHtml.html('');
            $('.check_list:checked').each(function() {
                // Append ids
                bulkDataHtml.append( '<input type="hidden" name="ids[]" value="'+this.value+'">' );
                // append titles
//                bulkDataHtml.append( '<h3>' + $( this ).parent().parent().attr('data-title') + '</h3>' );
                bulkDataHtml.append( '<h5>' + $('.user_name_col_'+this.value).text() + '</h5>' );
            });

            // Open bulk confirm modal
            $('#Bulk-confirm').modal({
                     show: true
                });
            }
        }
    });

}
bulkconfirmDelete();