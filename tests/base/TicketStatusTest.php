<?php
use micro\orm\DAO;

class TicketStatusTest extends AjaxUnitTest {

    public static function setUpBeforeClass() {
        parent::setUpBeforeClass();
        session_start();

        global $config;
        DAO::connect($config["database"]['dbName']);

        $_SESSION["user"]=DAO::getOne("User", "admin=1");
        $_SESSION['KCFINDER'] = array(
                'disabled' => false
        );
        $_SESSION['logStatus'] = 'success';


    }

    public function testStatus(){
        $this->get("Indexx/asAdmin");

        $ticket = new Ticket();
        $ticket->setCategorie(DAO::getOne("Categorie", "1=1"));
        $ticket->setType("demande");
        $ticket->setTitre("Auto Generated Ticket");
        $ticket->setDescription("Auto Generated Ticket");
        $ticket->setStatut(DAO::getOne("Statut", "id=1"));
        $ticket->setUser(Auth::getUser());
        $ticket->setDateCreation("1900-01-01 00:00:00");

        DAO::insert($ticket);

        $this->get("Tickets/index");
        sleep(2);
        $id = "2;".strval($ticket->getId());
        $btnStatut = $this->getElementById($id);
        $btnStatut->click();
        sleep(1);

        $ticketBis = DAO::getOne("Ticket", $ticket->getId());
        $this->assertEquals($ticketBis->getStatut()->getId(), 2);
        sleep(1);

        $btnList = $this->getElementsBySelector(".chgList");
        foreach ($btnList as $btn) {
            if (strpos($btn->getText(), "Mes Tickets") !== false) {
                $btn->click();
            }
        }

        sleep(2);
        $statut = DAO::getOne("Statut", "id=2");
        $div = $this->getElementById("s".strval($ticket->getId()));
        $this->assertContains($statut->getLibelle(), $div->getText());


        for ($i=3; $i < 6; $i++) { 
            $id = strval($i).";".strval($ticket->getId());
            $btnStatut = $this->getElementById($id);
            $btnStatut->click();
            sleep(2);

            $ticketBis = DAO::getOne("Ticket", "id=".$ticket->getId());
            $this->assertEquals($ticketBis->getStatut()->getId(), $i);

            $statut = DAO::getOne("Statut", "id=".strval($i));
            $div = $this->getElementById("s".strval($ticket->getId()));
            $this->assertContains($statut->getLibelle(), $div->getText());

            sleep(1);
        }

        DAO::delete($ticket);

    }


}