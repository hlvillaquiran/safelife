<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <!--<div class="image">
                <a href="#"><img style="width:55px; height: 55px" src="<?php //echo $pagina_web['url_foto_perfil'] ?>" class="img-circle elevation-2" alt="User Image"></a>
            </div>-->
            <div class="info">
            <a href="#" class="d-block"><?php echo $this->session->userdata('datos_usuario')->nombre." ".$this->session->userdata('datos_usuario')->apellido ?></a>
                <a href="#" class="d-block" style="font-size: calc(0.3em + 0.3vw);"><?php echo $this->session->userdata('datos_usuario')->correo_electronico; ?></a>
                <a href="<?php echo base_url() ?>Login/Cerrar_Sesion" class="d-block"><small>[Cerrar Sesión]</small></a>
            </div>
        </div>

    
        <nav class="mt-2" id="menu">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php
                    foreach($menu as $menuitem)
                    {
                        if($pagina->cod_menu == $menuitem->cod_menu){
                            $class = 'active';
                        }else{
                            $class = '';
                        }

                        echo '
                        <li class="nav-item id="menu-item-'. $menuitem->cod_menu.'">
                            <a href="'. site_url($menuitem->url) .'" class="nav-link '. $class .'"  id="mop-'. $menuitem->cod_menu.'">
                                '. $menuitem->icono .'
                                <p>
                                    '. $menuitem->nombre .'
                                </p>
                            </a>
                        </li>
                        ';
                    }
                ?>
            </ul>
        </nav>

    </div>

</aside>