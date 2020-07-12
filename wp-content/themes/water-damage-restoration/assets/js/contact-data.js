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

        $("#contact-btn").on("click", function(){

            var contactName = $("#contact-name").val();
            var contactEmail = $("#contact-email").val();
            var contactPhoneNumber = $("#contact-phone-number").val();
            var contactDescription = $("#contact-description").val();

            var contactNameError = '';
            var contactEmailError = '';
            var contactPhoneNumberError = '';
            var contactDescriptionError = '';
            var contactFormError = false;

            contactName = contactName.trim();
            contactEmail = contactEmail.trim();
            contactPhoneNumber = contactPhoneNumber.trim();
            contactDescription = contactDescription.trim();

            if(contactName == ''){
                contactNameError = 'Name Required.';
                contactFormError = true;
                $("#contact-name").addClass('contact-form-error');
                $("#contact-name").attr("placeholder", contactNameError);
            } else {
                $("#contact-name").removeClass('contact-form-error');
                $("#contact-name").attr("placeholder", "* Name");
            }

            if(contactEmail == ''){
                contactEmailError = 'Email Required.';
                contactFormError = true;
                $("#contact-email").addClass('contact-form-error');
                $("#contact-email").attr("placeholder", contactEmailError);
            } else if(validateEmail(contactEmail) === false){
                contactEmailError = 'Invalid Email.';
                contactFormError = true;
                $("#contact-email").addClass('contact-form-error');
                $("#contact-email").attr("placeholder", contactEmailError);
            } else {
                $("#contact-email").removeClass('contact-form-error');
                $("#contact-email").attr("placeholder", "* Email");
            }

            if(contactPhoneNumber == ''){
                contactPhoneNumberError = 'Phone Required.';
                contactFormError = true;
                $("#contact-phone-number").addClass('contact-form-error');
                $("#contact-phone-number").attr("placeholder", contactPhoneNumberError);
            } else if(validatePhone(contactPhoneNumber) === false){
                contactPhoneNumberError = 'Invalid Phone Format.';
                contactFormError = true;
                $("#contact-phone-number").addClass('contact-form-error');
                $("#contact-phone-number").attr("placeholder", contactPhoneNumberError);
            } else {
                $("#contact-phone-number").removeClass('contact-form-error');
                $("#contact-phone-number").attr("placeholder", "* Phone Number");
            }
            
            if(contactDescription == ''){
                contactDescriptionError = 'Description Required.';
                contactFormError = true;
                $("#contact-description").addClass('contact-form-error');
                $("#contact-description").attr("placeholder", contactDescriptionError);
            } else {
                $("#contact-description").removeClass('contact-form-error');
                $("#contact-description").attr("placeholder", "* Short Description");
            }
            
            if(contactFormError === false){

                $.post(
                    contact_form_obj.url, 
                    {
                        action: 'side_contact_form_data',
                        _ajax_nonce: contact_form_obj.nonce,
                        contactName: contactName,
                        contactEmail: contactEmail,
                        contactPhoneNumber: contactPhoneNumber,
                        contactDescription: contactDescription    
                    },
                    function(data){
                        if(data){
                            $("#contact-name").val('');
                            $("#contact-email").val('');
                            $("#contact-phone-number").val('');
                            $("#contact-description").val('');
                            $("#side-form-container").toggle("slow");
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