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
		
		if($alert->getEnabled()){
			
			$freq = json_decode($alert->getFrequence(), true);
			
			//Converting my days to PHP days values
			$freqC = array();
			foreach ($freq as $f){
				if(intval($f['day']) == 6){
					array_push($freqC, array("day"=>0, "time"=>$f["time"]));
				}else{
					array_push($freqC, array("day"=>intval($f["day"])+1, "time"=>$f["time"]));
				}
			}
			
			$mails = array();
			
			$today = getdate()["wday"];
			foreach ($freqC as $f){
				if (($today == $f['day'] && time() >= strtotime($f["time"]) )|| $alert->getInstant()){
					$message = '<a href="'.$config['siteUrl'].'Tickets/frm/'.$notif->getTicket()->getId().'#'.$notif->getMessage()->getId().'" class="list-group-item notif">'.$notif.'</a>';
					if (!array_key_exists($notif->getUser()->getId(), $mails))
						array_push($mails, $notif->getUser()->getId());
					array_push($mails[$notif->getUser()->getId()], $message);
				}
			}
			print_r($mails);
		}
	}
	
	sleep(10);
}
/*
require_once ROOT.'../vendor\phpmailer\phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
	
$mail->Host = $config['mails']['smtp'];
$mail->Port = $config['mails']['port'];
	
$mail->SMTPSecure = $config['mails']['secure'];
$mail->SMTPAuth = $config['mails']['smtpAuth'];
$mail->Username = $config['mails']['username'];
$mail->Password = $config['mails']['password'];
	
$mail->setFrom('no-reply@helpdesk.com', 'Centre de Notifications HelpDesk');
$mail->addAddress($to);
$mail->Subject = 'Nouvelle(s) Notification(s)';
$mail->CharSet = 'UTF-8';
$mail->msgHTML($message, dirname(__FILE__));
	
$mail->send();
	
$notif->setMailSent(1);
DAO::update($notif);