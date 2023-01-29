<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Denuncias extends CI_Controller
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
		$this->load->model('DenunciaModel');

		$this->id = 3;
	}

	function index()
	{
		$data = array(
			'menu' => $this->SectionModel->section_ObtenerMenu($this->session->userdata('datos_usuario')->tipo_usuario),
			'pagina' => $this->SectionModel->section_ObtenerPagina($this->id),
			'seteo_info' => FALSE
		);

		$this->load->view('denuncias', $data);
	}

	function Registrar_Denuncia()
	{
		$denuncia = $this->input->post('denuncia');

		switch ($denuncia) {
			case 1:
				switch ($this->input->post('doc_extraviado')) {
					case 1:
						$sub_queja = "Cédula";
						break;
					case 2:
						$sub_queja = "Pasaporte";
						break;
					default:
						$sub_queja = "Otros";
				}
				$tipo_denuncia = "Documento Extraviado";
				$num_documento = $this->input->post('numero_documento');
				$nombre = $this->input->post('nombre_denunciante');
				$ciudad_extravio = $this->input->post('ciudad_extravio');
				$detalles_denuncia = $this->input->post('detalles_extravio');
				$direccion_queja = "";
				$carga_foto = "";
				$edad_desaparecida = "";
				$ropa = "";
				$lugar_contacto = "";
				$fecha_hora = date('y-m-d H:i:s');;

				break;

			case 2:
				switch ($this->input->post('sub_queja')) {
					case 1:
						$sub_queja = "Basura Acumulada";
						break;
					case 2:
						$sub_queja = "Falta de Iluminación";
						break;
					case 3:
						$sub_queja = "Postes/árboles caídos";
						break;
					default:
						$sub_queja = "Otros";
				}

				$tipo_denuncia = "Quejas Ciudadanas";
				$num_documento = "";
				$ciudad_extravio = "";
				$direccion_queja = $this->input->post('direccion_queja');
				$detalles_denuncia = $this->input->post('detalles_queja');
				$nombre = "";
				$edad_desaparecida = "";
				$ropa = "";
				$lugar_contacto = "";
				$fecha_hora = date('y-m-d H:i:s');

				$data = $this->subirImagen();
				$carga_foto = $data["file_name"];

				break;

			default:
				$tipo_denuncia = "Persona Desaparecida";
				$num_documento = "";
				$ciudad_extravio = "";
				$sub_queja = "";
				$direccion_queja = "";
				$detalles_denuncia = "";
				$nombre = $this->input->post('nombre_desaparecida');
				$edad_desaparecida = $this->input->post('edad_desaparecida');
				$ropa = $this->input->post('ropa');
				$lugar_contacto = $this->input->post('lugar_contacto');
				$fecha_hora = $this->input->post('fecha_hora');

				$data = $this->subirImagen();
				$carga_foto = $data["file_name"];
		}
		$result = $this->DenunciaModel->denuncia_InsertarDenuncia(
			$tipo_denuncia,
			$num_documento,
			$nombre,
			$ciudad_extravio,
			$sub_queja,
			$direccion_queja,
			$detalles_denuncia,
			$edad_desaparecida,
			$ropa,
			$lugar_contacto,
			$fecha_hora,
			$carga_foto,
			$this->session->userdata('datos_usuario')->cod_usuario
		);

		if ($result) {
			$data = array(
				'menu' => $this->SectionModel->section_ObtenerMenu($this->session->userdata('datos_usuario')->tipo_usuario),
				'pagina' => $this->SectionModel->section_ObtenerPagina($this->id),
				'seteo_info'  => TRUE
			);

			$this->load->view('denuncias', $data);
		} else {
			echo '
				<script type="text/javascript">
				Swal.fire({
					icon: "error",
					title: "Denuncia No Registrada Correctamente",
					text: "No se ha ingresado la información de denuncia correctamente",
				});
				</script>
			';
		}
	}

	function subirImagen()
	{
		$config['upload_path']   = 'assets/img/img_denuncias/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['overwrite']     = true;
		$config['encrypt_name']  = false;
		$config['remove_spaces'] = true;
		$this->load->library('upload', $config);

		if (!is_dir($config['upload_path'])) {
			die("El directorio de carga no existe");
		}

		if (!$this->upload->do_upload('carga_foto')) {
			echo 'ERROR AL SUBIR ARCHIVO';
		} else {
			$data = $this->upload->data();
			return $data;
		}
	}
}
