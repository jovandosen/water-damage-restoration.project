(function ($, window, document) {
    'use strict';
    $(document).ready(function () { 
        
        $(".delete-contact-data-button").on("click", function(){
            
            var contactDetailsId = this.id;

            $.post(
                edit_contact_admin_js_obj.url, 
                {
                    action: 'delete_contact_details',
                    _ajax_nonce: edit_contact_admin_js_obj.nonce,
                    contactDetailsId: contactDetailsId   
                },
                function(data){
                    if(data == 'deleted'){
                        location.reload();
                    }
                }
            );

        });

        $(".contact-table-rows").on("click", function(){

            $("#con-name").val('');
            $("#con-email").val('');
            $("#con-phone").val('');
            $("#con-description").val('');
            $("#con-id").val('');

            var nameData = $(this).children().eq(0).text();
            var emailData = $(this).children().eq(1).text();
            var phoneData = $(this).children().eq(2).text();
            var descriptionData = $(this).children().eq(3).text();
            var buttonData = $(this).children().eq(4).children();
            var idData = $(buttonData).attr("id");

            $("#con-name").val(nameData);
            $("#con-email").val(emailData);
            $("#con-phone").val(phoneData);
            $("#con-description").val(descriptionData);
            $("#con-id").val(idData);

        });

        $("#clear-form-btn").on("click", function(){

            $("#con-name").val('');
            $("#con-email").val('');
            $("#con-phone").val('');
            $("#con-description").val('');
            $("#con-id").val('');
            
        });

        $("#update-contact-btn").on("click", function(){

            var conName = $("#con-name").val();
            var conEmail = $("#con-email").val();
            var conPhone = $("#con-phone").val();
            var conDescription = $("#con-description").val();
            var conId = $("#con-id").val();

            var conNameError = '';
            var conEmailError = '';
            var conPhoneError = '';
            var conDescriptionError = '';
            var conError = false;

            conName = conName.trim();
            conEmail = conEmail.trim();
            conPhone = conPhone.trim();
            conDescription = conDescription.trim();
            
            if(conName == ''){
                conNameError = 'Name Required.';
                conError = true;
                $("#con-name").addClass('con-form-error');
                $("#con-name").attr("placeholder", conNameError);
            } else {
                $("#con-name").removeClass('con-form-error');
                $("#con-name").attr("placeholder", "Name...");
            }
            
            if(conEmail == ''){
                conEmailError = 'Email Required.';
                conError = true;
                $("#con-email").addClass('con-form-error');
                $("#con-email").attr("placeholder", conEmailError);
            } else if(validateContactEmail(conEmail) === false){
                conEmailError = 'Invalid Email.';
                conError = true;
                $("#con-email").addClass('con-form-error');
                $("#con-email").attr("placeholder", conEmailError);
            } else {
                $("#con-email").removeClass('con-form-error');
                $("#con-email").attr("placeholder", "Email...");
            }
            
            if(conPhone == ''){
                conPhoneError = 'Phone Required.';
                conError = true;
                $("#con-phone").addClass('con-form-error');
                $("#con-phone").attr("placeholder", conPhoneError);
            } else if(validateContactPhone(conPhone) === false){
                conPhoneError = 'Invalid Phone Format.';
                conError = true;
                $("#con-phone").addClass('con-form-error');
                $("#con-phone").attr("placeholder", conPhoneError);
            } else {
                $("#con-phone").removeClass('con-form-error');
                $("#con-phone").attr("placeholder", "Phone...");
            }
            
            if(conDescription == ''){
                conDescriptionError = 'Description Required.';
                conError = true;
                $("#con-description").addClass('con-form-error');
                $("#con-description").attr("placeholder", conDescriptionError);
            } else {
                $("#con-description").removeClass('con-form-error');
                $("#con-description").attr("placeholder", "Description...");
            }
            
            if(conError === false){

                $.post(
                    edit_contact_admin_js_obj.url, 
                    {
                        action: 'update_contact_details',
                        _ajax_nonce: edit_contact_admin_js_obj.nonce,
                        conName: conName,
                        conEmail: conEmail,
                        conPhone: conPhone,
                        conDescription: conDescription,
                        conId: conId    
                    },
                    function(data){
                        if(data == 'updated'){
                            location.reload();
                        }
                    }
                );

            }

        });

    });
}(jQuery, window, document));

function validateContactEmail(email)
{
    var regularEx = /\S+@\S+\.\S+/;
    return regularEx.test(email);
}

function validateContactPhone(phone)
{
    var phoneRegularEx = /^(\d+-?)+\d+$/;
    return phoneRegularEx.test(phone);
}