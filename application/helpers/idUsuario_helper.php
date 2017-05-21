<?php
function idUsuario(){
	$ci = get_instance();
	$id = $ci->session->usuario_logado["id"];
	return $id;
}
