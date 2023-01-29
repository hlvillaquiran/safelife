<div class="content-wrapper bg-prin">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2 class="t2"><?php echo $pagina->titulo ?></h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item texto"><a href="#"><?php echo $pagina->raiz ?></a></li>
                        <li class="breadcrumb-item active texto"><?php echo $pagina->destino ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-prin">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="texto"><?php echo $pagina->contenido ?></p>
                                <p id="status"></p>
                                <center><p class="texto">Geolocalizacion: { Latitud: <span id="latitud"></span> / Longitud: <span id="longitud"></span> }</p></center>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            foreach ($botones as $boton_panico) {
                                echo '
                                    <div class="col-6 col-md-3" style="margin-bottom: 30px">
                                        <h3 class="t3">' . $boton_panico->boton . '</h3>
                                        <center><button class="btn-boton_panico" id="btn_panico-' . $boton_panico->cod_tipo_boton . '" onclick="btn_RegistroEmergencia('. $boton_panico->cod_tipo_boton .')"><img src="' . base_url() . 'assets/img/' . $boton_panico->url_imagen . '" /></button></center>
                                    </div>
                                    ';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>