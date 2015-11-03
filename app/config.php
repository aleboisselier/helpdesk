<?php
return array(
        "siteUrl"=>"http://127.0.0.1/helpdesk/",
        "documentRoot"=>"Indexx",
        "database"=>[
            "dbName"=>"helpdeskdoa",
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
        "test"=>false
);