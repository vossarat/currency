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
                                $("#img_lock").attr( "src", return_data["src"] ) ;
                            } ,
                            dataType: "json"
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
                        success: callback_do_auth,
                    });
            });

        function callback_do_auth() {
        	$.ajax({
                        type: "POST",
                        url: "auth",
                        data: { action: "get_cookie", },
                        success: callback_get_cookie,
                        dataType: "json"
                    });
        } ;
        
        function callback_get_cookie( return_data ) {        	
        	console.log( return_data );
            if (return_data["chk"]) {
                $("#img_lock").attr( "src", return_data["src"] )  ;
                $("#auth_form, #substrate").fadeOut("slow");
            } else {
                $("#msg").html(return_data["msg"]) ;
            }
        };
        
        $("#logo").on("click", function() {
			$.ajax({
                        type: "POST",
                        url: "auth",
                        data: { action: "is_auth", },
                        success: function( return_data ) {
                        	console.log(return_data);
                        },
                        dataType: "json"
                    });
		});
		


    });