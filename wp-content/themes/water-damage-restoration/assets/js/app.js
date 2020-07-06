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

        $(window).on("resize", function(){
            if($(window).width() > 992){
                $("#links-container").show();
            } else {
                $("#links-container").hide();
            }
        });

        $("#side-contact-form-box").on("click", function(){
            $("#side-form-container").toggle("slow");
        });

    });
}(jQuery, window, document));