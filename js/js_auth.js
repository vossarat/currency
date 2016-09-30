$(document).ready(function() {

        $("#auth").on("click", function() {
        		if($(this).children()[1] == '<img src="/images/lock.png" width="16" height="16">'){
					$("#content").load("auth", {action: "auth_form"});
				} else {
					$("#content").load("auth", {action: "logout"});
				}
                
                
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