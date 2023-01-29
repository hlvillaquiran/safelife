<?php

include("sistema/header.php");
include("sistema/aside.php");
include("sistema/home.php");
include("sistema/footer.php");

if($this->session->userdata('viene_login') == TRUE)
{
    include("sistema/login_ok.php");
    $this->session->set_userdata('viene_login', FALSE);
}