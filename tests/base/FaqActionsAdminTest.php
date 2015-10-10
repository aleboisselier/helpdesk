<?php
use micro\orm\DAO;
class FaqActionsAdminTest extends AjaxUnitTest {


    //Test de la suspension d'un article
    public function testSuspend(){
        global $config;
        DAO::connect($config["database"]['dbName']);
        
        $_SESSION["user"]=DAO::getOne("User", "admin=1");
        $_SESSION['KCFINDER'] = array(
                'disabled' => false
        );
        $_SESSION['logStatus'] = 'success';
        //Connecting Admin
        $this->get("Indexx/asAdmin");

        //Inserting New Article
        $faq = new Faq();
        $faq->setCategorie(DAO::getOne("Categorie", "1=1"));
        $faq->setContenu("Contenu");
        $faq->setPublished(1);
        $faq->setTitre("Test");
        $faq->setUser(Auth::getUser());
        DAO::insert($faq);

        //Loading List
        $this->get("Faqs/index");
        //$this->wait();


        $faqSuspendLink = $this->getElementById($faq->getId().";0");
        $faqSuspendLink->click();

        sleep(20);

        $faqItems = $this->getElementsBySelector(".faq-items");
        $this->assertNotNull($faqItems);

        //Reloading Article From DB and testing if well suspended
        $faq = DAO::getOne("Faq", "id = ".$faq->getId());
        $this->assertEquals($faq->getPublished(), 0);

        DAO::delete($faq);

    }

    public function testPublish(){
        global $config;
        DAO::connect($config["database"]['dbName']);
        
        $_SESSION["user"]=DAO::getOne("User", "admin=1");
        $_SESSION['KCFINDER'] = array(
                'disabled' => false
        );
        $_SESSION['logStatus'] = 'success';
        //Connecting Admin
        $this->get("Indexx/asAdmin");

        //Inserting New Article
        $faq = new Faq();
        $faq->setCategorie(DAO::getOne("Categorie", "1=1"));
        $faq->setContenu("Contenu");
        $faq->setPublished(0);
        $faq->setTitre("Test");
        $faq->setUser(Auth::getUser());
        DAO::insert($faq);

        //Loading List
        $this->get("Faqs/index");
        //$this->wait();


        $faqSuspendLink = $this->getElementById($faq->getId().";1");
        $faqSuspendLink->click();

        sleep(20);

        $faqItems = $this->getElementsBySelector(".faq-items");
        $this->assertNotNull($faqItems);

        //Reloading Article From DB and testing if well suspended
        $faq = DAO::getOne("Faq", "id = ".$faq->getId());
        $this->assertEquals($faq->getPublished(), 1);

        DAO::delete($faq);

    }

    public function testDelete(){
        global $config;
        DAO::connect($config["database"]['dbName']);
        
        $_SESSION["user"]=DAO::getOne("User", "admin=1");
        $_SESSION['KCFINDER'] = array(
                'disabled' => false
        );
        $_SESSION['logStatus'] = 'success';
        //Connecting Admin
        $this->get("Indexx/asAdmin");

        //Inserting New Article
        $faq = new Faq();
        $faq->setCategorie(DAO::getOne("Categorie", "1=1"));
        $faq->setContenu("Contenu");
        $faq->setPublished(0);
        $faq->setTitre("Test");
        $faq->setUser(Auth::getUser());
        DAO::insert($faq);

        //Loading List
        $this->get("Faqs/index");
        //$this->wait();


        $faqSuspendLink = $this->getElementById("del-".$faq->getId());
        $faqSuspendLink->click();

        $faqItems = $this->getElementsBySelector(".faq-items");
        $this->assertNotNull($faqItems);

        //Reloading Article From DB and testing if well suspended
        $faq = DAO::getOne("Faq", "id = ".$faq->getId());
        $this->assertNull($faq);

    }


}