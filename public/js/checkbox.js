$(document)
    .click(function () {
        //Creamos la Funcion del Click
        var checked = $(".CheckedAK:checked").length;
        //Creamos una Variable y Obtenemos el Numero de Checkbox que esten Seleccionados
        $("#resp").text(
            "Tienes Actualmente (" +
                checked +
                ") Registros " +
                "Seleccionado(s)"
        );
        //Asignamos a la Etiqueta <p> el texto de cuantos Checkbox hay Seleccionados

        if (checked == 0) {
            $("#enviarform").hide(); //ocultar
        } else {
            $("#enviarform").fadeIn("slow"); //mostrar
        }
    })
    .trigger("click");

function marcarCheckbox(source) {
    checkboxes = document.getElementsByTagName("input");
    //obtenemos todos los controles del tipo Input

    for (i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].type == "checkbox") {
            //entramos si esta un checkbox
            checkboxes[i].checked = source.checked;
            //si es un checkbox le damos el valor del checkbox
        }
    }
}
