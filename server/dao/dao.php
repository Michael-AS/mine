<?

function getUsers(){

	$sQuery = "SELECT * FROM users";
	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 
	$aResult = array();

	while($oResult = mysql_fetch_object($oStmt)){
		array_push($aResult, (array)$oResult);
	}
	
	echo json_encode($aResult);
}
?>