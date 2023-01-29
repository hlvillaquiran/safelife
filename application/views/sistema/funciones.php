<script type="text/javascript">
    function btn_RegistroEmergencia(tipo_boton) {
        const longitud = parseFloat($('#longitud').text());
        const latitud = parseFloat($('#latitud').text());
        var cod_usuario = <?php echo json_encode($this->session->userdata('datos_usuario')->cod_usuario); ?>;

        var url = '<?php echo base_url();
                    ?>Boton_Panico/Registrar_Emergencia';
        $.post(url, {
            tipo_boton: tipo_boton,
            longitud: longitud,
            latitud: latitud,
            cod_usuario: cod_usuario
        }, function(data) {
            if (data == <?php echo TRUE ?>) {
                Swal.fire({
                    icon: "success",
                    title: "Botón Registrado",
                    text: "Emergencia registrada! En breve se le dará atención...",
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Botón No Registrado",
                    text: "No se ha registrado la emergencia, posiblemente no funciona su GPS coorectamente",
                });
            }
        });
    }

    function geoFindMe() {

        function success(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            status.textContent = '';

            $('#longitud').text(longitude);
            $('#latitud').text(latitude);
        }

        function error() {
            status.textContent = 'No es posible obtener tu localización';
        }

        if (!navigator.geolocation) {
            $('#estado').text('Geolocalización no está soportado por tu sistema');
        } else {
            status.textContent = 'Localizando';
            navigator.geolocation.getCurrentPosition(success, error);
        }
    }

    function Agregar_Formulario() {
        var tipo_denuncia = $('#sel_denuncia').val();
        $('#formulario_denuncias').html('');

        switch (parseInt(tipo_denuncia)) {
            case 1:
                Mostrar_Formulario_Doc_Extraviado();
                break;
            case 2:
                Mostrar_Formulario_Queja_Ciudadana();
                break;
            case 3:
                Mostrar_Formulario_Persona_Desaparecida();
                break;
            default:
                alert("error")
        }
    }

    function Mostrar_Formulario_Doc_Extraviado() {
        $('#formulario_denuncias').append(`
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sel_subdenuncia_documento" class="texto">Documento Extraviado</label>
                                        <select id="sel_subdenuncia_documento_extraviado" name="doc_extraviado" width: 100%; class="form-control">
                                            <option value>Seleccione tipo de documento</option>
                                            <option value="1">Cedula</option>
                                            <option value="2">Pasaporte</option>
                                            <option value="3">Otros</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="txt_numero_documento" class="texto">Número Documento</label>
                                        <input type="number" class="form-control form-control-border border-width-2 bg-sec texto-input" id="txt_numero_documento" name="numero_documento" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="txt_nombre_denunciante" class="texto">Nombre Denunciante</label>
                                        <input type="text" class="form-control form-control-border border-width-2 bg-sec texto-input" id="txt_nombre_denunciante" name="nombre_denunciante" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="txt_ciudad_extravio" class="texto">Ciudad Extravío</label>
                                        <input type="text" class="form-control form-control-border border-width-2 bg-sec texto-input" id="txt_ciudad_extravio" name="ciudad_extravio" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="txt_detalles_extravio" class="texto">Detalles Extravío</label>
                                        <input type="text" class="form-control form-control-border border-width-2 bg-sec texto-input" id="txt_detalles_extravio" name="detalles_extravio" />
                                    </div>
                                </div>
        `);
    }

    function Mostrar_Formulario_Queja_Ciudadana() {
        $('#formulario_denuncias').append(`
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sel_subdenuncia_queja" class="texto">Tipo de Queja</label>
                                            <select id="sel_subdenuncia_queja" name="sub_queja" width: 100%; class="form-control">
                                                <option value>Seleccione tipo de queja</option>
                                                <option value="1">Basura Acumulada</option>
                                                <option value="2">Falta de iluminación</option>
                                                <option value="3">Postes/árboles caídos</option>
                                                <option value="4">Otros</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="txt_direccion_queja" class="texto">Dirección</label>
                                        <input type="text" class="form-control form-control-border border-width-2 bg-sec texto-input" id="txt_direccion_queja" name="direccion_queja" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="txt_detalles_queja" class="texto">Detalles de Denuncia</label>
                                        <input type="text" class="form-control form-control-border border-width-2 bg-sec texto-input" id="txt_detalles_queja" name="detalles_queja" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="txt_carga_foto" class="texto">Cargar Foto</label>
                                        <input type="file" class="form-control form-control-border border-width-2 bg-sec texto-input" id="txt_carga_foto" name="carga_foto" style="color: #ffffff;" onchange="Mostrar_Vista_Previa(event)" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <center><output id="vista_previa"></output></center>
                                    </div>
                                </div>
                                
        `);
    }


    function Mostrar_Formulario_Persona_Desaparecida() {
        $('#formulario_denuncias').append(`
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="txt_nombre_desaparecida" class="texto">Nombres de la persona</label>
                                        <input type="text" class="form-control form-control-border border-width-2 bg-sec texto-input" id="txt_nombre_desaparecida" name="nombre_desaparecida" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="txt_edad_desaparecida" class="texto">Edad de la Persona</label>
                                        <input type="number" step="1" min="1" class="form-control form-control-border border-width-2 bg-sec texto-input" id="txt_edad_desaparecida" name="edad_desaparecida" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="txt_ropa" class="texto">Ropa o Vestimenta</label>
                                        <input type="text" class="form-control form-control-border border-width-2 bg-sec texto-input" id="txt_ropa" name="ropa" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="txt_lugar_contacto" class="texto">Lugar de último contacto</label>
                                        <input type="text" class="form-control form-control-border border-width-2 bg-sec texto-input" id="txt_lugar_contacto" name="lugar_contacto" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="txt_fecha_hora" class="texto">Fecha y Hora de último contacto</label>
                                        <input type="datetime-local" class="form-control form-control-border border-width-2 bg-sec texto-input" id="txt_fecha_hora" name="fecha_hora" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="txt_foto_desaparecida" class="texto">Foto de la persona desaparecida</label>
                                        <input type="file" class="form-control form-control-border border-width-2 bg-sec texto-input" id="txt_foto_desaparecida" name="carga_foto" style="color: #ffffff;" onchange="Mostrar_Vista_Previa(event)" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <center><output id="vista_previa"></output></center>
                                    </div>
                                </div>
                                
        `);
    }

    function Mostrar_Vista_Previa(evt) {
        var files = evt.target.files; // FileList object

        //Obtenemos la imagen del campo "file". 
        for (var i = 0, f; f = files[i]; i++) {
            //Solo admitimos imágenes.
            if (!f.type.match('image.*')) {
                continue;
            }

            var reader = new FileReader();

            reader.onload = (function(theFile) {
                return function(e) {
                    // Creamos la imagen.
                    document.getElementById("vista_previa").innerHTML = ['<img class="thumb" src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);

            reader.readAsDataURL(f);
        }
    }

    function Cancelar() {
        Swal.fire({
            icon: 'info',
            text: 'Realmente Deseas Cancelar e ir a la Sección Home?',
            showCancelButton: true,
            confirmButtonText: 'Si',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location.href = "<?php echo base_url() ?>/Home"
            }
        });
    }


    $(document).ready(function() {
        geoFindMe();
        $('#tbl_botones').DataTable();
        $('#tbl_denuncias').DataTable();
    });
</script>