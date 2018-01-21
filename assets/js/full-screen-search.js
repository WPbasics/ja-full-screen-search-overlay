// When the document is ready...
jQuery( document ).ready( function( $ ) {

    $(function () {
        $('.mglass').on('click', function(event) {
            event.preventDefault();
            $('#fullscreensearch').addClass('open');
            $('#fullscreensearch > form > input[type="text"]').focus();
        });

        $('a[href="#searchclose"]').on('click', function(event) {
            event.preventDefault();
            $('#fullscreensearch').removeClass('open');
        });
    });
} );