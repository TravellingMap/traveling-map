<?php
    session_start();
   // session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (empty($email) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
       echo "Вы ввели не всю информацию, вернитесь назад и заполните все поля!";
    }
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
//удаляем лишние пробелы
    $email = trim($email);
    $password = trim($password);
// подключаемся к базе
    include ("db.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь

    $result = mysql_query("SELECT * FROM users WHERE email ='$email'");//,$conn //извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysql_fetch_array($result);

preg_match('/^([\w\.]{3,})@([\w\.]{1,}\.[\w]{1,})$/', $email, $matchemail);
if (!($matchemail)){
   echo "Вы ввели не email. Вы уверены что вы регистрировались на нашем сайте?";
   exit();
}

//preg_match('/^[a-z0-9_-]{4,16}$/',$password, $matchpass);
if (!($password)){//$matchpass
echo "Пароль может содержать латинские буквы, цифры, дефисы, подчеркивания и быть длинной от 4 до 16 символов. Вы уверены что вы регистрировались на нашем сайте?";
    exit();
}

if (empty($myrow['password'])) {
      echo "Извините, введённый вами e-mail или пароль не существует.";
} else {
    if ($myrow['password'] == md5($password)) {
       //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
               echo 'ok';
       $_SESSION['email']=$myrow['email'];
       $_SESSION['id']=$myrow['id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь

    } else {
      echo "Извините, введённый вами e-mail или пароль неверный.";
    }
}
   ?>
