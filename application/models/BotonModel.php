<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BotonModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function boton_ObtenerBotones()
    {
        $sql = "call boton_ObtenerBotones()";
        $qry = $this->db->query($sql);

        $data = $qry->result();
        $qry->free_result();
        $qry->next_result();

        return $data;
    }

    public function boton_InsertarBoton($tipo_boton, $longitud, $latitud, $cod_usuario)
    {
        $sql = "call boton_InsertarBoton(?,?,?,?)";
        $qry = $this->db->query($sql, array($cod_usuario, $tipo_boton, $latitud, $longitud));

        if($qry){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}