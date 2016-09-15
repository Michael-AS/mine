<? 

function inputTarefa($aDados){

	echo 'Input Tarefa';
	echo '<pre>';
	print_r($aDados->oTarefa);

	$explode = explode('/', $aDados->oTarefa->dia);
	// $aDados->oTarefa->dia = $explode['2'] . '-' . $explode['1'] . '-' . $explode['0']; 

	$aDados->oTarefa->dia = implode('-', array_reverse($explode)); 

	$sQuery = "INSERT INTO tarefas SET "
						."descricao = '" . stringDecode($aDados->oTarefa->descricao) . "', "					
						."dia = '" . $aDados->oTarefa->dia . "', "
						."status = '0', "
						."dtcadastro = NOW()";								
											
	mysql_query($sQuery) or die($sQuery . mysql_error()); 
}

function deleteTarefa($cod){

	echo 'Delete Tarefa';
	echo '<pre>';

	$sQuery = "DELETE FROM tarefas WHERE codtarefa = '" . $cod . "' ";						
											
	mysql_query($sQuery) or die($sQuery . mysql_error()); 
}

function changeTarefa($cod){

	echo 'Change Tarefa';
	echo '<pre>';

	$sQuery = "UPDATE tarefas SET status = !status WHERE codtarefa = '" . $cod . "' ";			
						
	mysql_query($sQuery) or die($sQuery . mysql_error()); 
}

?>