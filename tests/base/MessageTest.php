<?php/*
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
        //Is the Ticket Here ?

        ///////TEST IF TICKET LOADED, WAS THE SELECTED TICKET////////
        $ticketItem = $this->getElementsBySelector(".detailTicket");
        $ticketItem = $ticketItem[0];

        $idTicket = $ticketItem->getAttribute("href");
        $idTicket = explode("/", $idTicket);
        $idTicket = $idTicket[count($idTicket)-1];

        $ticket = DAO::getOne("Ticket", $idTicket);

        $ticketItem->click();

        $input = $this->getElementBySelector(".panel-title");
        //Test if titles are egual
        $this->assertContains($ticket->getTitre(), $input->getText());
        
        ///////TEST IF THE MESSAGE LOADED, ARE MESSAGES ASSOCIATED TO TICKET////////
        //recovers message of the page
        $messageItem = $this->getElementsBySelector(".message");
        //recovrers the first message
        $messageItem = $messageItem[0];
        //recovers id of the message
        $idMessage = $messageItem->getAttribute("id");

        //recovers the messages of the BDD associated to selected ticket
        $messageTicket=DAO::getOneToMany($ticket,"messages");
        //recovers the id of the first message
        $message=$messageTicket[0]->getId();
        //test if good messages recovered
        //test the equality of ids
        $this->assertEquals($message,$idMessage);
    }
}*/