<?php

// Файл с реквизитами подключения к базе
require 'config.php';

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

if(!empty($_POST['animals_1'])) {
    $animals_1 = clean_input($_POST['animals_1']);
}

if(!empty($_POST['animals_2'])) {
    $animals_2 = clean_input($_POST['animals_2']);
}

if(!empty($_POST['animals_3'])) {
    $animals_3 = clean_input($_POST['animals_3']);
}

if(!empty($_POST['food_1'])) {
    $food_1 = clean_input($_POST['food_1']);
}

if(!empty($_POST['food_2'])) {
    $food_2 = clean_input($_POST['food_2']);
}

if(!empty($_POST['food_3'])) {
    $food_3 = clean_input($_POST['food_3']);
}

if(!empty($_POST['period'])) {
    $period = clean_input($_POST['period']);
}

// Шаблон запроса, который далее будет дополняться в зависимости от выбора пользователя
$sql = "
SELECT
  DATE_FORMAT(feedings.date, '%d.%m.%Y') AS 'Дата',
  students.name AS 'Студент',
  animals.species AS 'Животное',
  food.kind AS 'Еда',
  feedings.amount AS 'Количество (кг)'
FROM
  feedings
JOIN students ON feedings.student_id = students.id
JOIN animals ON feedings.animal_id = animals.id
JOIN food ON feedings.food_id = food.id
WHERE feedings.amount > 0";

// Далее идут дополнения к запросу, в зависимости от выбора пользователя

// Добавляем к запросу условия по имени студентов
if (!empty($_POST['student_1'])) {
    if (!empty($_POST['student_2'])) {
        $sql.= " AND (students.name = '$student_1' OR students.name = '$student_2')";
    } else {
        $sql.= " AND students.name = '$student_1'";
    }
} else if (!empty($_POST['student_2'])) {
    $sql .= " AND students.name = '$student_2'";
}

// Добавляем к запросу условия по виду животных
if (!empty($_POST['animals_1'])) {
    if (!empty($_POST['animals_2'])) {
        if (!empty($_POST['animals_3'])) {
            $sql .= " AND (animals.species = '$animals_1' OR animals.species = '$animals_2' OR animals.species = '$animals_3')";
        } else {
            $sql .= " AND (animals.species = '$animals_1' OR animals.species = '$animals_2')";
        }
    } else if (!empty($_POST['animals_3'])) {
        $sql .= " AND (animals.species = '$animals_1' OR animals.species = '$animals_3')";
    } else {
        $sql .= " AND animals.species = '$animals_1'";
    }
} else if (!empty($_POST['animals_2'])) {
    if (!empty($_POST['animals_3'])) {
        $sql .= " AND (animals.species = '$animals_2' OR animals.species = '$animals_3')";
    } else {
        $sql .= " AND animals.species = '$animals_2'";
    }
} else if (!empty($_POST['animals_3'])) {
    $sql .= " AND animals.species = '$animals_3'";
}

// Добавляем к запросу условия по видам еды
if (!empty($_POST['food_1'])) {
    if (!empty($_POST['food_2'])) {
        if (!empty($_POST['food_3'])) {
            $sql .= " AND (food.kind = '$food_1' OR food.kind = '$food_2' OR food.kind = '$food_3')";
        } else {
            $sql .= " AND (food.kind = '$food_1' OR food.kind = '$food_2')";
        }
    } else if (!empty($_POST['food_3'])) {
        $sql .= " AND (food.kind = '$food_1' OR food.kind = '$food_3')";
    } else {
        $sql .= " AND food.kind = '$food_1'";
    }
} else if (!empty($_POST['food_2'])) {
    if (!empty($_POST['food_3'])) {
        $sql .= " AND (food.kind = '$food_2' OR food.kind = '$food_3')";
    } else {
        $sql .= " AND food.kind = '$food_2'";
    }
} else if (!empty($_POST['food_3'])) {
    $sql .= " AND food.kind = '$food_3'";
}

