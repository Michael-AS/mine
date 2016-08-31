<? 

function inputTarefa($aDados){

	echo 'Input Tarefa';
	echo '<pre>';
	print_r($aDados->oTarefa);


	$sQuery = "INSERT INTO tarefas SET "
						."coduser = " . $aDados->oTarefa->coduser . ", "
						."descricao = '".utf8_decode($aDados->oTarefa->descricao)."' , "									
						."dia = '".utf8_decode($aDados->oTarefa->coddia)."' , "			
						."horas = '".utf8_decode($aDados->oTarefa->horas)."' , "			
						."obs = '".utf8_decode($aDados->oTarefa->obs)."' ";								
											
	mysql_query($sQuery) or die($sQuery . mysql_error()); 
}

?>