<?php
function idUsuario(){
	$ci = get_instance();
	$id = $ci->session->adm_logado["id"];
	return $id;
}
