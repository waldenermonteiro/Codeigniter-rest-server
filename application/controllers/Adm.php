<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm extends CI_Controller{

    public function verificaLogin(){
        if($this->session->userdata("adm_logado")){
            redirect("dashboard/");
        }

    }
    public function login(){
        $this->verificaLogin();
        $this->load->view("adm/login");

    }
    public function autenticar(){
        
        $this->load->model("login_model");
        $email = $this->input->post("email");
        $senha = md5($this->input->post("senha"));
        $usuario = $this->login_model->buscarAdm($email, $senha);

        if($usuario) {
            $this->session->set_userdata("adm_logado",$usuario);
            redirect("dashboard/");

        }else{
            $this->session->set_flashdata("danger","Usuário ou senha inválidos");
            redirect("adm/login");
        }

    }

}