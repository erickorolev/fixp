<?php

require 'db_login.php';

// Создаем подключение
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Проверяем подключение
if (!$conn) {
    die("Ошибка подключения к базе данных: " . mysqli_connect_error());
}

// Устанавливаем  кодировку подключение UTF-8
mysqli_set_charset($conn,"utf8");

// Формируем запрос на получение данных данных
$sql = "SELECT * FROM comments";
$result = mysqli_query($conn, $sql);

// Проверяем наличие данных
if (mysqli_num_rows($result) > 0) {
    // Отображаем данные

    $counter = 0;

    $style = "gray";

    while($row = mysqli_fetch_assoc($result)) {

        $counter ++;

        if ($style == "gray") {
            $style = "green";
        } else {
            $style = "gray";
        }

        if($counter == 1) {
            echo '<div class="row">';
            echo '<div class="col-md-2 col-md-offset-3">';
        } else {
            echo '<div class="col-md-2">';
        }

        echo '<div class="col-sm-12 top-buffer">';

        echo '<div class="row comment-avtor-' . $style . '">';
        echo '<p class="text-center">' . $row["name"] . '</p>';
        echo '</div>';

        echo '<div class="row comment-email-' . $style . '">';
        echo '<p class="text-center">' . $row["email"] . '</p>';
        echo '</div>';

        echo '<div class="row comment-text-' . $style . '">';
        echo '<p class="text-center">' . $row["comment"] . '</p>';
        echo '</div>';

        echo '</div>';

        echo '</div>';

        if($counter == 3) {
            echo '</div>';
            $counter = 0;

        }

    }
} else {
    echo "Нет комментариев";
}

// Отключаемся от базы данных
mysqli_close($conn);

?>