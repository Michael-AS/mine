<?

function getTarefas(){
	$sQuery = "SELECT * FROM tarefas";
	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 
	$aResult = array();

	while($oResult = mysql_fetch_object($oStmt)){
		array_push($aResult, encodeUT8Array($oResult));
	}

	echo json_encode($aResult);
}


function getHoras(){
	$sQuery = "SELECT * FROM horas";
	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 
	$aResult = array();

	while($oResult = mysql_fetch_object($oStmt)){
		array_push($aResult, encodeUT8Array($oResult));
	}

	echo json_encode($aResult);
}

function getCustos(){
	$sQuery = "SELECT * FROM custos";
	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 
	$aResult = array();

	while($oResult = mysql_fetch_object($oStmt)){
		array_push($aResult, encodeUT8Array($oResult));
	}

	echo json_encode($aResult);
}

?>