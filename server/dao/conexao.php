<?
if ($_SERVER['DOCUMENT_ROOT'] == 'C:/Users/Lucas/Documents/GitHub') {
	mysql_connect('192.168.10.20','root','proxy');
} else{
	mysql_connect('localhost','root','');
}

mysql_select_db("db_sup");

include("dao.php");
include("daoTarefa.php");
include("daoUser.php");

?>