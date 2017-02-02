<?
//Display errors
ini_set('display_errors', 1);
session_start();

$uri = parse_url($_SERVER['REQUEST_URI']);
$admin_uri = explode("/", $uri["path"])[1];
$ini = parse_ini_file("config/settings.ini");
// var_dump($ini);

// Добавить пустую корзину при первом входе
if(!$_COOKIE['basket']){
	$prod=[];
	$basket=serialize($prod);
	setcookie("basket",$basket,0,'/');
}

if ($_SESSION['auth'] && !$_SESSION['token']) {
 $_SESSION['token'] = password_hash('1234'.time(),PASSWORD_DEFAULT);
};

$_SESSION["lang"] = "ru";

if ($admin_uri === "admin") {
	require_once 'administrator/application/bootstrap.php'; 
}else{
	require_once 'web/application/bootstrap.php'; 
}
?>