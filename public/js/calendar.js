$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
        // defaultView: 'timeGridWeek',
        header: {
            left: 'prev,next Miboton',
            center: 'title',
            right: 'today,timeGridDay,timeGridWeek,dayGridMonth, list'
        },

        dateClick: function(info) {

            limpiarFormulario();

            $('#fecha').val(info.dateStr);

            // $("#btnGuardar").prop("disabled", false);
            $("#btnGuardar").show();
            // $("#btnModificar").prop("disabled", true);
            $("#btnModificar").hide();
            // $("#btnEliminar").prop("disabled", true);
            $("#btnEliminar").hide();

            $('#modelId').modal();
            // console.log(info);
        },


        eventClick: function(info) {

            // $("#btnGuardar").prop("disabled", true);
            $("#btnGuardar").hide();
            // $("#btnModificar").prop("disabled", false);
            $("#btnModificar").show();
            // $("#btnEliminar").prop("disabled", false);
            $("#btnEliminar").show();



            $('#id').val(info.event.id);
            $('#title').val(info.event.title);
            $('#descripcion').val(info.event.extendedProps.descripcion);
            $('#color').val(info.event.backgroundColor);

            mes = (info.event.start.getMonth() + 1);
            dia = (info.event.start.getDate());
            anio = (info.event.start.getFullYear());

            mes = (mes < 10) ? "0" + mes : mes;
            dia = (dia < 10) ? "0" + dia : dia;

            minutos = info.event.start.getMinutes();
            hora = info.event.start.getHours();

            minutos = (minutos < 10) ? "0" + minutos : minutos;
            hora = (hora < 10) ? "0" + hora : hora;

            horario = (hora + ":" + minutos);

            $('#fecha').val(anio + "-" + mes + "-" + dia);
            $('#hora').val(horario);


            if ($("#rol_usuario").val() === 'Administrador') {
                $('#modelId').modal();
            }

        },


        events: ulr + "/calendario/show"
    });

    calendar.setOption('locale', 'es');

    calendar.render();

    $('#btnGuardar').click(function() {
        var alta_usuario;
        var objEvento;
        objEvento = recolectarDatosGUI("POST");

        EnviarInformacion('', objEvento, alta_usuario);

    });

    $('#btnModificar').click(function() {
        objEvento = recolectarDatosGUI("PATCH");
        EnviarInformacion('/' + $('#id').val(), objEvento);

    });

    $('#btnEliminar').click(function() {
        objEvento = recolectarDatosGUI("DELETE");
        EnviarInformacion('/' + $('#id').val(), objEvento);

    });

    function recolectarDatosGUI(method) {
        NuevoEvento = {
            id: $('#id').val(),
            alta_usuario: $('#alta_usuario').val(),
            title: $('#title').val(),
            descripcion: $('#descripcion').val(),
            color: $('#color').val(),
            textColor: "#ffffff",
            start: $('#fecha').val() + " " + $('#hora').val(),
            end: $('#fecha').val() + " " + $('#hora').val(),
            '_token': $("meta[name='csrf-token']").attr("content"),
            '_method': method
        }
        return NuevoEvento;
    }

    function EnviarInformacion(id, objEvento) {
        console.log(objEvento);

        $.ajax({
            url: ulr + "/eventos" + id,
            method: "POST",
            data: objEvento,
            success: function(msg) {
                console.log(msg);
                $('#modelId').modal('toggle');
                calendar.refetchEvents();

                Swal.fire({
                    title: "Bien!",
                    text: msg,
                    icon: "success",
                });

            },
            error: function() { console.log("error"); }
        });
    }

    function limpiarFormulario() {

        $('#id').val("");
        $('#title').val("");
        $('#descripcion').val("");
        $('#color').val("");
        $('#fecha').val("");
        $('#hora').val("07:00");
    }
});