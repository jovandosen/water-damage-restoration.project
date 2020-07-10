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
                            alert('You have successfully published details.');
                        }
                    }
                );
            }

        });

    });
}(jQuery, window, document));