<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{

    public function autenticar(){

        $this->load->model("login_model");
        $email = $this->input->post("email");
        $senha = md5($this->input->post("senha"));
        $usuario = $this->login_model->buscarUsuario($email, $senha);

        if($usuario) {
            $this->session->set_userdata("adm_logado",$usuario);
            redirect("dashboard/");

        }else{
            $this->session->set_flashdata("danger","Usuário ou senha inválidos");
            redirect("/");
        }

    }
    public function logout(){

        $this->session->unset_userdata("adm_logado");
        redirect("/");
    
   }
}