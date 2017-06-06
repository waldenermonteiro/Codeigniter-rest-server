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

class Aparelhos extends REST_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model("Usuarios_model");
		$this->load->model("Aparelhos_model");
		$this->load->model("Planos_model");

	}
	public function listar_get(){
		$aparelhos = $this->Aparelhos_model->listar();
		if($aparelhos){
			$this->response(array('response' => $aparelhos),200);
		}else{
			$this->response(array('erro' => "Não há aparelhos"),404);
		}
		
	}
	public function insere_post(){
		$select = $this->post("select");
		$array = count($select);
		$copia = count(array_unique($select));

		if($array  != $copia) {
			$this->response(array('erro' => "Existem Aparelhos Duplicados"),200);

		}else{
			for($var = 0;$var < count($select);$var ++){
				$nomeAparelho = $select[$var];
				$aparelho = $this->Aparelhos_model->buscar($nomeAparelho);
				$id =   $aparelho["id"];
				$arrayPlanoId = $this->Planos_model->buscarUltimo();
				$id_plano = $arrayPlanoId['id'];
				$aparelho_plano = array(
					"id_aparelhos" => $id,
					"id_planos" => $id_plano);
				$resultado = $this->Aparelhos_model->inserir($aparelho_plano);
			}



			if($resultado){
				$this->response(array('success' => "Plano Cadastrado com sucesso"),200);
			}else{
				$this->response(array('erro' => "Não há aparelhos"),404);
			}


		}
		


		
	}
}