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
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="t4">BOTONES DE EMERGENCIA <i class="fa-solid fa-kit-medical"></i></h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="tbl_botones">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>T. Botón</th>
                                            <th>Fecha y Hora</th>
                                            <th>Coordenadas</th>
                                            <th>Atender</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>T. Botón</th>
                                            <th>Fecha y Hora</th>
                                            <th>Coordenadas</th>
                                            <th>Atender</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="t4">DENUNCIAS REGISTRADAS <i class="fa-solid fa-pen-to-square"></i></h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="tbl_denuncias">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>T. Denuncia</th>
                                            <th>Subdenuncia</th>
                                            <th>Fecha</th>
                                            <th>Atender</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>T. Denuncia</th>
                                            <th>Subdenuncia</th>
                                            <th>Fecha</th>
                                            <th>Atender</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>