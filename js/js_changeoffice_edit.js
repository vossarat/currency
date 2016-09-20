$(document).ready(function() {

        var requiredFields = new Array("name1", "adress", "geolocation", "login1", "pass");//перечисляем обязательные поля

        $( "#edit_changeoffice" ).on( "submit", function( event ) {
                event.preventDefault();
                var formFields =  $( this ).serializeArray();
                $.each(formFields, function(i, field){
                	
                	if($.inArray(field.name, requiredFields) >= 0) {
						//console.log($(this));
						$("#"+field.name).css('border', 'red 1px solid');
					} 
					else {
						console.log("Поле "+field.name+" не является обязательным, и его значение = "+field.value);
					}                    

                });

            });


        /*$('#save').on('click', function () {
        var error=0; // массив для возможных ошибок заполнения
        $("#edit_changeoffice").find(":input").each(function() {

        //перебираем форму на проверку текстовых полей
        for(var i=0; i<requiredFields.length; i++) {
        //проверяем каждое поле в форме
        //если поле присутствует в списке обязательных

        if($(this).attr("id")==requiredFields[i]) {
        //проверяем поле формы на пустоту

        if(!$(this).val()) {
        //если в поле пустое
        $(this).css('border', 'red 1px solid');// устанавливаем рамку красного цвета
        error=1;// определяем имя ошибки
        }
        else {
        $(this).css('border', 'gray 1px solid');//иначе устанавливаем рамку обычного цвета
        }

        }
        }
        })
        if(error==0){
        //если ошибок нет то отправляем данные
        send();
        }
        else{
        //если в форме встретились ошибки , не  позволяем отослать данные на сервер и выводим ошибки
        $("#msg").html('Заполните обязательные поля');
        $("#msg").fadeIn("slow");
        return false;
        }
        });*/


        $('#cancel').on('click', function () {
                $("#frm_edit").empty();
            });

        /*        $('#save').on('click', function () {
        var error=0; // массив для возможных ошибок заполнения
        $("#edit_changeoffice").find(":input").each(function() {

        //перебираем форму на проверку текстовых полей
        for(var i=0; i<requiredFields.length; i++) {
        //проверяем каждое поле в форме
        //если поле присутствует в списке обязательных

        if($(this).attr("id")==requiredFields[i]) {
        //проверяем поле формы на пустоту

        if(!$(this).val()) {
        //если в поле пустое
        $(this).css('border', 'red 1px solid');// устанавливаем рамку красного цвета
        error=1;// определяем имя ошибки
        }
        else {
        $(this).css('border', 'gray 1px solid');//иначе устанавливаем рамку обычного цвета
        }

        }
        }
        })
        if(error==0){
        //если ошибок нет то отправляем данные
        send();
        }
        else{
        //если в форме встретились ошибки , не  позволяем отослать данные на сервер и выводим ошибки
        $("#msg").html('Заполните обязательные поля');
        $("#msg").fadeIn("slow");
        return false;
        }
        });*/



    });