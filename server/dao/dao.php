<?

function getUsers(){

	$sQuery = "SELECT * FROM users";
	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 
	$aResult = array();


	while($oResult = mysql_fetch_object($oStmt)){

		$oResult->segunda	= getTarefas($oResult->coduser, 1);
		$oResult->terca		= getTarefas($oResult->coduser, 2);
		$oResult->quarta	= getTarefas($oResult->coduser, 3);
		$oResult->quinta	= getTarefas($oResult->coduser, 4);
		$oResult->sexta		= getTarefas($oResult->coduser, 5);

		array_push($aResult, (array)$oResult);
	}
	
	echo json_encode($aResult);
}

function getTarefas($coduser, $weekDay){
	$sQuery = "SELECT * FROM tarefas WHERE coduser = $coduser AND dia = $weekDay";
	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 
	$aResult = array();

	while($oResult = mysql_fetch_object($oStmt)){
		$aResult[] = $oResult;
	}

	return $aResult;
}
?>