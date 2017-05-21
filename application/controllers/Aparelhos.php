<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aparelhos extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model("Aparelhos_model");
		autoriza();

	}
	public function cadastro(){
		$this->load->template("aparelhos/cadastro.php");
	}
	public function inserir(){
		$this->form_validation->set_rules("nome","nome","required|min_length[4]");
		$this->form_validation->set_rules("descricao","descricao","required");
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger' style='font-size: 16px;padding:3px;'> ","</p>");
		$sucesso = $this->form_validation->run();
		$id= $this->input->post("id");
		if($sucesso){

			$aparelhos = doUpload($_FILES, 800, 800, './uploads/aparelhos/');

			$erro = array_key_exists('error', $aparelhos);
			if($erro !== false ){

				if($aparelhos['error'] != "<p>Nenhum arquivo foi selecionado.</p>"){
					$this->session->set_flashdata("success", "Erro");
					redirect("aparelhos/cadastro");
				}else{
					$this->session->set_flashdata("danger", "Nenhuma imagem selecionada");
					$this->load->template("aparelhos/inserir");
				}

			}else{
				foreach ($aparelhos as $aparelho) {
					$aparelho = array(
						"nome" => $this->input->post("nome"),
						"descricao" => $this->input->post("descricao"),
						"imagem" => $aparelho['upload_data']['file_name'],

						);
					$this->Aparelhos_model->inserir($aparelho);
				}
				$this->session->set_flashdata("success", "Aparelho cadastrado com sucesso");
				redirect("aparelhos/cadastro");
			}
		}else{

			$this->session->set_flashdata("danger", "Aparelho não cadastrado");
			$this->load->template("aparelhos/cadastro");
		}
	}

	public function gerenciar(){
		$aparelho = $this->Aparelhos_model->listar();
		$dados = array("aparelhos" => $aparelho);
		$this->load->template("aparelhos/gerenciar.php", $dados);
	}
	public function editar($id){
		$dados['aparelho']= $this->Aparelhos_model->editar($id);
		$this->load->template("aparelhos/editar",$dados);

	}
	public function atualizar(){
		$this->form_validation->set_rules("nome","nome","required|min_length[4]");
		$this->form_validation->set_rules("descricao","descricao","required");
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger' style='font-size: 16px;padding:3px;'> ","</p>");
		$sucesso = $this->form_validation->run();
		$id= $this->input->post("id");
		if($sucesso){

			$aparelhos = doUpload($_FILES, 800, 800, './uploads/aparelhos/');

			$erro = array_key_exists('error', $aparelhos);
			if($erro !== false ){

				if($aparelhos['error'] != "<p>Nenhum arquivo foi selecionado.</p>"){
					$this->session->set_flashdata("success", "Erro");
					redirect("aparelhos/cadastro");
				}else{
					$this->session->set_flashdata("danger", "Nenhuma imagem selecionada");
					$this->load->template("aparelhos/atualizar");
				}

			}else{
				foreach ($aparelhos as $aparelho) {
					$aparelho = array(
						"nome" => $this->input->post("nome"),
						"descricao" => $this->input->post("descricao"),
						"imagem" => $aparelho['upload_data']['file_name'],

						);
					$status = $this->Aparelhos_model->atualizar($id,$aparelho);
				}
				$this->session->set_flashdata('success', 'Aparelho atualizado com sucesso.');
				redirect("aparelhos/gerenciar");
			}
		}else{

			$this->session->set_flashdata("danger", "Não foi possível alterar o Aparelho");
			$this->editar($id);
		}

	}
	public function excluir($id){
		$status = $this->Aparelhos_model->excluir($id);
		if($status){
			$this->session->set_flashdata('success', 'Aparelho excluído com sucesso.');
		}else{
			$this->session->set_flashdata('danger', 'Não foi possível excluir o Aparelho.');
		}
		redirect("aparelhos/gerenciar");
	}

}


