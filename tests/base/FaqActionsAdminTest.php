<?php
use micro\orm\DAO;
class FaqActionsAdminTest extends AjaxUnitTest {

    public static function setUpBeforeClass() {
        parent::setUpBeforeClass();
        $capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'firefox',\WebDriverCapabilityType::VERSION=>'41.0');
        self::$webDriver = \RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);

        global $config;
        DAO::connect($config["database"]['dbName']);

        $_SESSION["user"]=DAO::getOne("User", "admin=1");
        $_SESSION['KCFINDER'] = array(
                'disabled' => false
        );
        $_SESSION['logStatus'] = 'success';
        //Connecting Admin

    }

    //Test de la suspension d'un article
    public function testSuspend(){
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

        sleep(3);

        $faqItems = $this->getElementsBySelector(".faq-items");
        $this->assertNotNull($faqItems);

        //Reloading Article From DB and testing if well suspended
        $faq = DAO::getOne("Faq", "id = ".$faq->getId());
        $this->assertEquals($faq->getPublished(), 0);

        DAO::delete($faq);

    }

    public function testPublish(){
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

        sleep(3);

        $faqItems = $this->getElementsBySelector(".faq-items");
        $this->assertNotNull($faqItems);

        //Reloading Article From DB and testing if well suspended
        $faq = DAO::getOne("Faq", "id = ".$faq->getId());
        $this->assertEquals($faq->getPublished(), 1);

        DAO::delete($faq);

    }

    public function testDelete(){
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

    public function testAddFAQ(){
        $this->get("Indexx/asAdmin");

        //Loading List
        $this->get("Faqs/index");

        $faqAddLink = $this->getElementById("faqAddBtn");
        $faqAddLink->click();

        $this->setFieldReplace("#titre", "AutoTest");
        $list = $this->getElementBySelector(".element#element1");
        $list->click();
        $this->setFieldReplace("#contenu", "AutoTest");

        $btn = $this->getElementBySelector("input[value=Valider]");
        $btn->click();

        $faq = DAO::getOne("Faq", "titre = 'AutoTest' AND contenu = 'AutoTest' ");
        $this->assertNotNull($faq);

        $divFaq = $this->getElementBySelector('.faq-items');
        $this->assertNotNull($divFaq);

        DAO::delete($faq);

    }


}