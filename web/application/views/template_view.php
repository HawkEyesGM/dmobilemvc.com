<!--   <?var_dump(($_SESSION));?><br> --> 
<!--  <?var_dump(($_COOKIE["basket"]));?><br> -->
<!-- <? var_dump(unserialize($_COOKIE["basket"]));?> -->
<?
if($_SESSION['lang']){
	include_once 'config/language/lang.php';
};
?>

<!DOCTYPE html>
<html>
<head>
	<title>&#10026 DMobile &#10026</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="web/js/script.js"></script>
	<link rel="stylesheet" href="web/font-awesome/css/font-awesome.min.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="web/css/style.css">
			
</head>
<body>
	<div class ="main_background">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="/">DMobile <i class="fa fa-mobile" aria-hidden="true"></i></a>					
				</div>				

				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>            
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">

						<li ><a href="/"><?=$language['home'];?></a></li>
						<li><a href="/about"><?=$language['about'];?></a></li>
						<li><a href="/contacts"><?=$language['contacts'];?></a></li>
						<li><a href="/delivery"><?=$language['delivery'];?></a></li>
						<li><a href="/answers"><?=$language['q&a'];?></a></li>
					</ul>
					<form class="navbar-form navbar-left">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit">
									<i class="glyphicon glyphicon-search"></i>
								</button>
							</div>
						</div>
					</form>                
				</ul>
				<!-- <li></li> -->
				

				<ul class="nav navbar-nav navbar-right">

					<li><a href="/basket" class="dropdown-toggle login" ><span class="glyphicon glyphicon-shopping-cart"></span>
						<?$uBasket = unserialize($_COOKIE["basket"]);        
						if((count($uBasket) != 0)&&($uBasket)){?>						
						<?=count($uBasket);?>						
						<?}?>
					</a></li>

					<li class="dropdown-lang">
						<a href="#"  data-toggle="dropdown"><b><?=$language['language'];?></b> <span class="caret"></span></a>
						<ul id="lang" class="dropdown-menu " >
							<li ><a href="/main/lang_uk" ><img src="web/images/static_img/uk.png" alt="" width="30px"></a></li>
							<li ><a href="/main/lang_ua" ><img src="web/images/static_img/ua.png" alt="" width="30px"></a></li>
							<li ><a href="/main/lang_ru" ><img src="web/images/static_img/ru.png" alt="" width="30px"></a></li>
						</ul>
					</li>
				
					

					<?if ($_SESSION['auth']){?>
				
					<ul class="nav navbar-nav navbar-right">
						  <li><a href="/user/profile"><?=$_SESSION['name'];?></a></li>      
						<li><a href="/user/exit"><span class="glyphicon glyphicon-log-out"></span></a></li>   	
					</ul>				
					
					<?}else{?>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle login" data-toggle="dropdown"><i class="glyphicon glyphicon-user"> </i><b>  <?=$language['login'];?></b> <span class="caret"></span></a>
						<ul id="login-dp" class="dropdown-menu">
							<li>
								<div class="row">
									<div class="col-md-12">
										<?=$language['loginIn'];?> <br><br>
										<!-- social network -->
										<script src="//ulogin.ru/js/ulogin.js"></script>
										<div id="uLogin" data-ulogin="display=panel;theme=classic;fields=first_name,last_name;providers=vkontakte,odnoklassniki,mailru,facebook;hidden=;redirect_uri=http%3A%2F%2Fdmobilemvc.com%2Fuser%2Ffacebook;mobilebuttons=0;"></div>						
										
										<?=$language['or'];?>
										<form class="form" role="form" method="post" action="/user/auth" accept-charset="UTF-8" id="login-nav">
											<div class="form-group">
												<label class="sr-only" for="exampleInputEmail2">Email address</label>
												<input type="email" name="login_auth" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
											</div>
											<div class="form-group">
												<label class="sr-only" for="exampleInputPassword2">Password</label>
												<input type="password" name="password_auth"  class="form-control" id="exampleInputPassword2" placeholder="Password" required>
												<input type="hidden" name="token" value="<?=$_SESSION['token']?>">

											</div>
											<div class="form-group">
												<input type="submit" name ="auth"  value = "<?=$language['enter'];?>" class="btn btn-primary btn-block">
											</div>
											<div class="">
												<a href="/user/registr"><?=$language['registration'];?></a>												
											</div><br>
										</form>
									</div>                                
								</div>
							</li>
						</ul>
					</li>
					<?}?>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
			<div class="container-fluid">
				<div class="menu2">
					<center>
						<a href="/catalogue" ><?=$language['catalogue'];?></a>
						<a href="/?route=catalogue&brand=apple">Apple</a>
						<a href="/?route=catalogue&brand=samsung" >Samsung</a>
						<a href="/?route=catalogue&brand=lenovo">Lenovo</a>
						<a href="/?route=catalogue&brand=htc">HTC</a>
						<a href="/?route=catalogue&brand=xiaomi">Xiaomi</a>
						<a href="/?route=catalogue&brand=sony">Sony</a>
						<a href="/?route=catalogue&brand=asus">Asus</a>
						<a href="/?route=catalogue&brand=meizu">Meizu</a>
						<a href="/?route=catalogue&brand=huawei">Huawei</a>
						<a href="/?route=catalogue&brand=microsoft">Microsoft</a>
						<a href="/?route=catalogue&brand=motorolla">Motorolla</a>
						<a href="/?route=catalogue&brand=headphones"><?=$language['headphones'];?></a>
						<a href="/?route=catalogue&brand=protection"><?=$language['cases&protection'];?></a>
						<?
						if($_SESSION["role"] == 10){?>
						<a href="/admin">Admin</a>.
						<?}?>
						<?
						if(($_SESSION["role"] == 30)||($_SESSION["role"] == 10)){?>
						<a href="/admin/orders"><?=$language['orders'];?></a>
						<?}?>
					</center>
				</div>
				

			</div>

		</div>
	</nav>

		
		<div class="m-content">	
			<?php include 'web/application/views/'.$content_view; ?>
		</div>
	

</div>
</body>
</html>