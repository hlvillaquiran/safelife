<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Hoover Villaquiran" />
    <meta name="description" content="Safe Life v1.0 | Entorno seguro" />
    <meta name="robots" content="noindex,nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Safe Life&copy; v1.0 | Entorno Seguro</title>

    <!---- CSS ------->
    <link href="<?php echo base_url() ?>assets/css/adminlte.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url() ?>assets/css/preliminares.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url() ?>assets/css/toastr.min.css" rel="stylesheet" type="text/css">

    <!---- JS ------->
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/adminlte.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>

    <!---- FUNCIONES JAVASCRIPT LOCALES ---->
    <script type="text/javascript">
        function enlace_IniciarSesion()
        {
            window.location.href = "<?php echo site_url('Login'); ?>";
        }
    </script>
</head>

<body class="login-page bg-prin">
    <div class="login-box" style="min-height: 400px; min-width: 40%; max-width: 95%">
        <div class="card bg-sec">
            <div class="card-header text-center">
                <h1 class="t1">SafeLife</h1>
                <p class="texto">Entorno Seguro</p>
            </div>