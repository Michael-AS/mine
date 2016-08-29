<?

function getUsers(){

	$sQuery = "SELECT * FROM users";
	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 
	$aResult = array();

	while($oResult = mysql_fetch_object($oStmt)){
		$oResult->todo	= getTarefas($oResult->coduser, 'todo');
		$oResult->doing		= getTarefas($oResult->coduser, 'doing');
		$oResult->done	= getTarefas($oResult->coduser, 'done');	
		array_push($aResult, encodeUT8Array($oResult));
	}

	echo json_encode($aResult);
}

function getTarefas($coduser, $status){
	$sQuery = "SELECT * FROM tarefas WHERE coduser = $coduser AND status = '$status' ";
	// die($sQuery);
	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 
	$aResult = array();

	while($oResult = mysql_fetch_object($oStmt)){
		$aResult[] = $oResult;
	}

	return $aResult;
}
?>