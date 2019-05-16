$(function () {
    // create a custom phone number rule called 'intlTelNumber'
    jQuery.validator.addMethod("intlTelNumber", function(value, element) {
        return this.optional(element) || $(element).intlTelInput("isValidNumber");
    }, "Please enter a valid International Phone Number");
    // It has the name attribute "registration"
    $("#frm_create_edit").validate({
        onkeyup:false,
        rules:{
            name:{
                required: true,
                full_name: true
            },
            email:{
                required: true,
                email: true/*,
                 remote: {
                 url: $("#base_path").val()+'check-email-vailability',
                 type: 'GET',
                 delay: 1000,
                 message: 'The email is not available.'
                 }*/
            },
            phone:{
                required: true,
                intlTelNumber:true
            },
            role:{
              required:true
            },
            password:{
                required: true,
                minlength: 6
            },
            password_confirmation:{
                required: true,
                minlength: 6,
                equalTo: '#password'
            }
        },
        messages:{
            name:{
                required: "The name field is mandatory!",
                full_name: "Please Include First and Last Name."
            },
            email:{
                required: "The Email is required!",
                email: "Please enter a valid email address!",
                remote: "The email is already in use by another user!"
            },
            phone:{
                required: "The phone number is required!"
            },
            role:{
                required: "Please select role."
            },
            password: {
                required: "Please enter new password.",
                minlength: "Please enter at least {0} characters.",
                remote: "Choose a password you haven't previously used with this account."
            },
            password_confirmation: {
                required: "Please enter confirm password.",
                minlength: "Please enter at least {0} characters.",
                equalTo: "New password doesn't match with confirm password."
            }
        },
        submitHandler: function(form) {
            $( "#btn_create" ).click(function() {
                if ($('#frm_create_edit').validate()){
                    $('#frm_create_edit').submit();
                    return true;
                }else{
                    return false;
                }
            });
        }
    });
});