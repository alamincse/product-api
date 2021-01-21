(function($) {
    $(document).ready(function() {
        $.get({
            url: parbonaVar.root + 'parbona/v1/demo-api',
            data: { _wpnonce: parbonaVar.nonce },

          // also working by below this code
          // beforeSend: function(xhr) {
          //   xhr.setRequestHeader('X-WP-Nonce', parbonaVar.nonce);
          // }
        }).done(function(response) {
            console.log(response);
        }).error(function(error) {
            console.log(error.responseText);
        });
    });
})(jQuery);
