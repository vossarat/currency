$(document).ready(function() {


        $('#add').on('click', show_add_form );

        $('#edit').on('click', show_edit_form );

        $('#del').on('click', function() {
                 n_str = $('input[name="id"]:checked').val();
                if (!n_str) {
                    $("#edit_changeoffice").html( "Выберите информацию для удаления " );
                    return false;
                }
                else {
                    del();
                }
            });


        function del() {        	        	
            $.ajax({
                    type: "POST",
                    url: "/changeoffice",
                    data: {
                        action: "del",
                        id: $('input[name="id"]:checked').val(),
                    },
                    success: callback_del,
                    dataType: "text"
                });
        };

        function show_add_form() {
            $("#edit_changeoffice").load("/changeoffice", {action:"add_form"});
        }
        
        function show_edit_form() {
            $("#edit_changeoffice").load("/changeoffice", {action:"edit_form", id: $('input[name="id"]:checked').val()});
        }

        function callback_del( returned_data ) {
        	var tr = $('input[name="id"]:checked').parent().parent();
            $("#edit_changeoffice").html( returned_data );
            tr.css('background-color', 'red');        	
           	tr.slideUp('slow');
        }

    });