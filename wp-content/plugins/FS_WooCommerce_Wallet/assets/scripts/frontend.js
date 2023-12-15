(function (){

    "use strict";

    jQuery(document).ready(function (){
        jQuery('.fsww-request-refund').on('click', function (e) {
            e.preventDefault();

            jQuery('body').addClass('fsww-hide-overflow');
            jQuery('#fsww-refund-modal').prop('action', jQuery(this).attr('href'));
            jQuery('.fsww-modals').show();

        });

        jQuery('#fsww-cancel-request').on('click', function (e) {
            e.preventDefault();

            jQuery('body').removeClass('fsww-hide-overflow');
            jQuery('#fsww-refund-modal').prop('action', '');
            jQuery('.fsww-modals').hide();

        });
    });

})(jQuery);