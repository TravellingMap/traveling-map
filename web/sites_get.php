<?php
session_start();
include_once('db.php');

mysql_query ("set character_set_results='utf8'");
mysql_query ("set collation_connection='utf8_general_ci'");
mysql_query ("SET NAMES utf8");
$rows = mysql_query("SELECT *  FROM `sites` WHERE id_city=".$_GET["city_id"]);
$userrows = mysql_query("SELECT *  FROM `user_sites` WHERE id_user='".$_SESSION["id"]."' AND id_city='".$_GET['city_id']."'" );

$userresults = array();
$results = array();

while($row = mysql_fetch_array($rows)) {
    array_push($results,$row);
}
while($row = mysql_fetch_array($userrows)) {
    array_push($userresults,$row);
}

$totalresult = array('all'=> $results,'user'=> $userresults);

echo json_encode($totalresult);


?>
