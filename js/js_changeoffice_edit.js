$(document).ready(function() {

        var form_required_fields = new Array("name", "adress", "geolocation", "login", "pass");//перечисляем обязательные поля
       
        function form_fields_value() {
			return $( "#view_changeoffice" ).serializeArray();
		};

        $( "#view_changeoffice" ).on( "submit", function( event ) {
                event.preventDefault();
                var error = 0;

                $.each(form_fields_value(), function(i, field){
                	$("#"+field.name).css('border', 'gray 1px solid');
                        if( $.inArray(field.name, form_required_fields) >= 0 & $("#"+field.name).val() == "" ) {
                            error = 1;
                            $("#"+field.name).css('border', 'red 1px solid');
                            $("#msg").html('Заполните обязательные поля');
                            $("#msg").fadeIn("slow");
                        }
                    });
                if( error == 0 ) {
                    add_office();
                }
            });

        $('#cancel').on('click', function () {
                $("#edit_changeoffice").empty();
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
                        form_data: form_fields_value(),
                    },
                    success: callback_add_office,
                    dataType: "text"
                });
        };

        function callback_add_office( returned_data ) {
            $("#msg").html( returned_data );
        }

    });