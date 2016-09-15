<? 

function userAuth($aDados){

	$sQuery = "SELECT * FROM users WHERE email = '" . $aDados->oUser->email . "'";
	$aResult = array();

	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 

	if (mysql_num_rows($oStmt)) {
		$oResult = mysql_fetch_object($oStmt);
		if ($oResult->password == $aDados->oUser->password) {

			$_SESSION['user'] = loadUser($oResult->email);

			echo json_encode($_SESSION['user']);
		}		
	}
}

function loadUser($email){
	$sQuery = "SELECT *, UPPER(LEFT(email, 1)) as inicial, coduser, email FROM users WHERE email = '$email' ";
	$oStmt = mysql_query($sQuery) or die($sQuery . mysql_error()); 
	$aUser = array();

	while($oResult = mysql_fetch_object($oStmt)){
		array_push($aUser, (array)$oResult);
	}

	return $aUser;
}

function verificaUserSession(){
	if (isset($_SESSION['user'])) {
		echo json_encode($_SESSION['user']);
	} else { 
		echo 'false'; 
	}
}


?>