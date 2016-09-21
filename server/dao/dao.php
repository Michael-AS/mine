<?

function getBases(){
	$sQuery = "SELECT * FROM bases ORDER BY dtcadastro DESC";
	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 
	$aResult = array();

	while($oResult = mysql_fetch_object($oStmt)){
		$oResult->descricao = base64_decode($oResult->descricao);
		$oResult->keywords = base64_decode($oResult->keywords);
		array_push($aResult, encodeUT8Array($oResult));
	}

	echo json_encode($aResult);
}


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

	echo json_encode($aResult);
}

function getCustos(){
	$sQuery = "SELECT * FROM custos ORDER BY dtcadastro DESC";
	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 
	$aResult = array();

	while($oResult = mysql_fetch_object($oStmt)){		
		array_push($aResult, encodeUT8Array($oResult));
	}
	echo json_encode($aResult);
}

function getTotal($aDados){
		die(print_r($aDados));
	$sQuery = "SELECT SUM(" . $aDados->field . ") as total FROM '" . $aDados->table . "' ORDER BY dtcadastro DESC";

	die($sQuery);
	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 
	$fResult = mysql_result($oStmt, 0);

	echo json_encode($fResult);
}
?>