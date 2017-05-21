<?php

class login_model extends CI_Model{
	

    public function buscarAdm($email, $senha) {
        $this->db->select("adms.*");
        $this->db->from("adms");
        $this->db->where("email", $email);
        $this->db->where("senha", $senha);
        $usuario = $this->db->get()->row_array();
        return $usuario;
    }   
}