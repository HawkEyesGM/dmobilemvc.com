<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/administrator/css/style.css">
</head>
<body id="reg_body">	
	<div class="container container-reg">
		<a href = "/" type="button" class="close" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></a>		
		<form class="well form-horizontal" action="/user/registr" method="POST"  id="contact_form" enctype="multipart/form-data">
			<fieldset>
				<h1 class="reg">Форма регистрации</h1><br>				
				<div class="form-group">
					<label class="col-md-4 control-label">Логин / E-Mail</label>  
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							<input name="email" placeholder="E-Mail Address" class="form-control reg"  type="text" pattern="([a-z-0-9]+\.)*[a-z-0-9]+@[a-z0-9-]+(\.[a-z0-9-]+)*\.[a-z]{2,6}" required id="email"> </div>
							<b id="content_form"></b>
						</div>												 
					</div>
				

				<script>
					$('#email').blur(function(){
						var email = $('#email').val();
						$.ajax({
							url: "/user/checkEmailAjax?email="+email,
							type: "GET",							
							success: function(html){
								$('#content_form').html(html);								
							}
						});
					});					
				</script>

				<div class="form-group">
					<label class="col-md-4 control-label">Пароль</label>  
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input  name="password" placeholder="Password" class="form-control reg"  type="password" required>
							<input type="hidden" name="token" value="<?=$_SESSION['token']?>">
						</div>
					</div>
				</div><br>

				<div class="form-group">
					<label class="col-md-4 control-label">Фамилия</label>  
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input  name="last_name" placeholder="Last name" class="form-control reg"  type="text" required>							
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Имя</label>  
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input  name="first_name" placeholder="First name" class="form-control reg"  type="text" required>							
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Телефон</label>  
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input  name="phone" placeholder="Mobile phone" class="form-control reg"  type="tel" pattern ="[0-9]{1,20}">							
						</div>
					</div>
				</div><br>
				
				<!-- Button -->
				<div class="form-group">
					<label class="col-md-4 control-label"></label>
					<div class="col-md-4">						
						<input type="submit" class="btn btn-success" name="registr" value="Зарегистрироваться">
					</div>
				</div>

			</fieldset>
		</form>
	</div>
</div><!-- /.container -->
</body>
</html>



