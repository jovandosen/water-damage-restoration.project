(function ($, window, document) {
    'use strict';
    $(document).ready(function () { 

        $("#publish-our-services-data").on("click", function(){

            var ourServicesTitle = $("#our-services-title").val();
            var ourServicesDescription = $("#our-services-description").val();

            ourServicesTitle.trim();
            ourServicesDescription.trim();

            var ourServicesTitleError = '';
            var ourServicesDescriptionError = '';
            var error = false;

            if(ourServicesTitle == ''){
                ourServicesTitleError = 'Title Required.';
                error = true;
                $("#our-services-title").addClass('field-error');
                $("#our-services-title").attr("placeholder", ourServicesTitleError);
            } else {
                $("#our-services-title").removeClass('field-error');
                $("#our-services-title").attr("placeholder", "Enter Our Services Title...");
            }

            if(ourServicesDescription == ''){
                ourServicesDescriptionError = 'Description Required.';
                error = true;
                $("#our-services-description").addClass('field-error');
                $("#our-services-description").attr("placeholder", ourServicesDescriptionError);
            } else {
                $("#our-services-description").removeClass('field-error');
                $("#our-services-description").attr("placeholder", "Enter Our Services Description...");
            }

            if(error === false){
                $.post(
                    edit_homepage_admin_js_obj.url, 
                    {
                        action: 'publish_our_services_data',
                        _ajax_nonce: edit_homepage_admin_js_obj.nonce,
                        ourServicesTitle: ourServicesTitle,
                        ourServicesDescription: ourServicesDescription    
                    },
                    function(data){
                        if(data == 'published'){
                            alert('You have successfully published our services details.');
                        }
                    }
                );
            }

        });

        $("#publish-about-us-data").on("click", function(){

            var aboutUsTitle = $("#about-us-title").val();

            aboutUsTitle.trim();

            var aboutUsTitleError = '';
            var aboutUsError = false;

            if(aboutUsTitle == ''){
                aboutUsTitleError = 'Title Required.';
                aboutUsError = true;
                $("#about-us-title").addClass('field-error');
                $("#about-us-title").attr("placeholder", aboutUsTitleError);
            } else {
                $("#about-us-title").removeClass('field-error');
                $("#about-us-title").attr("placeholder", "Enter About Us Title...");
            }

            if(aboutUsError === false){
                $.post(
                    edit_homepage_admin_js_obj.url, 
                    {
                        action: 'publish_about_us_data',
                        _ajax_nonce: edit_homepage_admin_js_obj.nonce,
                        aboutUsTitle: aboutUsTitle    
                    },
                    function(data){
                        if(data == 'published'){
                            alert('You have successfully published about us details.');
                        }
                    }
                );
            }

        });

        $("#publish-emergency-data").on("click", function(){

            var emergencyTitle = $("#emergency").val();

            emergencyTitle.trim();

            var emergencyTitleError = '';
            var emergencyError = false;

            if(emergencyTitle == ''){
                emergencyTitleError = 'Title Required.';
                emergencyError = true;
                $("#emergency").addClass('field-error');
                $("#emergency").attr("placeholder", emergencyTitleError);
            } else {
                $("#emergency").removeClass('field-error');
                $("#emergency").attr("placeholder", "Enter Emergency Title...");
            }

            if(emergencyError === false){
                $.post(
                    edit_homepage_admin_js_obj.url, 
                    {
                        action: 'publish_emergency_data',
                        _ajax_nonce: edit_homepage_admin_js_obj.nonce,
                        emergencyTitle: emergencyTitle   
                    },
                    function(data){
                        if(data == 'published'){
                            alert('You have successfully published emergency details.');
                        }
                    }
                );
            }

        });

        $("#publish-copy-right-data").on("click", function(){

            var copyRightText = $("#copy-right-text").val();

            copyRightText.trim();

            var copyRightTextError = '';
            var copyRightError = false;

            if(copyRightText == ''){
                copyRightTextError = 'Title Required.';
                copyRightError = true;
                $("#copy-right-text").addClass('field-error');
                $("#copy-right-text").attr("placeholder", copyRightTextError);
            } else {
                $("#copy-right-text").removeClass('field-error');
                $("#copy-right-text").attr("placeholder", "Enter Copy Right Text...");
            }

            if(copyRightError === false){
                $.post(
                    edit_homepage_admin_js_obj.url, 
                    {
                        action: 'publish_copy_right_data',
                        _ajax_nonce: edit_homepage_admin_js_obj.nonce,
                        copyRightText: copyRightText   
                    },
                    function(data){
                        if(data == 'published'){
                            alert('You have successfully published copy right details.');
                        }
                    }
                );
            }

        });

    });
}(jQuery, window, document));