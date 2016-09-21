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

	$sQuery = "SELECT * FROM tarefas WHERE coduser = " . $_SESSION['user'][0]['coduser'] . " ORDER BY dia DESC";
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
	$sQuery = "SELECT * FROM horas WHERE coduser = " . $_SESSION['user'][0]['coduser'] . " ORDER BY dtcadastro DESC";
	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 
	$aResult = array();

	while($oResult = mysql_fetch_object($oStmt)){
		array_push($aResult, encodeUT8Array($oResult));
	}

	echo json_encode($aResult);
}

function getCustos(){
	$sQuery = "SELECT * FROM custos WHERE coduser = " . $_SESSION['user'][0]['coduser'] . " ORDER BY dtcadastro DESC";
	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 
	$aResult = array();

	while($oResult = mysql_fetch_object($oStmt)){		
		array_push($aResult, encodeUT8Array($oResult));
	}
	echo json_encode($aResult);
}

function getTotal($aDados){		
	$sQuery = "SELECT ROUND(SUM(" . $aDados->oDados->field . "),2) as total FROM " . $aDados->oDados->table . " ORDER BY dtcadastro DESC";

	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 
	$fResult = mysql_result($oStmt, 0);

	echo $fResult;
}
?>