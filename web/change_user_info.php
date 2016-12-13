<?php
session_start();
include_once('db.php');

$user_name = $_POST['userName'];
$user_last_name = $_POST['userLastName'];
$birth = $_POST['birthDate'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$id_user = $_SESSION['id'];

$target_dir = "images/user_avatars/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$uploadOk = 1;
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if($uploadOk == 1){
   move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
}

mysql_query("UPDATE `users` SET `email`='".$email."',`phone`='".$phone."', `user_avatar`='".$target_file."',`date_birth`='".$birth."',`user_firstName`='".$user_name."',`user_lastName`='".$user_last_name."' WHERE id=".$id_user."");

if(!mysql_error()){
   $_SESSION['email'] = $email;
}

header("Location: profile.php");

echo !mysql_error();

?>
