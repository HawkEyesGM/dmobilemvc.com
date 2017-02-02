<?
require_once "config/config.php";
require_once "core/db.php";
$db = new Db();

// подключаем файлы ядра

require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
require_once 'lib/lib.php';
require_once 'lib/validation.php';

Route::start($db); // запускаем маршрутизатор
?>