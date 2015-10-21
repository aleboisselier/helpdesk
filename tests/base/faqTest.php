<?php
use micro\orm\DAO;
class FaqsTest extends AjaxUnitTest {
    public function testAfficheFaqAdmin(){
        global $config;
        DAO::connect($config["database"]['dbName']);
        //Connecting Admin
        $_SESSION["user"]=DAO::getOne("User", "admin=1");
        $_SESSION['KCFINDER'] = array(
                'disabled' => false
        );
        $_SESSION['logStatus'] = 'success';

        //Loading Index
        $this->get("Indexx/asAdmin");
        $this->get("Faqs/index");
        $this->wait();
        //Is the FAQ Here ?
        $faqItem = $this->getElementsBySelector(".btnVoirFaq");
        $faqItem = $faqItem[0];

        $idFaq = $faqItem->getAttribute("href");
        $idFaq = explode("/", $idFaq);
        $idFaq = $idFaq[count($idFaq)-1];

        $faq = DAO::getOne("Faq", $idFaq);

        $faqItem->click();

        $this->assertPageContainsText($faq->getTitre());

        $btnModif = $this->getElementBySelector(".btnModifFaq");
        $btnModif->click();

        $input = $this->getElementBySelector("#titre");
        $this->assertEquals($faq->getTitre(), $input->getAttribute("value"));


        $this->wait();
    }

    public function testAfficheFaqUser(){
        global $config;
        DAO::connect($config["database"]['dbName']);
        //Connecting Admin
        $_SESSION["user"]=DAO::getOne("User", "admin=0");
        $_SESSION['KCFINDER'] = array(
                'disabled' => false
        );
        $_SESSION['logStatus'] = 'success';

        //Loading Index
        $this->get("Indexx/asUser");
        $this->get("Faqs/index");
        $this->wait();
        //Is the FAQ Here ?
        $faqItem = $this->getElementsBySelector(".btnVoirFaq");
        $faqItem = $faqItem[0];

        $idFaq = $faqItem->getAttribute("href");
        $idFaq = explode("/", $idFaq);
        $idFaq = $idFaq[count($idFaq)-1];

        $faq = DAO::getOne("Faq", $idFaq);

        $faqItem->click();

        $this->assertPageContainsText($faq->getTitre());

        $this->wait();
    }
}