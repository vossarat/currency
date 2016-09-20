$(document).ready(function() {

        $('#add').on('click', showEditForm );
        $('#del').on('click', del );


        function del() {
            $.ajax({
                    type: "POST",
                    url: "/changeoffice",
                    data: {
                        action: "del",
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
                    data: {
                        action: "add",
                    },
                    success: Callback,
                    dataType: "text"
                });
        }

        function send() {
            $.ajax({
                    type: "POST",
                    url: "http://currency/changeoffice",
                    data: {
                        action: "add",
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

            $("#frm_edit").html( returnedData );
            $("#frm_edit").fadeIn("slow");

        }

    });