<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Methods: POST, OPTIONS");

header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

class Planos extends REST_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model("Usuarios_model");
		$this->load->model("Aparelhos_model");
		$this->load->model("Planos_model");

	}
	public function insere_post(){
		$nome = $this->post("nome");
		$series = $this->post("series");
		$repeticoes = $this->post("repeticoes");
		$id_alunos = $this->post("id_alunos");

		$resultado = $this->Planos_model->buscarNome($nome,$id_alunos);
		if($resultado){

			$this->response(array('erro' => "Plano já cadastrado"),200);
		}else{

			$plano =array(
				"nome"=> $nome,
				"series" =>$series,
				"repeticoes" => $repeticoes,
				"id_alunos" =>$id_alunos);
			$resultado = $this->Planos_model->inserir($plano);
			if($resultado){
				$this->response(array('success' => "Plano cadastrado com sucesso"),200);
			}else{
				$this->response(array('erro' => "Não há aparelhos"),200);
			}
		}

		
	}
	public function listar_post(){
		$id = $this->post("id");
		$planos = $this->Planos_model->listarPlanosUsuario($id);
		if($planos){
			$this->response($planos,200);
		}else{
			$this->response(array('erro' => "Você não cadastrou nenhum plano"),200);
		}
	}

	public function listarPlanoEspecifico_post(){
		$id = $this->post("id");
		$plano = $this->Planos_model->listarPlanoEspecifico($id);
		if($plano){
			$this->response($plano,200);
		}else{
			$this->response(array('erro' => "Não Existe o plano especificado"),200);
		}
	}
	public function getNome_post(){
		$id = $this->post("id");
		$nome = $this->Planos_model->getNome($id);
		if($nome){
			$this->response($nome,200);
		}else{
			$this->response(array('erro' => "Não existe o nome especificado"),200);
		}
	}
	public function editar_post(){
		$id = $this->post("id");
		$nome = $this->post("nome");
		$plano = array("nome" => $nome);

		$id_aluno = $this->post("id_aluno");

		$resultado = $this->Planos_model->buscarNome($nome,$id_aluno);
		if($resultado){

			$this->response(array('erro' => "Plano já cadastrado"),200);

		}else{
			$resultado2 = $this->Planos_model->editar($id,$plano);
			if($resultado2){
				$this->response(array('success' => "Plano editado com sucesso"),200);
			}else{
				$this->response(array('erro' => "Aconteceu algo"),200);
			}
		}

	}

	public function excluir_post(){

		$id = $this->post("id");
		$plano = array(
			"ativo" => "0"
			);
		$resultado = $this->Planos_model->excluir($id,$plano);

		if($resultado){
			$this->response(array('success' => "Plano Excluido com sucesso"),200);
		}else{
			$this->response(array('erro' => "erro"),200);
		}

	}
	public function cancelar_post(){

		$planoId = $this->Planos_model->buscarUltimo();
		$id = $planoId["id"];

		$plano = array(
			"ativo" => "0"
			);
		$resultado = $this->Planos_model->excluir($id,$plano);

		if($resultado){
			$this->response(array('success' => "Plano Excluido com sucesso"),200);
		}else{
			$this->response(array('erro' => "erro"),200);
		}

	}
}