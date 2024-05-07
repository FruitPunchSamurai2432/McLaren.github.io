<?php
require_once('contactwithus.php');
if(!empty(($_POST['fullname'])) && !empty(($_POST['email'])) && !empty(($_POST['comment']))) {

$stmt = $conn->prepare("select * from users where login=?");
$stmt->execute([
$_POST['login']
]);

$user = $stmt->fetch();

if ($user) {
echo "Пользователь с таким логином уже существует.";
}

else{
$stmt = $conn->prepare("insert into users(fullname,email,comment) values(?,?,?)");
$stmt->execute([
$_POST['fullname'],
$_POST['email'],
$_POST['comment'],
]);

echo "Вы успешно зарегистрировались.";

}

} 

else echo "Все поля обязательны для заполнения!";
?>