// Добавляем к запросу условия временного периода или даты
if(!empty($_POST['period'])) {
    if ($period == "month") {
        $month = (strtotime("-1 month"));
        $date = date("Y-m-d", $month);
        $sql .= " AND feedings.date > '$date'";
    } else if ($period == "week") {
        $week = (strtotime("-1 week"));
        $date = date("Y-m-d", $week);
        $sql .= " AND feedings.date > '$date'";
    } else {
        $date = $period;
        $sql .= " AND feedings.date = '$date'";
    }

}

// Отправляем запрос базе данных и получаем ответ
$result = mysqli_query($conn, $sql);

// Вводим переменные, куда будем считать количество видов еды для раздела "всего съедено"
$sum_meat = 0;
$sum_bananas = 0;
$sum_grass = 0;

// Проверяем, существуют ли данные по введенным пользователем условиям
if (mysqli_num_rows($result) > 0) {

    // Выводим шапку с названием столбцов
    echo '<div class="row">';
    echo '<div class="col-sm-2">';
    echo '<p>№</p>';
    echo '</div>';
    echo '<div class="col-sm-2">';
    echo '<p>Дата</p>';
    echo '</div>';
    echo '<div class="col-sm-2">';
    echo '<p>Студент</p>';
    echo '</div>';
    echo '<div class="col-sm-2">';
    echo '<p>Животные</p>';
    echo '</div>';
    echo '<div class="col-sm-2">';
    echo '<p>Еда</p>';
    echo '</div>';
    echo '<div class="col-sm-2">';
    echo '<p>Количество (кг)</p>';
    echo '</div>';
    echo '</div>';

    // Вводим переменную для подсчета количества строк отчета
    $num_row = 0;

    while($row = mysqli_fetch_assoc($result)) {

        $num_row++;

        echo '<div class="row">';
        echo '<div class="col-sm-2">';
        echo '<p>' . $num_row . '</p>';
        echo '</div>';
        echo '<div class="col-sm-2">';
        echo '<p>' . $row["Дата"] . '</p>';
        echo '</div>';
        echo '<div class="col-sm-2">';
        echo '<p>' . $row["Студент"] . '</p>';
        echo '</div>';
        echo '<div class="col-sm-2">';
        echo '<p>' . $row["Животное"] . '</p>';
        echo '</div>';
        echo '<div class="col-sm-2">';
        echo '<p>' . $row["Еда"] . '</p>';
        echo '</div>';
        echo '<div class="col-sm-2">';
        echo '<p>' . $row["Количество (кг)"] . '</p>';
        echo '</div>';
        echo '</div>';

        // Узнаем, какой вид еды выведен в этой итерации цикла и прибавляем его количество в свою переменную
        if($row["Еда"] == "мясо") {
            $sum_meat += $row["Количество (кг)"];
        } else if ($row["Еда"] == "бананы") {
            $sum_bananas += $row["Количество (кг)"];
        } else if($row["Еда"] == "трава") {
            $sum_grass += $row["Количество (кг)"];
        }

    }
} else {
    echo "C указанными условиями кормлений не было";
}

// Отключаемся от базы данных
mysqli_close($conn);

// Выводим раздел "Всего съедено", в который вставляем результат подсчета по типам еды
echo '<div class="row">';
echo '<div class="col-sm-4">';
echo '<h3>Всего съедено</h3>';
echo '</div>';
echo '</div>';
echo '<div class="row">';
echo '<div class="col-sm-2">';
echo '<p>Еда</p>';
echo '</div>';
echo '<div class="col-sm-2">';
echo '<p>Количество (кг)</p>';
echo '</div>';
echo '</div>';
echo '<div class="row">';
echo '<div class="col-sm-2">';
echo '<p>Мясо</p>';
echo '</div>';
echo '<div class="col-sm-2">';
echo '<p>' . $sum_meat . '</p>';
echo '</div>';
echo '</div>';
echo '<div class="row">';
echo '<div class="col-sm-2">';
echo '<p>Бананы</p>';
echo '</div>';
echo '<div class="col-sm-2">';
echo '<p>' . $sum_bananas . '</p>';
echo '</div>';
echo '</div>';
echo '<div class="row">';
echo '<div class="col-sm-2">';
echo '<p>Трава</p>';
echo '</div>';
echo '<div class="col-sm-2">';
echo '<p>' . $sum_grass . '</p>';
echo '</div>';
echo '</div>';

?>