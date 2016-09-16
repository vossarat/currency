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
	$("#edit_changeoffice")
		.attr('hidden','hidden')
		.trigger( 'reset' );
});

$('#add').on('click', showEditForm );
$('#del').on('click', del );


function del() {
    $.ajax({
            type: "POST",
            url: "/changeoffice",
            data: {action: "del",
            	   	   id: $('input:radio[name=id]:checked','#view_changeoffice').val(),
            },
            success: Callback,
            dataType: "text"
        });
};

function showEditForm() {
    $.ajax({
            type: "POST",
            url: "/changeoffice",
            data: {action: "add",
            },
            success: Callback,
            dataType: "text"
        });
}

function send() {
    $.ajax({
            type: "POST",
            url: "http://currency/changeoffice",
            data: {action: "add",
            	   name: $("#name").val(),
            	   adress: $("#adress").val(),
            	   geolocation: $("#geolocation").val(),
            	   login: $("#login").val(),
            	   pass: $("#pass").val(),
            },
            success: Callback,
            dataType: "text"
        });
};

function Callback( returnedData ) {
  $("#msg").html( returnedData );
}

    });