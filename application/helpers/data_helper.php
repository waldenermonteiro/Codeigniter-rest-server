<?php

function verificarData($datas,$quantidade,$limite){
	$dataInicio = date('d/m/Y',strtotime($datas["data_inicial"]));
	$dataSomada = date('d/m/Y',strtotime($datas["data_somada"]));
	$dataAtual = date('d/m/Y');

	if($quantidade["quantidade"] <= $limite["limite"] && $dataAtual == $dataSomada){
		return true;
	}else if($quantidade["quantidade"] <= $limite["limite"] && $dataAtual <> $dataSomada){
		return false;
	}
}

function dataInicio($datas){
	$dataInicio2 = $datas["data_somada"];
	return $dataInicio2;
}
function dataFim($datas){
	$dataInicio2 = $datas["data_somada"];
	$dataSomada2 =  date('Y-m-d H:i:s',strtotime("+7 days",strtotime($dataInicio2)));
	return $dataSomada2;
}
function formatarData($data){
	$dataFormatada = date("d-m-Y H:i:s",strtotime($data));
	return $dataFormatada;
}
function verificarRedacao($redacao){
	$date1 = new DateTime("now");
	$date2 = new DateTime($redacao);
	$interval = date_diff($date2, $date1);
	if($interval->format("%H") > 0){
		return true;
	}else{
		return false;
	}
}