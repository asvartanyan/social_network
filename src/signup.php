<?php
declare(strict_types=1);

$connection = mysqli_connect('mysql','root','root','HPM');

$login = $connection->real_escape_string($_POST["login"]);
$password = $connection->real_escape_string($_POST["password"]);
$family = $_POST["family"];
$name = $_POST["name"];

$sql = "INSERT INTO users(username,password) VALUES ('$login','$password');";
$connection->query($sql);
$sql1 = "SELECT id FROM users WHERE username = '$login';";
$res = $connection->query($sql1);
$row = $res->fetch_assoc();
$user_id = $row['id'];

$sql = "INSERT INTO name_users(user_id,family,name) VALUES ('$user_id','$family','$name');";
$connection->query($sql);

echo "<p>Пользователь добавлен!</p>";
echo "<a href = 'index.html'>Назад</a>";
