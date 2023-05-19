<?php
declare(strict_types=1);

#$login = $_POST["login"];
#$password = $_POST["password"];

$connection = mysqli_connect('mysql','root','root','HPM');

$login = $connection->real_escape_string($_POST["login"]);
$password = $connection->real_escape_string($_POST["password"]);
$sql = "SELECT * FROM users WHERE username = '$login' and password = '$password'";

if($result = $connection->query($sql)){
    $rowsCount = $result->num_rows;
    if($rowsCount>0){
        $row = $result->fetch_assoc();
        $user_id = $row['id'];
        $sqlGetName = "SELECT * FROM name_users WHERE user_id = $user_id";
        $result1 = $connection->query($sqlGetName);
        $row1 = $result1->fetch_assoc();
        echo "<p>Добро пожаловать" . "\n" . $row1["name"] . "! Авторизация пользователя прошла успешно!</p>";
        
        #echo "<table><tr><th>Id</th><th>Имя</th><th>Пароль</th></tr>";
        #foreach($result as $row){
        #  echo "<tr>";
        #     echo "<td>" . $row["id"] . "</td>";
        #     echo "<td>" . $row["username"] . "</td>";
        #     echo "<td>" . $row["password"] . "</td>";
        #  echo "</tr>";
        #}
        #echo "</table>";
       
    }
    else{
        echo "<p>Пользователь не найден!</p>";
        echo "<a href = 'index.html'>Назад</a>";
    }
    
    $result->free();
}

