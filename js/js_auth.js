$(document).ready(function() {

        
        $("#auth").on("click", function() {
        			if ($("#auth img").attr('src') == '/images/lock.png') {
						$("#content").load("auth", {action: "auth_form"});
					} else {
						console.log($("#auth img").attr('src'));
					};
									
                
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

    });