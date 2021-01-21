// jQuery.post({
//     method: 'post',
//     url: myScriptVars.root + 'parbona/v1/demo-api',
//     // beforeSend: function ( xhr ) {
//     //     xhr.setRequestHeader( 'X-WP-Nonce', myScriptVars.nonce );
//     // },
//     data: { _wpnonce: myScriptVars.nonce },
//     done: function( response ) {
//         console.log( response.responseText );
//     },
//     // error: function(error) {
//     // 	console.log(error.responseText + ' wrong');
//     // }
// });

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
