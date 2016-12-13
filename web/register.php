<?php

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
    $result = mysql_query("SELECT id FROM users WHERE login='$login'");//,$conn
    $myrow = mysql_fetch_array($result);

preg_match('/^([\w\.]{3,})@([\w\.]{1,}\.[\w]{1,})$/', $email, $matchemail);
if (!($matchemail)){
echo "Вы ввели не email. Пожалуйста, будьте аккуратней.";
    exit();
}

preg_match('/^[a-z0-9_-]{4,16}$/',$password, $matchpass);
if (!($matchpass)){
echo "Пароль может содержать латинские буквы, цифры, дефисы, подчеркивания и быть длинной от 4 до 16 символов.";
    exit();}

preg_match('/^[a-z0-9_-]{1,20}$/',$login, $matchlog);
if (!($matchlog)){
echo "Логин может содержать латинские буквы, цифры, дефисы, подчеркивания и быть длинной от 1 до 20 символов.";
    exit();}

if (!empty($myrow['id'])) {
    echo "Извините, введённый вами логин уже зарегистрирован. Введите другой логин.";
        exit();
    }
$result = mysql_query("SELECT id FROM users WHERE email='$email'",$conn);
    $myrow = mysql_fetch_array($result);
if (!empty($myrow['id'])) {
    echo "Извините, введённый вами email уже зарегистрирован. Введите другой email.";
        exit();
    }
if ($password == $r_password){
    $password = md5($password);
    $sql = "INSERT INTO users (email,login,password) VALUES('$email','$login','$password')";
   }
    else {
     echo  "Повторный пароль не соответствует предыдущему." ;
     exit();
    }

if( MYSQL_QUERY($sql) ){
     echo "ok";
} else {
  echo "Ошибка! Вы не зарегистрированы.";
}
?>
