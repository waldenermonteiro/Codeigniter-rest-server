<?php
class Perfis_model extends CI_Model{

	public function listar(){
		$this->db->select("*");
		$this->db->from("perfis");
		$this->db->where_not_in("id",3);
		
		return  $this->db->get()->result_array();
	}
}