<?php
session_start();
include_once('db.php');

$id_site = $_GET['id_site'];
$id_city = $_GET['id_city'];
$checked = $_GET['checked'];
$id_user = $_SESSION['id'];

if($checked == 1){

   mysql_query("INSERT INTO `user_sites`( `id_user`, `id_site`, `id_city`) VALUES ('".$id_user."','".$id_site."','".$id_city."')");

} else {

   mysql_query("DELETE FROM `user_sites` WHERE id_user='".$id_user."' AND id_site='".$id_site."' AND id_city='".$id_city."'");

}

echo !mysql_error();

?>
