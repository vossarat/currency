$(document).ready(function() {

        var requiredFields = new Array("name", "adress", "geolocation", "login", "pass");//перечисляем обязательные поля

        var formFields = (function () {
                return $( "#edit_changeoffice" ).serializeArray();
            }()
        );

        $( "#edit_changeoffice" ).on( "submit", function( event ) {
                event.preventDefault();
                var error = 0;

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

        $('#addinfo').on('click', function () {
                $('#name').attr('value','Наименовение');
                $("#adress").attr('value','Адрес');;
                $("#geolocation").attr('value','Геолокация');;
                $("#login").attr('value','Логин');;
                $("#pass").attr('value','Пароль');;
            });

        function add_office() {
            $.ajax({
                    type: "POST",
                    url: "http://currency/changeoffice",
                    data: {
                        action: "add_office",
                        form_data: $( "#edit_changeoffice" ).serializeArray(),
                    },
                    success: callback_add_office,
                    dataType: "text"
                });
        };

        function callback_add_office( returned_data ) {
            $("#msg").html( returned_data );
        }

    });