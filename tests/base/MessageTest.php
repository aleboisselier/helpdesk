<?php
use micro\orm\DAO;
class FaqsTest extends AjaxUnitTest {
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
        $this->get("Ticket/index");
        $this->wait();
        //Is the FAQ Here ?
        $ticketItem = $this->getElementsBySelector(".detailTicket");
        $ticketItem = $faqItem[0];

        $idTicket = $ticketItem->getAttribute("href");
        $idTicket = explode("/", $idTicket);
        $idTicket = $idTicket[count($idTicket)-1];

        $ticket = DAO::getOne("Ticket", $idTicket);

        $faqItem->click();

        $input = $this->getElementBySelector("#titre");

        $this->assertEquals($ticket->getTitre(), $input->getAttribute("value"));
    }
}