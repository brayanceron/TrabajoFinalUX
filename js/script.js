let videos_nuevos = [];
let idx_videos_nuevos = 0;
let multimedia_actual = "";
let ban_reproducir = false;
let para=false;    
//estado animacion inicial


$(document).ready(function () {
   
    $("#btn_reiniciar").click(function () {
        
        //window.location.reload()
         //window.location.href;
         //location.reload();
         //window.location.href = window.location.href;
         //window.location.href = "terapia_usu.php";
         
    });




    $("#btn_adduser").click(function () {
        $("#div_busqueda_usuarios").html(" ");
    });

    $("#btn_buscar_usu").click(function () {

        let nombre = $("#txt_busc_nombre").val();
        let cedula = $("#txt_busc_cedula").val();

        if (nombre.length >= 4 || cedula.length >= 3) {
            $("#div_busqueda_usuarios").html("");
            $.ajax({
                url: 'buscar_usuario.php',
                type: 'post',
                dataType: 'text',
                data: { nombre: nombre, cedula: cedula },
                success: function (response) {
                    console.log(response);
                    let jsn = JSON.parse(response);

                    jsn.forEach(jsns => {
                        console.log(jsns);

                        usuario_busqueda(jsns.nombre, jsns.cedula, jsns.genero);
                    });
                }
            });
        }




    });

    function usuario_busqueda(nombre, cedula, genero) {
        if (nombre != false) {

            $("#div_busqueda_usuarios").append(`<div class="card en_linea" style="width: 18rem;"><div class="card-body"><h5 class="card-title">` + nombre + `</h5><p class="card-text">Sexo: ` + genero + `</p> <input type="button" class="btn btn-primary" onclick="boton_default('` + nombre + `','` + cedula + `');" value="agregar"> </div></div>`);
        }
    }



    $("#btn_buscar_nuevo_usu").click(function () {


        let nombre = $("#txt_busc_nombre_nuevo_usu").val();
        let cedula = $("#txt_busc_cedula_nuevo_usu").val();
        let id_terapia = $("#id_terapia_nuevo_usuario").val();

        if (nombre.length >= 4 || cedula.length >= 3) {
            $("#div_busqueda_nuevo_usuarios").html("");
            $.ajax({
                url: 'buscar_usuario.php',
                type: 'post',
                dataType: 'text',
                data: { nombre: nombre, cedula: cedula },
                success: function (response) {
                    console.log(response);
                    let jsn = JSON.parse(response);

                    jsn.forEach(jsns => {
                        console.log(jsns);

                        nuevo_usuario_busqueda(jsns.nombre, jsns.cedula, jsns.genero, id_terapia);
                    });
                }
            });
        }



    });






    $("#btn_reproducir_nuevos").click(function () {
        videos_nuevos = [];
        idx_videos_nuevos = 0;
        //document.getElementById("btn_reproducir_nuevos").style.animationPlayState = "paused";
        document.getElementById("btn_reproducir_nuevos").style.animationPlayState = "initial";
        document.getElementById("btn_reproducir_nuevos").style.animationPlayState = "paused";
        document.getElementById("pausar_reproducir").style.animationPlayState = "running";

        let cedula_uso = $("#cedula_usu").val();
        let id_terapia = $("#id_terapia").val();
        //alert("cc: " + cedula_uso + " id_terapia: " + id_terapia);

        //$("#div_busqueda_nuevo_usuarios").html("");
        $.ajax({
            url: 'buscar_nuevos_videos.php',
            type: 'post',
            dataType: 'text',
            data: { id_terapia: id_terapia, cedula_uso: cedula_uso },
            success: function (response) {
                console.log(response);
                let jsn = JSON.parse(response);

                jsn.forEach(jsns => {
                    console.log(jsns);
                    videos_nuevos.push(jsns.multimedia);
                    //Verificar que multimedia sea video
                });
                console.log(videos_nuevos);
                var v = document.getElementById('video_reproducir');
                let num_videos = videos_nuevos.length;
                if (num_videos > 0) {
                    v.src = videos_nuevos[0];
                    multimedia_actual = videos_nuevos[0];
                }
            }

        });




    });
    $("#pausar_reproducir").click(function () {
        document.getElementById("pausar_reproducir").style.animationPlayState = "initial";
        document.getElementById("pausar_reproducir").style.animationPlayState = "paused";
        //

        var v = document.getElementById('video_reproducir');
        let cedula_uso = $("#cedula_usu").val();
        let id_terapia = $("#id_terapia").val();



        if (ban_reproducir == false) {
            v.play();

            ban_reproducir = true;
        }

        else if (ban_reproducir == true) {
            v.pause();

            ban_reproducir = false;
        }
        v.onended = function () {
            var v = document.getElementById('video_reproducir');
            let m = v.src;
            //alert("Multimedia: " + m + " CC=" + cedula_uso + " tera=" + id_terapia + " M.A=" + multimedia_actual);

            document.getElementById("siguiente_video").style.animationPlayState = "running";

            $.ajax({
                url: 'actualizar_video_visto.php',
                type: 'post',
                dataType: 'text',
                data: { id_terapia: id_terapia, multimedia: multimedia_actual },
                success: function (response) {
                    //alert("Video Marcado como visto" + response);
                }

            });




        }

    });


    $("#anterior_video").click(function () {
        var v = document.getElementById('video_reproducir');

        let num_videos = videos_nuevos.length;
        if (num_videos > 1 && idx_videos_nuevos >= 1) {
            v.src = videos_nuevos[idx_videos_nuevos - 1];
            multimedia_actual = videos_nuevos[idx_videos_nuevos - 1];
            idx_videos_nuevos = idx_videos_nuevos - 1;
        }

    });


    $("#siguiente_video").click(function () {
        var v = document.getElementById('video_reproducir');

        


        let num_videos = videos_nuevos.length;
        if (idx_videos_nuevos < num_videos - 1) {
            v.src = videos_nuevos[idx_videos_nuevos + 1];
            multimedia_actual = videos_nuevos[idx_videos_nuevos + 1];
            idx_videos_nuevos = idx_videos_nuevos + 1;
            document.getElementById("siguiente_video").style.animationPlayState = "initial";
            document.getElementById("siguiente_video").style.animationPlayState = "paused";
            document.getElementById("pausar_reproducir").style.animationPlayState = "running";
        }
        
        if(idx_videos_nuevos == num_videos - 1){
            document.getElementById("siguiente_video").style.animationPlayState = "initial";
            document.getElementById("siguiente_video").style.animationPlayState = "paused";
            document.getElementById("pausar_reproducir").style.animationPlayState = "paused";
            document.getElementById("btn_reiniciar").style.animationPlayState = "running";
        }
            
            
        


    });



    $("#btn_editar_nombre").click(function () {
        $("#atributo_modificar").val("nom_terapeuta");
        $("#lbl_atributo").text("Nuevo nombre (" + $("#atributo_modificar").val() + ")");

    });
    $("#btn_editar_nombre_user").click(function () {
        $("#atributo_modificar_user").val("nom_usu");
        $("#lbl_atributo_user").text("Nuevo nombre (" + $("#atributo_modificar_user").val() + ")");

    });




    $("#btn_editar_telefono").click(function () {
        $("#atributo_modificar").val("telefono");
        $("#lbl_atributo").text("Nuevo teléfono (" + $("#atributo_modificar").val() + ")");

    });
    $("#btn_editar_telefono_user").click(function () {
        $("#atributo_modificar_user").val("tel_usu");
        $("#lbl_atributo_user").text("Nuevo teléfono (" + $("#atributo_modificar_user").val() + ")");

    });




    $("#btn_editar_espc").click(function () {
        $("#atributo_modificar").val("especializacion");
        $("#lbl_atributo").text("Nueva especializacion (" + $("#atributo_modificar").val() + ")");

    });
    
    $("#btn_editar_epicrisis_user").click(function () {
        $("#atributo_modificar_user").val("epicrisis");
        $("#lbl_atributo_user").text("Nueva epicrisis (" + $("#atributo_modificar_user").val() + ")");

    });




    $("#btn_editar_sexo").click(function () {
        $("#atributo_modificar_s").val("genero");
        $("#lbl_atributo_s").text("Nuevo Género (" + $("#atributo_modificar_s").val() + ")");

    });
    $("#btn_editar_sexo_user").click(function () {
        $("#atributo_modificar_s_user").val("genero_usu");
        $("#lbl_atributo_s_user").text("Actualizar Genero (" + $("#atributo_modificar_s_user").val() + ")");

    });




    $("#btn_editar_fecha").click(function () {
        $("#atributo_modificar_f").val("fecha_nacimiento_terapeuta");
        $("#lbl_atributo_f").text("Nueva Fecha (" + $("#atributo_modificar_f").val() + ")");

    });
    $("#btn_editar_fecha_user").click(function () {
        $("#atributo_modificar_f_user").val("fecha_nacimiento");
        $("#lbl_atributo_f_user").text("Nueva Fecha (" + $("#atributo_modificar_f_user").val() + ")");

    });





    $("#btn_actualizar").click(function () {
        //alert("Oki");

        let valor_actualizar = $("#txt_valor_actializar").val();
        let atributo_actualizar = $("#atributo_modificar").val();

        $.ajax({
            url: 'actualizar_perfil.php',
            type: 'post',
            dataType: 'text',
            data: { atributo: atributo_actualizar, valor: valor_actualizar },
            success: function (response) {
                //alert ("Video Marcado como visto"+response);
                $("#lbl_respuesta").text("Actualizado Correctamente");
            },
            error: function () {
                $("#lbl_respuesta").text("Error Inesperado, No actualizado");
            }

        });


    });
    $("#btn_actualizar_s").click(function () {
        //alert("Oki");

        let valor_actualizar = $("#slt_editar_sexo").val();
        let atributo_actualizar = "genero";
        //alert("Nuevo sexo:"+valor_actualizar);
        $.ajax({
            url: 'actualizar_perfil.php',
            type: 'post',
            dataType: 'text',
            data: { atributo: atributo_actualizar, valor: valor_actualizar },
            success: function (response) {

                $("#lbl_respuesta_s").text("Actualizado Correctamente");
            },
            error: function () {
                $("#lbl_respuesta_s").text("Error Inesperado, No actualizado");
            }

        });


    });
    $("#btn_actualizar_f").click(function () {
        //alert("Oki");

        let valor_actualizar = $("#slt_editar_fecha").val();
        let atributo_actualizar = "fech_nacimiento_terapeuta";
        alert("Nueva fecha:" + valor_actualizar + " atributo: " + atributo_actualizar);

        $.ajax({
            url: 'actualizar_perfil.php',
            type: 'post',
            dataType: 'text',
            data: { atributo: atributo_actualizar, valor: valor_actualizar },
            success: function (response) {

                $("#lbl_respuesta_f").text("Actualizado Correctamente");
            },
            error: function () {
                $("#lbl_respuesta_f").text("Error Inesperado, No actualizado");
            }

        });

    });
//==========================================================================================================================================

$("#btn_actualizar_user").click(function () {

    let valor_actualizar = $("#txt_valor_actializar_user").val();
    let atributo_actualizar = $("#atributo_modificar_user").val();

    $.ajax({
        url: 'actualizar_perfil_user.php',
        type: 'post',
        dataType: 'text',
        data: { atributo: atributo_actualizar, valor: valor_actualizar },
        success: function (response) {
            //alert ("Video Marcado como visto"+response);
            $("#lbl_respuesta_user").text("Actualizado Correctamente");
        },
        error: function () {
            $("#lbl_respuesta_user").text("Error Inesperado, No actualizado");
        }

    });
    

});
$("#btn_actualizar_s_user").click(function () {
    //alert("Oki");

    let valor_actualizar = $("#slt_editar_sexo_user").val();
    let atributo_actualizar = "genero_usu";
    //alert("Nuevo sexo:"+valor_actualizar);
    $.ajax({
        url: 'actualizar_perfil_user.php',
        type: 'post',
        dataType: 'text',
        data: { atributo: atributo_actualizar, valor: valor_actualizar },
        success: function (response) {

            $("#lbl_respuesta_s").text("Actualizado Correctamente");
        },
        error: function () {
            $("#lbl_respuesta_s").text("Error Inesperado, No actualizado");
        }

    });


});

$("#btn_actualizar_f_user").click(function () {
    //alert("Oki");

    let valor_actualizar = $("#slt_editar_fecha_user").val();
    let atributo_actualizar = "fech_nacimiento";
    //alert("Nueva fecha:" + valor_actualizar + " atributo: " + atributo_actualizar);

    $.ajax({
        url: 'actualizar_perfil_user.php',
        type: 'post',
        dataType: 'text',
        data: { atributo: atributo_actualizar, valor: valor_actualizar },
        success: function (response) {

            $("#lbl_respuesta_f_user").text("Actualizado Correctamente");
        },
        error: function () {
            $("#lbl_respuesta_f_user").text("Error Inesperado, No actualizado");
        }

    });


});
































    function nuevo_usuario_busqueda(nombre, cedula, genero, id_terapia) {
        if (nombre != false) {
            $("#div_busqueda_nuevo_usuarios").append(`<div class="card en_linea" style="width: 18rem;"><div class="card-body"><h5 class="card-title">` + nombre + `</h5><p class="card-text">Sexo: ` + genero + `</p> <input type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#diag_resultado_agregar" onclick="boton_default_nuevo_usuario('` + nombre + `','` + cedula + `','` + id_terapia + `');" value="agregar"> </div></div>`);
        }
    }


});


