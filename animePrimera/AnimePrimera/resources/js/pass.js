$(document).ready(function() {
    $("#show_hide_password div span a").on('click', function(event) {
        event.preventDefault();

        if($('#show_hide_password input').attr("type") == "text"){

            $('#show_hide_password input').attr('type', 'password');
            $('#passe').removeClass( "fas fa-eye" );
            $('#passe').addClass( "fas fa-eye-slash" );

        }else if($('#show_hide_password input').attr("type") == "password"){

            $('#show_hide_password input').attr('type', 'text');
            $('#passe').removeClass( "fas fa-eye-slash" );
            $('#passe').addClass( "fas fa-eye" );

        }
    });
});