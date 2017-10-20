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

<div class="container background-black">

<div class="row">

		<div class="col-sm-2 col-sm-offset-2 col-md-offset-3">
			<p><img src="images/logo_big.png" alt="Honey Hunters logo"></p>
		</div>
		
		
</div>

<div class="row">
		
		<div class="col-xs-12">
			<p align="center"><img src="images/contact_icon.png" alt="Honey Hunters logo"></p>
		</div>
		
</div>

	<form name="form" id="add_comment" action="insert_comment.php" method="POST">

		<div class="row">
			
			<div class="col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-3">

				<div class="form-group required">
					<label for="name" class='control-label'>Имя</label>
					<input type="text" class="form-control" id="name" required="required">
				</div>

				<div class="form-group required">
					<label for="email" class='control-label'>E-mail</label>
					<input type="email" class="form-control" id="email" required="required">
				</div>
		
			</div>
		
			<div class="form-group required">
				<div class="col-sm-4 col-md-3">
					<label for="comment" class='control-label'>Комментарий</label>
					<textarea class="form-control" rows="5" id="comment" required="required"></textarea>
				</div>
			</div>
		
		</div>

		<div class="row top-buffer bottom-buffer">
			<div class="col-sm-1 col-sm-offset-8">
				<button type="submit" id="write" class="btn btn-default button">Записать</button>
			</div>
		</div>

	</form>

</div>

<div class="container top-buffer">

	<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<h4 class="text-center">Выводим комментарии</h4>
			</div>
	</div>
	
		
	<div id="ajax_response"> </div>
		
</div>

<div class="container background-black top-buffer">

	<div class="row">

		<div class="col-xs-3 col-sm-offset-2 col-md-offset-3">
			<p><img src="images/logo_small.png" alt="Honey Hunters logo"></p>
		</div>
		
		<div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-2 col-md-5 col-md-offset-1">
			<img src="images/vk_icon.png" alt="Vkontake icon">
			<img src="images/facebook_icon.png" alt="Facebook icon">
		</div>
		
	</div>

</div>

</body>
</html>