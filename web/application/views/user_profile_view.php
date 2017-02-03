<!-- <?var_dump($data)?><br>
<?var_dump($_SESSION)?><br><br>-->
<!--   <?echo "<pre>";
print_r($orders)?>  -->
<!-- <?var_dump($_GET)?> -->


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>User profile </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">
	<link rel="stylesheet" href="/web/css/style.css">
</head>

<body>
	<div class="container profile-user">
		<a href = "/" id="profile-close" class="close" ><span class="glyphicon glyphicon-remove"></span></a>
		<ul class="nav nav-pills">
			<li><a data-toggle="pill" href="#home">Профиль пользователя</a></li>
			<li><a data-toggle="pill" href="#menu1">Редактировать профиль</a></li>
			<li><a data-toggle="pill" href="#menu2">Активные заказы</a></li>
			<li><a data-toggle="pill" href="#menu3">История покупок</a></li>
		</ul><br>
		<div class="tab-content">
			<div id="home" class="tab-pane fade in active " >				
				<div class="row">               
					<div class="col-sm-6 col-md-4">
						<img src="/web/images/user_avatars/<?=$data[0]["avatar"];?>" id="profile_avatar" class="img-rounded img-responsive" />
					</div>
					<div class="col-sm-6 col-md-8 ">
						<div class="col-md-4 user_title"><h1>Email: </h1><?=$data[0]["email"];?><br></div>
						<div class="col-md-4 user_title"><h1>Имя и фамилия: </h1><?=$data[0]["name"]." ".$data[0]["sec_name"];?><br></div> 
						<div class="col-md-4 user_title"><h1>Телефон: </h1><?=$data[0]["phone"];?></div>               
					</div>
				</div>				
			</div>
			<div id="menu1" class="tab-pane fade">
				<div class="row">
					<div class="col-md-10 ">
						<form class="form-horizontal" action="/user/edit" method="POST" enctype="multipart/form-data">
							<fieldset><br>

								<div class="form-group">
									<label class="col-md-4 control-label" ></label>
									<div class="col-md-4">								
										<img src="/web/images/user_avatars/<?=$data[0]["avatar"];?>" class="img-responsive img-thumbnail ">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label profile-fonts" >Email / Логин </label>
									<div class="col-md-4">
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-envelope"></i>
											</div>
											<input value = "<?=$data[0]["email"];?>" class="form-control input-md" type="text" readonly >
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-4 control-label profile-fonts" >Фото</label>
									<div class="col-md-4">
										<input id="Upload photo" name="user_photo" class="input-file" type="file">
									</div>
								</div>
								<input type="hidden" name="user_id" value="<?=$data[0]["id"];?>">
								<input type="hidden" name="avatar" value="<?=$data[0]["avatar"];?>">
								<div class="form-group">
									<label class="col-md-4 control-label profile-fonts" >Имя</label>  
									<div class="col-md-4">
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-user"></i>
											</div>
											<input  name="user_name" type="text" placeholder="Имя" class="form-control input-md" value="<?=$data[0]["name"];?>">
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label profile-fonts" >Фамилия</label>  
									<div class="col-md-4">
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-user"></i>
											</div>
											<input  name="user_sec_name" type="text" placeholder="Фамилия" class="form-control input-md" value="<?=$data[0]["sec_name"];?>">
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label profile-fonts" >Телефон </label>  
									<div class="col-md-4">								
										<div class="input-group othertop">
											<div class="input-group-addon">
												<i class="fa fa-mobile fa-1x" style="font-size: 20px;"></i>
											</div>
											<input  name="user_phone" type="text" placeholder="Телефон " class="form-control input-md" value="<?=$data[0]["phone"];?>">
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label profile-fonts" >Старый пароль </label>  
									<div class="col-md-4">								
										<div class="input-group othertop">
											<div class="input-group-addon">
												<i class="fa fa-lock" style="font-size: 20px;"></i>
											</div>
											<input  name="old_user_password" type="password"  class="form-control input-md" placeholder="Старый пароль">
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label profile-fonts" >Новый пароль </label>  
									<div class="col-md-4">								
										<div class="input-group othertop">
											<div class="input-group-addon">
												<i class="fa fa-lock" style="font-size: 20px;"></i>
											</div>
											<input  name="new_user_password" type="password"  class="form-control input-md" placeholder="Новый пароль">
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label profile-fonts" ></label>  
									<div class="col-md-4">		
										<input type="submit" class="btn btn-success" value="Сохранить" >
									</div>
								</div>
							</fieldset>
						</form>
					</div>					
				</div>
			</div>

			<div id="menu2" class="tab-pane fade">				
				<?foreach ($orders as $key => $value) {
					if($value["status"] != "accept"){?>		  			
			  			<div class="panel panel-default">
			  				<div class="panel-heading">
			  					<h4 class="panel-title"><a href="/order/show?id=<?=$value["id"]."&"."status=".$value["status"]?>">Заказ № <?=$value["id"]." от ".$value["data"];?></a></h4>
			  				</div>		  					
			  			</div>
	  				<?}?>
	  			<?}?>
			</div> <!-- end menu-2 -->
			<div id="menu3" class="tab-pane fade">				
				<?foreach ($orders as $key => $value) {
					if($value["status"] == "accept"){?>		  			
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><a href="/order/show?id=<?=$value["id"]."&"."status=".$value["status"]?>">Заказ № <?=$value["id"]." от ".$value["data"];?></a></h4>
						</div>		  					
					</div>
					<?}?>
				<?}?>
			</div>
		</div>
	</div>
	<!-- jQuery Version 1.11.1 -->
	<script src="js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

</body>

</html>
