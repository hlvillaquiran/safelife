<div class="card-body">
    <form method="post" action="<?php echo site_url('Login/iniciar_sesion'); ?>" id="frm_login">
        <h2 class="texto">Correo Electrónico</h2>
        <div class="input-group mb-3">
            <input type="email" name="txt_correo" id="correo" class="form-control" placeholder="Correo Electrónico" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </div>

        <h2 class="texto">Contraseña</h2>
        <div class="input-group mb-3">
            <input type="password" name="txt_contrasena" id="contrasena" class="form-control" placeholder="Contraseña" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <i class="fa-solid fa-key"></i>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-block btn-info" id="btn_Iniciar_Sesion">INICIAR SESION</button>
            </div>
        </div>
    </form>
</div>