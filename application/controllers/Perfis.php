<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfis extends CI_Controller {
	private $id;
	public function __construct(){
		parent::__construct();
		$this->load->model("Usuarios_model");
		$this->load->helper("idUsuario");
		$this->id = idUsuario();
	}


	public function formulario(){

		$usuario = $this->Usuarios_model->editar($this->id );

		$dados = array("usuario" => $usuario);
		$this->load->template('perfis/formulario', $dados);
	}


	public function atualiza(){
		$id = $this->input->post("id");

		$this->form_validation->set_rules("email", "Email", "trim|required|min_length[5]");
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger alert-dismissible fade in' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>×</span>
			</button>", "</div>");

		$sucesso = $this->form_validation->run();

		if($sucesso){

			$senha = $this->input->post("senha");

			if($senha){
				$novaSenha = md5($this->input->post("senha"));
			}else{

				$novaSenha = $this->Usuarios_model->recuperaSenhaAtual($id);
				$novaSenha = $novaSenha['senha'];
			}

			$verificacao = $this->Usuarios_model->verificaEmailAtualizar($id,$this->input->post("email"));

			if($verificacao){
				$this->session->set_flashdata("danger", "Email já existente");
				redirect("perfis/formulario");
			}else{

				$usuario = array(
					"id" 	=> $this->input->post("id"),
					"email" => $this->input->post("email"),
					"senha" => $novaSenha
					);
				$this->Usuarios_model->atualizar($id,$usuario);
			}


			$fotos = doUpload($_FILES, 200, 200, './uploads/perfil/');


			$erro = array_key_exists('error', $fotos);


			if($erro !== false ){

				if($fotos['error'] != "<p>Nenhum arquivo foi selecionado.</p>"){
					$this->session->set_flashdata("danger", "{$fotos['error']}");
					redirect("perfis/formulario");
				}else{
					$this->session->set_flashdata("success", "Perfil Atualizado com sucesso");
					redirect("perfis/formulario");
				}

			}else{
				foreach ($fotos as $foto) {
					$imagem = array( 
						"foto" 	  => $foto['upload_data']['file_name']

						);

					$this->Usuarios_model->salvaFoto($id,$imagem);

				}

				$this->load->model("Usuarios_model");
				$usuario = $this->Usuarios_model->buscarUsuario($id);
				$this->session->unset_userdata("usuario_logado");
				$this->session->set_userdata("usuario_logado", $usuario);
				$this->session->set_flashdata("success", "Logado com sucesso");


				$this->session->set_flashdata("success", "Perfil Atualizado com sucesso");
				redirect("perfis/formulario");


			}
		}else{

			$this->load->model("Usuarios_model");

			$usuario = $this->Usuarios_model->editar($this->id);

			$dados = array("usuario" => $usuario);
			$this->load->template('perfis/formulario', $usuario);
		}
	}





	function check_default($post_string){

		return $post_string == '0' ? FALSE : TRUE;
	}
}
