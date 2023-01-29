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
                        <form action="<?php echo site_url('Denuncias/Registrar_Denuncia'); ?>" method="post"  enctype="multipart/form-data"> 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sel_denuncia" class="texto">Denuncias Ciudadanas</label>
                                        <select id="sel_denuncia" name="denuncia" width: 100%; class="form-control" onchange="Agregar_Formulario()" required>
                                            <option value>Seleccione tipo de denuncia</option>
                                            <option value="1">Pérdida de Documentos</option>
                                            <option value="2">Quejas Ciudadanas</option>
                                            <option value="3">Persona Desaparecida</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="formulario_denuncias">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-danger btn-form" style="float: right;" onclick="Cancelar()"><i class="fa-regular fa-circle-xmark"></i></button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-form"><i class="fa-regular fa-circle-check"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>