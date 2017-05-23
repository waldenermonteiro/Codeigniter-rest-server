<?php
class Usuarios_model extends CI_Model{
	private $tabela = 'alunos';

	public function inserir($aluno) {
		$sucesso = $this->db->insert("alunos", $aluno);
		return $sucesso;
	}
	public function buscarLogin($email, $senha) {
		$this->db->select("alunos.*");
		$this->db->from("alunos");
		$this->db->where("email", $email);
		$this->db->where("senha", $senha);
		$usuario = $this->db->get()->row_array();
		return $usuario;
	}   
	public function buscarExistente($email) {
		$this->db->select("alunos.*");
		$this->db->from("alunos");
		$this->db->where("email", $email);
		$usuario = $this->db->get()->row_array();
		return $usuario;
	} 
	public function buscarAluno($id) {
		$this->db->select("alunos.*");
		$this->db->from("alunos");
		$this->db->where("id", $id);
		$usuario = $this->db->get()->row_array();
		return $usuario;
	}   
	public function editar($id){
		$this->db->select("alunos.*");
		$this->db->from("alunos");
		$this->db->where('alunos.id', $id);
		return  $this->db->get()->row_array();
	}
	public function listar(){
		return $this->db->get($this->tabela)->result_array();
	}
	
	public function excluir($id) {
		$this->db->where('id', $id);
		return $this->db->delete($this->tabela);;
	}
	public function atualizar($id,$aluno){
		$this->db->where('id', $id);
		return $this->db->update($this->tabela, $aluno);

	}
}