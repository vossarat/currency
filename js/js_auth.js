$(document).ready(function() {
	
$("#topmenu img").on("click", function() {
	$("#content").load("/auth", {action:"auth"});
});

$("#auth_button").on("click", function() {
        $.ajax({
                type: "POST",
                url: "http://currency/auth",
                data: {
                     auth: "auth",
                    login: $('#login').val(),
                     pass: $('#pass').val(),
                },
                success: Callback,
                dataType: "text"
            });
    });

function Callback( returnedData ) {
    $(location).attr('href','http://currency/changeoffice');
}

    });