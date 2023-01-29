<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login_VerificarCredenciales($correo, $contrasena)
    {
        $sql = "call login_VerificarCredenciales(?,?);";
        $qry = $this->db->query($sql, array($correo, $contrasena));

        $data = $qry->row();
        $qry->free_result();
        $qry->next_result();

        return $data;
    }

    function login_ObtenerDatosUsuario($correo){
		$sql = "call login_ObtenerDatosUsuario(?);";
        $qry = $this->db->query($sql, array($correo));

        $data = $qry->row();
        $qry->free_result();
        $qry->next_result();

        return $data;
	}
}
