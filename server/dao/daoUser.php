<? 

function inputUser($aDados){

	echo 'Input User';
	echo '<pre>';
	print_r($aDados->oUser);


	$sQuery = "INSERT INTO users SET "
						."nome = '" . utf8_decode($aDados->oUser->nome) . "', "						
						."cor = '".$aDados->oUser->cor."' ";								
											
	mysql_query($sQuery) or die($sQuery . mysql_error()); 
}

?>