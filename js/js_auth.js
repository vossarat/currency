$(document).ready(function() {


        $("#auth").on("click", function() {
                $(".popup,.popup_overlay").fadeIn(400);
                /*$(".popup,.popup_overlay");*/

                /*                if ($("#auth img").attr('src') == '/images/lock.png') {
                $("#content").load("auth", {action: "auth_form"});
                } else {
                $.ajax({
                type: "POST",
                url: "auth",
                data: {
                action: "logout",
                },
                success: function( return_data ) {
                $("#auth").html( return_data );
                } ,
                dataType: "text"
                });
                };*/


            });

        $("#content").on("click", "#auth_button", function() {
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
            $("#auth").html( return_data );
        }

        $("#close").on("click", function() {
                $('.popup_overlay').css({"display" : "none"}); //скрываем всплывающее окно
            });

    });