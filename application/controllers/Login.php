<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	function __construct()
    {
        parent::__construct();
		$this->load->model('LoginModel');
    }

	function index()
	{
		$this->load->view('login');
	}

	function iniciar_sesion()
	{
		$correo = $this->input->post('txt_correo');
		$contrasena = $this->input->post('txt_contrasena');

		$qry = $this->LoginModel->login_VerificarCredenciales($correo, $contrasena);	

		if($qry->existe == TRUE)
		{
			$qry_datos = $this->LoginModel->login_ObtenerDatosUsuario($correo);
			$this->guardar_datos_sesion($qry_datos);

			redirect('Home');
		}else{
			$data = array(
				'correo' => $correo
			);

			$this->load->view('login', $data);
		}
	}

	function guardar_datos_sesion($qry_datos){
		$this->session->set_userdata('datos_usuario', $qry_datos);
		$this->session->set_userdata('viene_login', TRUE);
	}

	function cerrar_sesion()
	{
		$this->session->sess_destroy();
        redirect(base_url());  
	}
}
