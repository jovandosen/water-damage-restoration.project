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

    });
}(jQuery, window, document));