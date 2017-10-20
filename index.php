<!DOCTYPE HTML>  
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="add_get_comments_ajax.js"></script>
</head>
<body>

<div class="container top-buffer">

    <div class="row">

        <div class="col-sm-4 col-sm-offset-4">
            <h2 class="text-center">Отчет по кормлению</h2>
        </div>

    </div>

</div>

<div class="container background-black">

	<form class="form-horizontal col-sm-offset-4" name="form" id="add_comment" action="insert_comment.php" method="POST">


        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Период:</label>
            <div class="col-sm-10">
                <label class="checkbox-inline">
                    <input type="checkbox" value="">День
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" value="">Неделя
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" value="">Месяц
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Студент:</label>
            <div class="col-sm-10">
                <label class="checkbox-inline">
                    <input type="checkbox" value="">Игорь
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" value="">Паша
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Животные:</label>
            <div class="col-sm-10">
                <label class="checkbox-inline">
                    <input type="checkbox" value="">Обезьяны
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" value="">Львы
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" value="">Жирафы
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Еда:</label>
            <div class="col-sm-10">
                <label class="checkbox-inline">
                    <input type="checkbox" value="">Бананы
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" value="">Мясо
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" value="">Трава
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
			<div class="col-sm-4 col-sm-offset-4">
				<h3 class="text-center">Кормления</h3>
			</div>
	</div>
	
		
	<div id="ajax_response"> </div>
		
</div>

<div class="container background-black top-buffer">

	<div class="row">

        <p>Приложение Кормление. 2017</p>
		
	</div>

</div>

</body>
</html>