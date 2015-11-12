<?php
use micro\orm\DAO;

return array(
        "siteUrl"=>"http://127.0.0.1/helpdesk/",
        "documentRoot"=>"Indexx",
        "database"=>[
            "dbName"=>"helpdesk",
            "serverName"=>"127.0.0.1",
            "port"=>"3306",
            "user"=>"root",
            "password"=>""
        ],
        "directories"=>["my","tests"],
        "mails"=>[
            "smtp"=> "smtp.gmail.com",
            "smtpAuth" => true,
            "username"=> "gmailID@gmail.com",
            "password"=> "GmailPassword",
            "port" => 587,
            "secure"=>"tls"
        ],
        "cookies"=>[
        	"user"=>[
        		"lifetime"=>time()+60*60*24*7
        	]
        ],
        "test"=>false,
		"onStartup"=>function($action){
			if(!Auth::isAuth() && $action[0]!=="UserAuth" && @$action[1]!=="disconnect"){
				if(array_key_exists("autoConnect", $_COOKIE)){
					$_SESSION["action"]=$action;
					$ctrl=new UserAuth();
					$ctrl->initialize();
					$ctrl->signin_with_hybridauth(array($_COOKIE["autoConnect"]));
					$ctrl->finalize();
					die();
				}else if(array_key_exists("user", $_COOKIE)){
					$user = DAO::getOne("User", $_COOKIE['user']);
					$_SESSION["user"] = $user;
					$_SESSION['KCFINDER'] = array(
							'disabled' => true
					);
					$_SESSION['logStatus'] = 'success';
				}
			}
			
		},
		"templateEngine"=>'micro\views\engine\Twig',
);