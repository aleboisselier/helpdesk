<?php
use micro\orm\DAO;
class NotificationsTest extends AjaxUnitTest {


    public function testNotificationAdmin(){
        global $config;
        DAO::connect($config["database"]['dbName']);
        //Connecting Admin
        $_SESSION["user"]=DAO::getOne("User", "admin=1");
        $_SESSION['KCFINDER'] = array(
                'disabled' => false
        );
        $_SESSION['logStatus'] = 'success';

        //Inserting New Notification
        $notif = new Notification();
        $message = DAO::getOne("Message", "1=1");
        $ticket = DAO::getOne("Ticket", $message->getTicket()->getId());

        $notif->setMessage($message);
        $notif->setTicket($ticket);
        $notif->setUser(Auth::getUser());
        $notif->setIdUser(Auth::getUser()->getId());
        $notif->getIdTicket($ticket->getId());
        DAO::insert($notif);

        //Loading Index
        $this->get("Indexx/asAdmin");
        $this->wait();
        //Is the Notification Here ?
        $notifItem = $this->getElementsBySelector(".list-group-item.notif");
        $notifItem[0]->click();
        $this->wait(10);

        $this->assertPageContainsText($ticket->getTitre());

        DAO::delete($notif);

        $notifB = DAO::getOne("Notification", "idUser = ".Auth::getUser()->getId()." AND idTicket = ".$ticket->getId());
        $this->assertNull($notifB);
    }

    public function testNotificationUser(){
        global $config;
        DAO::connect($config["database"]['dbName']);
        //Connecting Admin
        $_SESSION["user"]=DAO::getOne("User", "admin=0");
        $_SESSION['KCFINDER'] = array(
                'disabled' => false
        );
        $_SESSION['logStatus'] = 'success';

        //Inserting New Notification
        $notif = new Notification();
        $message = DAO::getOne("Message", "1=1");
        $ticket = DAO::getOne("Ticket", $message->getTicket()->getId());

        $notif->setMessage($message);
        $notif->setTicket($ticket);
        $notif->setUser(Auth::getUser());
        $notif->setIdUser(Auth::getUser()->getId());
        $notif->getIdTicket($ticket->getId());
        DAO::insert($notif);

        //Loading Index
        $this->get("Indexx/asUser");
        $this->wait();
        //Is the Notification Here ?
        $notifItem = $this->getElementsBySelector(".list-group-item.notif");
        $notifItem[0]->click();
        $this->wait(10);

        $this->assertPageContainsText($ticket->getTitre());

        DAO::delete($notif);

        $notifB = DAO::getOne("Notification", "idUser = ".Auth::getUser()->getId()." AND idTicket = ".$ticket->getId());
        $this->assertNull($notifB);
    }

    public function testNoNotif(){
        global $config;
        DAO::connect($config["database"]['dbName']);

        //Loading Index
        $this->get("Indexx/asUser");
        $this->wait();
        //Is the Notification Here ?
        $notifItem = $this->getElementsBySelector(".list-group-item.notif");
        $this->assertEmpty($notifItem);
        $this->wait(10);
    }

}