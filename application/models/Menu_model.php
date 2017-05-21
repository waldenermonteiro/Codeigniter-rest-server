<?php

class Menu_model extends CI_Model{
	
	
	public function listaPermissao($perfil) {
        $this->db->select("perfis_modulos.*");
        $this->db->from("perfis_modulos");
        $this->db->where("id_perfis", $perfil);
        $adm = $this->db->get()->result_array();
        return $adm;
    }	
}