function boton_default(nombre, cedula) {
    //$("#carrito_busc").html(" ");
    //$("#buscar_p").val("");
    $("#div_integrantes").append(`<div class="usu_integrado" id="` + cedula + `" >
                                    <img src="src/fotos_usuarios/` + cedula + `.jpg" alt="" id="img_usu_integrado"> 
                                    <p id="n_usu_integrado">`+ nombre + `</p>
                                    <a href="#"><img src="src/icono_cerrar.png" alt="" id="c_usu_integrado" onclick="boton_default_quitar('`+ cedula + `');"></a>
                                    <input type="hidden" name="`+ nombre + `" value="` + cedula + `">
                                 </div>`);
    //$("#carrito_fios").append('<input type="hidden"  name="'+id+'"  value="'+name+'">');
    //json+='{"name":"'+name+'", "id":"'+id+'"},';
}


function boton_default_nuevo_usuario(nombre, cedula, id_terapia) {
    $.ajax({
        url: 'add_nuevo_usuario.php',
        type: 'post',
        dataType: 'text',
        data: { cedula: cedula, id_terapia: id_terapia },
        success: function (response) {
            $("#resp_diag_resultado_agregar").html('');
            $("#resp_diag_resultado_agregar").append('<div class="modal-header"><h5 class="modal-title">Agregar</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>');

            $("#resp_diag_resultado_agregar").append(response);

        }
    });





































}



