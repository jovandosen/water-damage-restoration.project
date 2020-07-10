(function ($, window, document) {
    'use strict';
    $(document).ready(function () { 

        $("#publish-our-services-data").on("click", function(){
            $.post(
                edit_homepage_admin_js_obj.url, 
                {
                    action: 'publish_our_services_data'    
                },
                function(data){
                    console.log(data);
                }
            );
        });

    });
}(jQuery, window, document));