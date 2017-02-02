<?session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="/administrator/css/style.css">
</head>
<body>
	

	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="/admin">Главная</a></li>
	      <li><a href="/admin/product/add">Добавить товары</a></li>
	      <li><a href="/admin/product/edit">Редактировать товары</a></li>
	      <li><a href="/admin/product/delete">Удалить товары</a></li>
	      <li><a href="/admin/user/appoint">Назначить менеджера / Удалить менеджера</a></li>	 		
	    </ul>
	    <ul class="nav navbar-nav navbar-right">	      
      	  <li><a href="/"><span class="glyphicon glyphicon-off"></span>  Выход</a></li>   	
    	</ul>
	  </div>
	</nav>
	<!-- <img src="../administrator/images/apple-watch.jpg" alt="Logo2-s.png"> -->
	<div class="m-content">

		<?php include 'administrator/application/views/'.$content_view; ?>
	</div>
</body>
</html>