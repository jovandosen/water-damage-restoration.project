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

            var nameData = $(this).children().eq(0).text();
            var emailData = $(this).children().eq(1).text();
            var phoneData = $(this).children().eq(2).text();
            var descriptionData = $(this).children().eq(3).text();

            $("#con-name").val(nameData);
            $("#con-email").val(emailData);
            $("#con-phone").val(phoneData);
            $("#con-description").val(descriptionData);

        });

        $("#clear-form-btn").on("click", function(){

            $("#con-name").val('');
            $("#con-email").val('');
            $("#con-phone").val('');
            $("#con-description").val('');
            
        });

    });
}(jQuery, window, document));