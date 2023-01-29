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
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="#">
                            <div class="row">
                                <div class="col-11">
                                    <div class="form-group">
                                        <label for="txt_numero_documento" class="texto">Buscar Comunidad</label>
                                        <input type="text" class="form-control form-control-border border-width-2 bg-sec texto-input" id="txt_buscar_comunidad" name="buscar_comunidad" />
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info btn-form" style="margin-top: 20px !important"><i class="fa-solid fa-magnifying-glass-location"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12">
                                <table class="tbl_comunidad">
                                    <tbody>
                                        <tr>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>