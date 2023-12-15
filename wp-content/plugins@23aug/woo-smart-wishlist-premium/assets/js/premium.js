'use strict';

(function($) {
  $(document).on('click touch', '#wpc_add_update_key', function(e) {
    e.preventDefault();

    var $this = $(this);
    var key = $('#wpc_update_key').val();

    if (key.length > 10) {
      $this.val('Adding...');
      $('.wpclever_update_keys_form').addClass('wpclever_update_keys_disabled');

      var data = {
        action: 'wpc_check_update_key',
        key: key,
      };

      $.post(ajaxurl, data, function(response) {
        location.reload();
      });
    }
  });
})(jQuery);