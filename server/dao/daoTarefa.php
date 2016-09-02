<? 

function inputTarefa($aDados){

	echo 'Input Tarefa';
	echo '<pre>';
	print_r($aDados->oTarefa);


	$sQuery = "INSERT INTO tarefas SET "
						."descricao = '" . $aDados->oTarefa->descricao . "', "					
						."dia = '" . $aDados->oTarefa->dia . "', "
						."dtcadastro = NOW()";								
											
	mysql_query($sQuery) or die($sQuery . mysql_error()); 
}

function deleteTarefa($cod){

	echo 'Delete Tarefa';
	echo '<pre>';

	$sQuery = "DELETE FROM tarefas WHERE codtarefa = '" . $cod . "' ";						
											
	mysql_query($sQuery) or die($sQuery . mysql_error()); 
}

?>