<?php
function nomeUsuario($nomesession){
	$nomeUsuario = $nomesession;
	$partes = explode(' ', $nomeUsuario);
	$primeiroNome = array_shift($partes);
	$ultimoNome = array_pop($partes);
	$nome =$primeiroNome." ".$ultimoNome;
	return $nome;
}
?>