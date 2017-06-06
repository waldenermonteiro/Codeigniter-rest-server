<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller{

   public function __construct() {
    parent::__construct();
    $this->load->model("Usuarios_model");

    autoriza();

}

public function gerenciar() {

    $usuario = $this->Usuarios_model->listar();
    $dados = array("usuarios" => $usuario);
    $this->load->template("usuarios/gerenciar", $dados);
}


}