function boton_default_quitar(cedula) {
    $("#" + cedula).remove();
}

function boton_default_eliminar_archivo(id_actividad, id_terapia, multimedia) {
    alert("Se eliminara " + multimedia);
    //$("#" + multimedia).remove();
    $.ajax({
        url: 'eliminar_multimedia.php',
        type: 'post',
        dataType: 'text',
        data: { id_actividad: id_actividad, id_terapia: id_terapia, multimedia: multimedia },
        success: function (response) {
            alert("Resultado: " + response);
            let div_eliminar = document.getElementById(multimedia);

            let padre = div_eliminar.parentNode;
            padre.removeChild(div_eliminar);


            //$("#"+multimedia+"").remove();
        }
    });
}



function boton_default_eliminar_usuario(cedula, nombre, id_terapia) {
    alert("Se eliminara a " + nombre);

    $.ajax({
        url: 'eliminar_usuario_terapia.php',
        type: 'post',
        dataType: 'text',
        data: { cedula: cedula, id_terapia: id_terapia },
        success: function (response) {

            $("#resp_diag_resultado_eliminar").html('');
            $("#resp_diag_resultado_eliminar").append('<div class="modal-header"><h5 class="modal-title">Eliminar</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>');

            $("#resp_diag_resultado_eliminar").append(response);



            let div_eliminar = document.getElementById(cedula);
            let padre = div_eliminar.parentNode;
            padre.removeChild(div_eliminar);


            //$("#"+multimedia+"").remove();
        }
    });

}



