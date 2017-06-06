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

class Usuario extends REST_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model("Usuarios_model");
		$this->load->model("Aparelhos_model");
		$this->load->model("Planos_model");

	}
	public function login_post() {
		$email = $this->post("email");
		$senha = $this->post("senha");
		$resultado = $this->Usuarios_model->buscarLogin($email,md5($senha));
		if(!$email && !$senha){
			$this->response("null",400);

		}else{
			if($resultado){
				$this->response($resultado,200);
			}else{
				$this->response(array('erro' => 'Email ou senha inválidos'),200);
			}
		}

	}

	public function insere_post(){
		$nome = $this->post("nome");
		$email = $this->post("email");
		$senha = $this->post("senha");
		$usuario =array(
			"nome"=> $nome,
			"email" =>$email,
			"senha" => md5($senha)

			);
		$existir = $this->Usuarios_model->buscarExistente($email);
		if($existir){
			$this->response(array('erro' => 'Email já cadastrado'),200);

		}else{
			$resultado = $this->Usuarios_model->inserir($usuario);
			if(!$nome && !$email && !$senha){
				$this->response("null",400);
			}else{
				if($resultado){
					$this->response(array('success' => 'Usuario cadastrado com sucesso'),200);

				}else{
					$this->response(array('erro' => 'Algum erro qualquer'),200);

				}
			}
		}
		
	}

	public function listar_get(){
// JSON_PRETTY_PRINT
		$usuarios = $this->Usuarios_model->listar();
		if($usuarios){
			$this->response(array('response' => $usuarios),200);
		}else{
			$this->response(array('erro' => "Não há usuarios"),404);
		}
		
	}

	public function listar_post(){
		$usuarios = $this->Usuarios_model->listar();
		if($usuarios){
			$this->response(array('response' => $usuarios),200);
		}else{
			$this->response(array('erro' => "Não há usuarios"),404);
		}
		
	}

	public function buscar_post(){
		$id = $this->post("id");
		if(!$id){
			$this->response(null,404);
		}
		$usuario = $this->Usuarios_model->buscarAluno($id);

		if($usuario){
			$this->response($usuario,200);
		}else{
			$this->response(array('erro' => "Usuario nao encontrado"),200);
		}
	}

	public function atualizar_post(){
		$id = $this->post("id");
		$nome = $this->post("nome");
		$email = $this->post("email");
		$senha = $this->post("senha");

		if(!$id && !$nome && !$email &&! $senha || !$id || !$nome ||!$email || !$senha){
			$this->response(array("erro" => "null" ),400);
		}else{
			$usuario = array(
				"nome" => $nome,
				"email"=> $email,
				"senha"=> md5($senha)
				);
			$usuario = $this->Usuarios_model->atualizar($id,$usuario);

			if($usuario){
				$this->response(array("success" =>"Usuario alterado com sucesso"),200);
			}else{
				$this->response(array('erro' => "Usuario nao encontrado"),200);
			}

		}
		
	}

	public function excluir_post(){
		$id = $this->post("id");
		if(!$id){
			$this->response(null,404);
		}else{
			$usuario = $this->Usuarios_model->buscarAluno($id);

			if($usuario){
				$excluir = $this->Usuarios_model->excluir($id);
				if($excluir){
					$this->response(array('response' => "Usuario excluido com sucesso"),200);
				}else{
					$this->response(array('erro' => "Usuario nao excluido"),200);
				}
			}else{
				$this->response(array('erro' => "Usuario nao encontrado"),200);
			}

		}

	}


}