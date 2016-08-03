<?

function getUsers(){

	$sQuery = "SELECT * FROM users";
	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 
	$aResult = array();


	while($oResult = mysql_fetch_object($oStmt)){

		$oResult->tarefas = getTarefas($oResult->coduser);

		array_push($aResult, (array)$oResult);
	}
	
	echo json_encode($aResult);
}

function getTarefas($coduser){
	$sQuery = "SELECT * FROM tarefas WHERE coduser = $coduser";
	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 
	$aResult = array();

	while($oResult = mysql_fetch_object($oStmt)){
		$aResult[] = $oResult;
	}

	return $aResult;
}
?>