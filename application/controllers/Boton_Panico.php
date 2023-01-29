<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Boton_Panico extends CI_Controller
{

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
	private $id;

	function __construct()
	{
		parent::__construct();
		$this->load->model('SectionModel');
		$this->load->model('BotonModel');
		$this->id = 2;
	}

	function index()
	{
		$data = array(
			'menu' => $this->SectionModel->section_ObtenerMenu($this->session->userdata('datos_usuario')->tipo_usuario),
			'pagina' => $this->SectionModel->section_ObtenerPagina($this->id),
			'botones' => $this->BotonModel->boton_ObtenerBotones()
		);

		$this->load->view('boton_panico', $data);
	}

	function Registrar_Emergencia()
	{
		$tipo_boton = $this->input->post('tipo_boton');
		$longitud = $this->input->post('longitud');
		$latitud = $this->input->post('latitud');
		$cod_usuario = $this->input->post('cod_usuario');

		$result = $this->BotonModel->boton_InsertarBoton($tipo_boton, $longitud, $latitud, $cod_usuario);

		return $this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
}
