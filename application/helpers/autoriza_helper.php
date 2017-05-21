<?php
function autoriza(){
	$ci = get_instance();
	if(!$ci->session->userdata("adm_logado")){
		$ci->session->set_flashdata("danger","Acesso não permitido");
		redirect("/");
	}
}
