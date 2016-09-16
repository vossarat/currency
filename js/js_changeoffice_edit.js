$(document).ready(function() {

    var requiredFields = new Array("name", "adress", "geolocation", "login", "pass");//перечисляем обязательные поля

    $('#save').on('click', function () {
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
        });

    $('#cancel').on('click', function () {
            $("#frm_edit").empty();
            //.trigger( 'reset' );
        });

});