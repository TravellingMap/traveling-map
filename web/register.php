<?php
include_once('db.php');
if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} }
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    if (isset($_POST['r_password'])) { $r_password=$_POST['r_password']; if ($r_password =='') { unset($r_password);} }

    $email = stripslashes($email);
    $email = htmlspecialchars($email);
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $r_password = stripslashes($r_password);
    $r_password = htmlspecialchars($r_password);
 //удаляем лишние пробелы
    $email = trim($email);
    $login = trim($login);
    $password = trim($password);
    $r_password = trim($r_password);
include ("db.php");
    $result = mysql_query("SELECT id FROM users WHERE login='$login'",$conn);
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['id'])) {
    echo "Извините, введённый вами логин уже зарегистрирован. Введите другой логин.";
        exit();
    }
if ($password == $r_password){
    $sql = "INSERT INTO users (email,login,password) VALUES('$email','$login','$password')";   
   }
    else {
     echo  "Повторный пароль не соответствует предыдущему." ; 
     exit();
    }

if( MYSQL_QUERY($sql) )
                                   echo "Вы успешно зарегистрированы!";
else
                                   echo "Ошибка! Вы не зарегистрированы.";
                                
?>