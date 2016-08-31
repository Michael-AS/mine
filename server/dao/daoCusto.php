<? 

function inputCusto($aDados){

	echo 'Input Custo';
	echo '<pre>';
	print_r($aDados->oCusto);

	$sQuery = "INSERT INTO custos SET "
						."descricao = '" . $aDados->oCusto->descricao . "', "					
						."valor = '" . $aDados->oCusto->valor . "', "
						."dtcadastro = NOW()";								
											
	mysql_query($sQuery) or die($sQuery . mysql_error()); 
}

function deleteCusto($aDados){

	echo 'Delete Custo';
	echo '<pre>';
	print_r($aDados->oCusto);

	$sQuery = "DELETE FROM custos WHERE codcusto = '" . $aDados->oCusto->codcusto . "' ";						
											
	mysql_query($sQuery) or die($sQuery . mysql_error()); 
}

?>