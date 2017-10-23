<?php

require 'db_login.php';

// Функция для преобразования введенных пользователем данных в целях безопасности и избавления от сторонних элементов.
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Создаем подключение
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Проверяем подключение
if (!$conn) {
    die("Ошибка подключения к базе данных: " . mysqli_connect_error());
}

// Устанавливаем  кодировку подключение UTF-8
mysqli_set_charset($conn,"utf8");

// Подготавливаем данные для формирования SQL запросов
$name = clean_input($_POST['name']);
$email = clean_input($_POST['email']);
$comment = clean_input($_POST['comment']);

// Формируем запрос на получение данных данных
$sql = "SELECT * FROM feedings";

$result = mysqli_query($conn, $sql);

// Проверяем наличие данных
if (mysqli_num_rows($result) > 0) {
    // Отображаем данные

    while($row = mysqli_fetch_assoc($result)) {

        echo $row["date"];

        echo $row["student_id"];

        echo $row["animal_id"];

        echo $row["food_id"];

        echo $row["amount"];

    }
} else {
    echo "За этот период кормлений не было";
}

// Отключаемся от базы данных
mysqli_close($conn);

?>