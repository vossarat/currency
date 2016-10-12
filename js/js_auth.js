$(document).ready(function() {
        $("#substrate").on("click", function() {
                $("#auth_form, #substrate").fadeOut("slow");
            });


        $("#img_lock").on("click", function() {
                if ($("#img_lock").attr('src') == '/images/lock.png') {

                    var win_height = $(window).height();
                    var win_width = $(window).width();
                    $("#auth_form").css('top',  win_height/2-$("#auth_form").height()/2);
                    $("#auth_form").css('left', win_width/2-$("#auth_form").width()/2);
                    $('#auth_form, #substrate').fadeIn("slow");

                } else {
                    $.ajax({
                            type: "POST",
                            url: "auth",
                            data: {
                                action: "logout",
                            },
                            success: function( return_data ) {
                                $("#img_lock").attr( "src", return_data ) ;
                            } ,
                            dataType: "text"
                        });
                };


            });

        $("#auth_button").on("click", function() {
                $.ajax({
                        type: "POST",
                        url: "auth",
                        data: {
                            action: "do_auth",
                            login: $('#login').val(),
                            pass: $('#pass').val(),
                        },
                        success: Callback,
                        dataType: "text"
                    });
            });

        function Callback( return_data ) {
            if (return_data == '/images/unlock.png') {

                $("#img_lock").attr( "src", return_data )  ;
                $("#auth_form, #substrate").fadeOut("slow");
            } else {
                $("#msg").html("Пользователь не найден") ;
            }

        }


    });