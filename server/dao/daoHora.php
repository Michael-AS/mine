<? 

function inputHora($aDados){

	echo 'Input Hora';
	echo '<pre>';
	print_r($aDados->oHora);

	$sQuery = "INSERT INTO horas SET "
						."descricao = '" . $aDados->oHora->descricao . "', "					
						."horas = '" . $aDados->oHora->horas . "', "
						."dtcadastro = NOW()";								
											
	mysql_query($sQuery) or die($sQuery . mysql_error()); 
}

function deleteHora($aDados){

	echo 'Delete Hora';
	echo '<pre>';
	print_r($aDados->oHora);

	$sQuery = "DELETE FROM horas WHERE codhora = '" . $aDados->oHora->codhora . "' ";						
											
	mysql_query($sQuery) or die($sQuery . mysql_error()); 
}

?>