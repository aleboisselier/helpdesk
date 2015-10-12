<?php
use micro\orm\DAO;
class MessageTest extends AjaxUnitTest {
    public function testMessage(){
        global $config;
        DAO::connect($config["database"]['dbName']);
        //Connecting User
        $_SESSION["user"]=DAO::getOne("User", "admin=0");
        $_SESSION['KCFINDER'] = array(
                'disabled' => false
        );
        $_SESSION['logStatus'] = 'success';

        //Loading Index
        $this->get("Indexx/asUser");
        $this->get("Tickets/index");
        $this->wait();
        //Is the FAQ Here ?
        $ticketItem = $this->getElementsBySelector(".detailTicket");
        $ticketItem = $ticketItem[0];

        $idTicket = $ticketItem->getAttribute("href");
        $idTicket = explode("/", $idTicket);
        $idTicket = $idTicket[count($idTicket)-1];

        $ticket = DAO::getOne("Ticket", $idTicket);

        $ticketItem->click();

        $input = $this->getElementBySelector(".panel-title");

        $this->assertContains($ticket->getTitre(), $input->getText());

        $messageItem = $this->getElementsBySelector(".message");
        $messageItem = $messageItem[0];
        $this->assertContains($messageItem->getText(),".contentMessages");
    }
}