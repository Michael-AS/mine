<?

function getTarefas(){
	$sQuery = "SELECT * FROM tarefas ORDER BY dia DESC";
	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 
	$aResult = array();

	while($oResult = mysql_fetch_object($oStmt)){
		$oResult->total = mysql_num_rows($oStmt);
		$aux = explode('-', $oResult->dia);
		$oResult->dia = $aux[2] . '/' . $aux[1] . '/' . $aux[0];   
		array_push($aResult, encodeUT8Array($oResult));
	}

	echo json_encode($aResult);
}


function getHoras(){
	$sQuery = "SELECT * FROM horas ORDER BY dtcadastro DESC";
	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 
	$aResult = array();

	while($oResult = mysql_fetch_object($oStmt)){
		array_push($aResult, encodeUT8Array($oResult));
	}

	$aResult['total'] = getTotal('horas', 'horas');
	echo json_encode($aResult);
}

function getCustos(){
	$sQuery = "SELECT * FROM custos ORDER BY dtcadastro DESC";
	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 
	$aResult = array();

	while($oResult = mysql_fetch_object($oStmt)){		
		array_push($aResult, encodeUT8Array($oResult));
	}

	$aResult['total'] = getTotal('valor', 'custos');
	echo json_encode($aResult);
}

function getTotal($field, $table){
	$sQuery = "SELECT SUM($field) as total FROM $table ORDER BY dtcadastro DESC";
	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 
	$fResult = mysql_result($oStmt, 0);

	return $fResult;
}
?>