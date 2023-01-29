<script type="text/javascript">
    $('#correo').val(<?php echo json_encode($correo) ?>);

    Command: toastr["error"]("No ha ingresado un correo electrónico y contraseña válido. Vuelve a Intentarlo", "¡Credenciales Incorrectos!")

    toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-center",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    }
</script>