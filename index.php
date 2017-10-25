<!DOCTYPE HTML>  
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="ajax.js"></script>
</head>
<body>

<div class="container top-buffer">

    <div class="row">

        <div class="col-sm-4">
            <h2 class="text-center">Отчет по кормлению</h2>
        </div>

    </div>

</div>

<div class="container background-black">

	<form class="form-horizontal top-buffer" name="form" id="build_report" action="build_report.php" method="POST">

        <div class="form-group">
            <label class="control-label col-sm-2" for="period">Период:</label>
            <div class="col-sm-10">

                <label class="radio-inline">
                    <input type="radio" name="period" id="day">День
                </label>
                <label class="radio-inline">
                    <input type="radio" name="period" id="week">Неделя
                </label>
                <label class="radio-inline">
                    <input type="radio" name="period" id="month">Месяц
                </label>

            </div>
        </div>

        <div class="form-group" id="date_group">
            <label class="control-label col-sm-2" for="period">Дата:</label>
            <div class="col-sm-10">
                <label class="radio-inline">
                    <input id="date" type="date" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="student">Студент:</label>
            <div class="col-sm-10">
                <label class="checkbox-inline">
                    <input type="checkbox" id="student_1" value="Игорь">Игорь
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="student_2" value="Паша">Паша
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="animals">Животные:</label>
            <div class="col-sm-10">
                <label class="checkbox-inline">
                    <input type="checkbox" id="animals_1" value="Обезьяны">Обезьяны
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="animals_2" value="Львы">Львы
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="animals_3" value="Жирафы">Жирафы
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="food">Еда:</label>
            <div class="col-sm-10">
                <label class="checkbox-inline">
                    <input type="checkbox" id="food_1" value="Бананы">Бананы
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="food_2" value="Мясо">Мясо
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="food_3" value="Трава">Трава
                </label>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Составить</button>
            </div>
        </div>

	</form>

</div>

<div class="container top-buffer">

	<div class="row">
			<div class="col-sm-4">
				<h3 class="text-center">Кормления</h3>
			</div>
	</div>

    <div class="row">
        <div class="col-sm-2">
            <div class="row">
                <p>№</p>
            </div>
            <div class="row">
                <p>1</p>
            </div>
            <div class="row">
                <p>2</p>
            </div>
            <div class="row">
                <p>3</p>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="row">
                <p>Дата</p>
            </div>
            <div class="row">
                <p>18.10.2017</p>
            </div>
            <div class="row">
                <p>19.10.2017</p>
            </div>
            <div class="row">
                <p>20.10.2017</p>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="row">
                <p>Студент</p>
            </div>
            <div class="row">
                <p>Игорь</p>
            </div>
            <div class="row">
                <p>Игорь</p>
            </div>
            <div class="row">
                <p>Паша</p>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="row">
                <p>Животные</p>
            </div>
            <div class="row">
                <p>Львы</p>
            </div>
            <div class="row">
                <p>Львы</p>
            </div>
            <div class="row">
                <p>Обезьяны</p>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="row">
                <p>Еда</p>
            </div>
            <div class="row">
                <p>Мясо</p>
            </div>
            <div class="row">
                <p>Мясо</p>
            </div>
            <div class="row">
                <p>Бананы</p>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="row">
                <p>Количество (кг)</p>
            </div>
            <div class="row">
                <p>5</p>
            </div>
            <div class="row">
                <p>5</p>
            </div>
            <div class="row">
                <p>1</p>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-4">
            <h3 class="text-center">Всего съедено</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            <div class="row">
                <p>Еда</p>
            </div>
            <div class="row">
                <p>Мясо</p>
            </div>
            <div class="row">
                <p>Трава</p>
            </div>
            <div class="row">
                <p>Бананы</p>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="row">
                <p>Количество (кг)</p>
            </div>
            <div class="row">
                <p>9</p>
            </div>
            <div class="row">
                <p>0</p>
            </div>
            <div class="row">
                <p>12</p>
            </div>
        </div>
    </div>

</div>

<div class="container">

    <div class="row top-buffer">

        <div class="col-sm-2">
            <div id="ajax_response"> </div>
        </div>

    </div>

</div>

<div class="container background-black">

	<div class="row top-buffer">

        <div class="col-sm-4 col-sm-offset-8">
            <p>Приложение Кормление 2017</p>
        </div>

	</div>

</div>

</body>
</html>