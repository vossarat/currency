$(document).ready(function() {

        $('#add').on('click', show_edit_form );
        $('#del').on('click', del );


        function del() {
            $.ajax({
                    type: "POST",
                    url: "/changeoffice",
                    data: {
                        action: "del",
                        id: $('input:radio[name=id]:checked','#view_changeoffice').val(),
                    },
                    success: callback_del,
                    dataType: "text"
                });
        };

        function show_edit_form() {
            $.ajax({
                    type: "POST",
                    url: "/changeoffice",
                    data: {
                        action: "add_form",
                    },
                    success: callback_add_form,
                    dataType: "text"
                    });
        }
        
        function callback_add_form( returned_data ) {
            $("#frm_edit").html( returned_data );
            $("#frm_edit").fadeIn("slow");
        }

    });