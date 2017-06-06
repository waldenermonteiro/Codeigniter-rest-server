<?php
class Planos_model extends CI_Model{
	private $tabela = 'planos';

	public function inserir($plano) {
		$sucesso = $this->db->insert($this->tabela, $plano);
		return $sucesso;
	}

	public function buscarUltimo(){
		$this->db->select("planos.id as id");
		$this->db->from("planos");
		$this->db->order_by("planos.id", "desc");
		$this->db->limit(1);
		return  $this->db->get()->row_array();

	}
	// SELECT planos.nome as nomePlano,aparelhos.nome as nomeAparelho FROM planos inner join aparelhos_planos on planos.id = aparelhos_planos.id_planos INNER JOIN aparelhos on aparelhos_planos.id_aparelhos = aparelhos.id where planos.id = 66;

	public function listarPlanosUsuario($id){
		$this->db->where('id_alunos', $id);
		$this->db->where('ativo', 1);
		return $this->db->get($this->tabela)->result_array();
	}

	public function listarPlanoEspecifico($id){
		$this->db->select("planos.nome as nomePlano,aparelhos.nome as nomeAparelho,aparelhos.imagem as imagem,aparelhos.modo_operacao as modo_operacao");
		$this->db->from("planos");
		$this->db->join("aparelhos_planos","aparelhos_planos.id_planos = planos.id ");
		$this->db->join("aparelhos","aparelhos_planos.id_aparelhos = aparelhos.id");
		$this->db->where('planos.id', $id);
		return  $this->db->get()->result_array();
	}

	public function buscarNome($nome,$id){
		$this->db->where('nome', $nome);
		$this->db->where('id_alunos', $id);
		$this->db->where('ativo', 1);
		return  $this->db->get($this->tabela)->row_array();
	}
	public function getNome($id){
		$this->db->where('id', $id);
		return  $this->db->get($this->tabela)->row_array();
	}

	public function editar($id,$plano){
		$this->db->where('id', $id);
		return $this->db->update($this->tabela, $plano);
	}
	public function excluir($id,$plano){
		$this->db->where('id', $id);
		return $this->db->update($this->tabela, $plano);
	}
}