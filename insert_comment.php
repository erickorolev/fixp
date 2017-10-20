<?php
require 'db_login.php';

// Создаем подключение
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Проверяем подключение
if (!$conn) {
	die("Ошибка подключения к базе данных: " . mysqli_connect_error());
}

// Подготавливаем данные для формирования SQL запросов
$name = clean_input($_POST['name']);
$email = clean_input($_POST['email']);
$comment = clean_input($_POST['comment']);

// Устанавливаем  кодировку подключение UTF-8
mysqli_set_charset($conn,"utf8");

// Формируем запрос на запись данных
$sql = "INSERT INTO comments (name, email, comment)
VALUES ('$name', '$email', '$comment')";

// Отправляем запрос серверу и проверяем ответ
if (mysqli_query($conn, $sql)) {
	echo "Новая запись создана";
} else {
	echo "Ошибка при отправке запроса: " . $sql . "<br>" . mysqli_error($conn);
}

// Отключаемся от базы данных
mysqli_close($conn);

// Функция для преобразования введенных пользователем данных в целях безопасности и избавления от сторонних элементов.
function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>