<? 

function inputHora($aDados){

	echo 'Input Hora';
	echo '<pre>';
	print_r($aDados->oHora);

	$sQuery = "INSERT INTO horas SET "
						."descricao = '" . $aDados->oHora->descricao . "', "					
						."horas = '" . $aDados->oHora->horas . ":00:00', "
						."dtcadastro = NOW()";								
											
	mysql_query($sQuery) or die($sQuery . mysql_error()); 

}

function deleteHora($cod){

	echo 'Delete Hora';
	echo '<pre>';

	$sQuery = "DELETE FROM horas WHERE codhora = '" . $cod . "' ";					
											
	mysql_query($sQuery) or die($sQuery . mysql_error()); 
}

?>