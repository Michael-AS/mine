<?
include("conexao.php");

$postdata = file_get_contents("php://input");
$aDados = json_decode($postdata);


$p = $_GET['p'];
$q = empty($_GET['q']) ? $q = '' : $q = $_GET['q'];

// if(empty($_GET['q'])){
// 	$q = '';
// } else {
// 	$q = $_GET['q'];
// }

// echo "<pre>"; print_r($aDados); die();
// echo "<pre>"; print_r($aDados); die();

call_user_func($p, $aDados);

?>