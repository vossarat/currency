$(document).ready(function() {

        var requiredFields = new Array("name", "adress", "geolocation", "login", "pass");//перечисляем обязательные поля

        $( "#edit_changeoffice" ).on( "submit", function( event ) {
                event.preventDefault();
                var error = 0;
                var formFields =  $( this ).serializeArray();
                $.each(formFields, function(i, field){

                        if( $.inArray(field.name, requiredFields) >= 0 & $("#"+field.name).val() == "" ) {
                            error = 1;
                            $("#"+field.name).css('border', 'red 1px solid');
                            $("#msg").html('Заполните обязательные поля');
                            $("#msg").fadeIn("slow");
                        }

                    });
                if( error == 0 ) {
                    add_office();
                }
                else {
                    console.log("есть ошибки");
                }


            });

        $('#cancel').on('click', function () {
                $("#frm_edit").empty();
            });

        function add_office() {
            $.ajax({
                    type: "POST",
                    url: "http://currency/changeoffice",
                    data: {
                        action: "add_office",
                        form_data: $( "#edit_changeoffice" ).serializeArray(),
                       /* name: $("#name").val(),
                        adress: $("#adress").val(),
                        geolocation: $("#geolocation").val(),
                        login: $("#login").val(),
                        pass: $("#pass").val(),*/
                    },
                    success: callback_add_office,
                    dataType: "text"
                });
        };

        function callback_add_office( returned_data ) {
            $("#msg").html( returned_data );
        }

    });