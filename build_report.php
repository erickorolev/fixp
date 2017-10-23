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
if(!empty($_POST['student_1'])) {
    $student_1 = clean_input($_POST['student_1']);
}

if(!empty($_POST['student_2'])) {
    $student_2 = clean_input($_POST['student_2']);
}

// Формируем запрос на получение данных данных
$sql = "
SELECT
  feedings.date AS 'Дата',
  students.name AS 'Студент',
  animals.species AS 'Животное',
  food.kind AS 'Еда',
  feedings.amount AS 'Количество (кг)'
FROM
  feedings
JOIN students ON feedings.student_id = students.id
JOIN animals ON feedings.animal_id = animals.id
JOIN food ON feedings.food_id = food.id";

if (!empty($student_1)) {
    $sql.= "WHERE students.name = '$student_1'";
    if (!empty($student_2)) {
        $sql.= "AND WHERE students.name = '$student_2'";
    }
} else if (!empty($student_2)) {
    $sql .= "WHERE students.name = '$student_2'";
}

echo $student_1;
echo $student_2;

echo $sql;

$result = mysqli_query($conn, $sql);

// Проверяем наличие данных
if (mysqli_num_rows($result) > 0) {
    // Отображаем данные

    while($row = mysqli_fetch_assoc($result)) {

        echo '<pre>'; print_r($row); echo '</pre>';

        // echo $row["Дата"];
        // echo $// row["Студент"];
        // echo $row["Животное"];
        // echo $row["Еда"];
        // echo $row["Количество (кг)"];
    }
} else {
    echo "За этот период кормлений не было";
}

// Отключаемся от базы данных
mysqli_close($conn);

?>