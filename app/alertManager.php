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
	
	$notifs = DAO::getAll("Notification", "mailSent = 0");
	foreach ($notifs as $notif){
		$alert = DAO::getOne("Alert", "idUser=".$notif->getUser()->getId());
		
		$format = 'H:i';
		$date = DateTime::createFromFormat($format, json_decode($alert->getFrequence(), true)[0]['time']);
		$currDate = date_create(date('H:i'));
		echo date_diff($date, $currDate);
		
		$datetime1 = date_create('2009-10-11');
		$datetime2 = date_create('2009-10-13');
		$interval = date_diff($datetime1, $datetime2);
		echo $interval->format('%R%a days');
	}
	
	echo "\n";

	sleep(1);
}