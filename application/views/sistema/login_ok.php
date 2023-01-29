<script>
Command: toastr["success"]("Has iniciado sesión correctamente... Bienvenido " + <?php echo json_encode($this->session->userdata('datos_usuario')->nombre." ".$this->session->userdata('datos_usuario')->apellido) ?>, "¡Credenciales correctos!")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
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