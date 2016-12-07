<?php
include_once('db.php');

mysql_query ("set character_set_results='utf8'");
mysql_query ("set collation_connection='utf8_general_ci'");
mysql_query ("SET NAMES utf8");
$rows = mysql_query("SELECT *  FROM `sites` WHERE id_city=" . $_GET["city_id"]);

$results = array();
while($row = mysql_fetch_array($rows)) {
    $results[] = $row;
}


echo json_encode($results);

?>

