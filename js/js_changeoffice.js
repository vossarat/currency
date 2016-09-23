$(document).ready(function() {

       
        $('#add').on('click', show_edit_form );

        $('#del').on('click', function() {
                console.log($('input[name="id"]:checked').parent().parent()[0].rowIndex);
                /*                n_str = $('input[name="id"]:checked').val();
                if (!n_str) {
                $("#edit_changeoffice").html( "Выберите информацию для удаления " );
                return false;
                }
                else {
                $('tr:eq(1)').remove();
                del();
                }*/
            });


        function del() {

            $.ajax({
                    type: "POST",
                    url: "/changeoffice",
                    data: {
                        action: "del",
                        id: $('input[name="id"]:checked').val()
                    },
                    success: callback_del,
                    dataType: "text"
                });
        };

        function show_edit_form() {
            $("#edit_changeoffice").load("/changeoffice", {action:"add_form"});
        }

        function callback_del( returned_data ) {
            $("#edit_changeoffice").html( returned_data );
            $("#edit_changeoffice").fadeIn("slow");
        }

       
        

    });