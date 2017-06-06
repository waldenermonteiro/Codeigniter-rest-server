<?php
class Adms_model extends CI_Model{
	private $tabela = 'adms';

	
	public function editar($id){
		$this->db->select("adms.*");
		$this->db->from("adms");
		$this->db->where('adms.id', $id);
		return  $this->db->get()->row_array();
	}
	public function inserir($usuario) {
		$sucesso = $this->db->insert("adms", $usuario);
		return $sucesso;
	}
	public function verificaEmail($email){
		$this->db->where('email', $email);
		return $this->db->get("adms")->row_array();
	}
	public function verificaEmailAtualizar($id,$email){
		$this->db->where('email', $email);
		$this->db->where_not_in('id', $id);
		return $this->db->get("adms")->row_array();
	}
	public function buscarUsuario($id){
		$this->db->select("adms.*");
		$this->db->from("adms");
		$this->db->where('adms.id', $id);
		return  $this->db->get()->row_array();
	}
	
	public function atualizar($id,$usuario){
		$this->db->where('id', $id);
		return $this->db->update($this->tabela, $usuario);

	}
	public function recuperaSenhaAtual($id){
		$this->db->where('id', $id);
		return $this->db->get("adms")->row_array();

	}
	public function salvaFoto($id,$imagem){
		$this->db->where('id', $id);
		return $this->db->update($this->tabela, $imagem);
	}
}
