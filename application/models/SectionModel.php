<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SectionModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function section_ObtenerMenu($tipo_usuario)
    {
        $sql = "call section_ObtenerMenu(?)";
        $qry = $this->db->query($sql, array($tipo_usuario));
        $data = $qry->result();
        $qry->free_result();
        $qry->next_result();

        return $data;
    }

    public function section_ObtenerPagina($id_pagina)
    {
        $sql = "call section_ObtenerPagina(?)";
        $qry = $this->db->query($sql, array($id_pagina));
        $data = $qry->row();
        $qry->free_result();
        $qry->next_result();

        return $data;
    }
}
