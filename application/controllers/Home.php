<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SectionModel');
		$this->id = 1;
	}

	function index()
	{
		$data = array(
			'menu' => $this->SectionModel->section_ObtenerMenu($this->session->userdata('datos_usuario')->tipo_usuario),
			'pagina' => $this->SectionModel->section_ObtenerPagina($this->id)
		);

		$this->load->view('home', $data);
	}
}
