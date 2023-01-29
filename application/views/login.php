<?php

include("preliminares/header.php");
include("preliminares/login.php");
include("preliminares/footer.php");

/**** PARA MOSTRAR MENSAJE DE ERROR */
if(isset($correo)){
    include("preliminares/messages.php");
}
