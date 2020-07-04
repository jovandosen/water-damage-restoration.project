(function ($, window, document) {
    'use strict';
    $(document).ready(function () { 
        $("#toggle-nav-links").on("click", function(){
            $("#links-container").toggle('slow');
        });
    });
}(jQuery, window, document));