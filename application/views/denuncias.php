<?php

include("sistema/header.php");
include("sistema/aside.php");
include("sistema/denuncias.php");
include("sistema/footer.php");
include("sistema/funciones.php");

if($seteo_info == TRUE){
    echo ' 
    <script type="text/javascript">
    Swal.fire({
        icon: "success",
        title: "Denuncia Registrada Correctamente",
        text: "Ha ingresado la información de denuncia correctamente, en breve será atendida",
      })
    </script>
      ';
}