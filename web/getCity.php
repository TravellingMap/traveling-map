<?php
include_once('db.php');

// mysql_query ("set character_set_results='utf8'");
// mysql_query ("set collation_connection='utf8_general_ci'");
// mysql_query ("SET NAMES utf8");

$row = mysql_fetch_array(mysql_query("SELECT *  FROM `cities` WHERE id='".$_GET['city_id']."'"));

// $results = array();
// while($row = mysql_fetch_array($rows)) {
//     $results[] = $row;
// }
//
// echo json_encode($results);

echo json_encode($row);
?>
