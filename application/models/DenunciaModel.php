<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DenunciaModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function denuncia_InsertarDenuncia($denuncia, $num_documento, $nombre, $ciudad_extravio, $sub_queja, $direccion_queja, $detalles_denuncia, $carga_foto, $edad_desaparecida, $ropa, $lugar_contacto, $fecha_hora, $cod_usuario)
    {
        $sql = "call denuncia_InsertarDenuncia(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $qry = $this->db->query($sql, array($denuncia, $num_documento, $nombre, $ciudad_extravio, $sub_queja, $direccion_queja, $detalles_denuncia, $carga_foto, $edad_desaparecida, $ropa, $lugar_contacto, $fecha_hora, $cod_usuario));

        if($qry){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}