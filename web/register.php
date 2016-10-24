<?php
include_once('db.php');
$email=mysql_real_escape_string($_POST["email"]);
$login=mysql_real_escape_string($_POST["login"]);
$password=mysql_real_escape_string(md5 ($_POST["password"]));
$id=0;
$sql = "INSERT INTO users VALUES('$id','$email','$login','$password')";
if( MYSQL_QUERY($sql) )
                                   echo "ok";
else
                                   echo "error";
                                
?>