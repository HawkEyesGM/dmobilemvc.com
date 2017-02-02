<?

class Route
{

	static function start($db)
	{
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';		

		$uri = parse_url($_SERVER['REQUEST_URI']);
		$routes = explode('/', $uri["path"]);		
		// получаем имя контроллера .  0-/  1-admin 2-product 3-add
		if ( !empty($routes[2]) ) {	
			$controller_name = $routes[2];
		}
		
		// получаем имя экшена
		if ( !empty($routes[3]) ) {
			$action_name = $routes[3];
		}


		if (!$_SESSION["auth"] && $controller_name != "user" && $action_name != "auth") {
			
			$host = 'http://'.$_SERVER['HTTP_HOST'].'/';	      
			header('Location:'.$host.'admin/user/auth');			
		}

		// TODO плюс если запрос  не профиль, то отшить
		if ($_SESSION["auth"] && $_SESSION["role"] != '10') {			
			Route::ErrorPage404();
			die();
		}

		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		
		 // echo "Model: $model_name <br>";
		 // echo "Controller: $controller_name <br>";
		 // echo "Action: $action_name <br>";
		

		// подцепляем файл с классом модели (файла модели может и не быть)

		$model_file = strtolower($model_name).'.php';
		$model_path = "administrator/application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "administrator/application/models/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "administrator/application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "administrator/application/controllers/".$controller_file;
		}
		else
		{
			/*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаем редирект на страницу 404
			*/

			 // Route::ErrorPage404();
		}
		
		// создаем контроллер
		$controller = new $controller_name($db);
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action();
		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
			 // Route::ErrorPage404();
		}
	}

	function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
    
}
