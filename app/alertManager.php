<?php
use micro\controllers\Startup;
use micro\controllers\Autoloader;
use micro\orm\DAO;
error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__).DS."app".DS.'..'.DS);
$config=include_once ROOT.DS.'config.php';
require_once ROOT.'micro/log/Logger.php';
require_once ROOT.'micro/controllers/Autoloader.php';
require_once ROOT.'./../vendor/autoload.php';

Autoloader::register();

extract($config["database"]);
$db=$config["database"];
DAO::connect($db["dbName"],@$db["serverName"],@$db["port"],@$db["user"],@$db["password"]);


//SENDING LOOP
while (true) {
	$users = DAO::getAll("User", 'idAuthProvider > 0');
	foreach ($users as $user) {
		echo $user->getLogin();
		echo "\n";
	}
	echo "\n";

	sleep(2);
}