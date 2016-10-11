$(document).ready(function() {


        $("#auth a").on("click", function() {
        	
                if ($("#auth a img").attr('src') == '/images/lock.png') {
				
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
                                $("#auth a").text( return_data ).replaceAll($("#auth a").text());
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
        	if (return_data == '<img src="/images/unlock.png" width="16" height="16">') {
        		console.log($("#auth a").html( return_data ));
        		
				$("#auth a").html( return_data )  ;
            	$("#auth_form, #substrate").fadeOut("slow");
			} else {
				$("#msg").html("Пользователь не найден") ;
			}
            
        }


    });