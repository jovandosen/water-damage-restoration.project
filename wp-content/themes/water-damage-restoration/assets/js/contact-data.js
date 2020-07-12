(function ($, window, document) {
    'use strict';
    $(document).ready(function () { 

        $("#contact-button").on("click", function(){

            var name = $("#name").val();
            var email = $("#email").val();
            var phoneNumber = $("#phone-number").val();
            var shortDescription = $("#short-description").val();

            var nameError = '';
            var emailError = '';
            var phoneNumberError = '';
            var shortDescriptionError = '';
            var formError = false;

            name = name.trim();
            email = email.trim();
            phoneNumber = phoneNumber.trim();
            shortDescription = shortDescription.trim();

            if(name == ''){
                nameError = 'Name Required.';
                formError = true;
                $("#name").addClass('contact-form-error'); // contact-form-error class is defined in app.css
                $("#name").attr("placeholder", nameError);
            } else {
                $("#name").removeClass('contact-form-error');
                $("#name").attr("placeholder", "* Name");
            }

            if(email == ''){
                emailError = 'Email Required.';
                formError = true;
                $("#email").addClass('contact-form-error');
                $("#email").attr("placeholder", emailError);
            } else if(validateEmail(email) === false){
                emailError = 'Invalid Email.';
                formError = true;
                $("#email").addClass('contact-form-error');
                $("#email").attr("placeholder", emailError);
            } else {
                $("#email").removeClass('contact-form-error');
                $("#email").attr("placeholder", "* Email");
            }

            if(phoneNumber == ''){
                phoneNumberError = 'Phone Required.';
                formError = true;
                $("#phone-number").addClass('contact-form-error');
                $("#phone-number").attr("placeholder", phoneNumberError);
            } else if(validatePhone(phoneNumber) === false){
                phoneNumberError = 'Invalid Phone Format.';
                formError = true;
                $("#phone-number").addClass('contact-form-error');
                $("#phone-number").attr("placeholder", phoneNumberError);
            } else {
                $("#phone-number").removeClass('contact-form-error');
                $("#phone-number").attr("placeholder", "* Phone Number");
            }

            if(shortDescription == ''){
                shortDescriptionError = 'Description Required.';
                formError = true;
                $("#short-description").addClass('contact-form-error');
                $("#short-description").attr("placeholder", shortDescriptionError);
            } else {
                $("#short-description").removeClass('contact-form-error');
                $("#short-description").attr("placeholder", "* Short Description");
            }

            if(formError === false){

                $.post(
                    contact_form_obj.url, 
                    {
                        action: 'contact_form_data',
                        _ajax_nonce: contact_form_obj.nonce,
                        name: name,
                        email: email,
                        phoneNumber: phoneNumber,
                        shortDescription: shortDescription    
                    },
                    function(data){
                        if(data){
                            $("#name").val('');
                            $("#email").val('');
                            $("#phone-number").val('');
                            $("#short-description").val('');
                            alert('You have successfully submitted contact details.');
                        }
                    }
                );

            }

        });

    });
}(jQuery, window, document));

function validateEmail(email)
{
    var regularEx = /\S+@\S+\.\S+/;
    return regularEx.test(email);
}

function validatePhone(phone)
{
    var phoneRegularEx = /^(\d+-?)+\d+$/;
    return phoneRegularEx.test(phone);
}