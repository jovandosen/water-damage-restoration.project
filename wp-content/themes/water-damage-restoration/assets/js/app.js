(function ($, window, document) {
    'use strict';
    $(document).ready(function () { 

        $("#toggle-nav-links").on("click", function(){
            $("#links-container").toggle('slow');
        });

        $(window).scroll(function(){
            if($(this).scrollTop() > 0){
                $("#top-info").fadeOut();
            } else {
                $("#top-info").fadeIn();
            }
        });
        
    });
}(jQuery, window, document));