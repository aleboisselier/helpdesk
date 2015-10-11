<?php
use micro\orm\DAO;
class FaqsTest extends AjaxUnitTest {
    public function testAfficheFaq(){
        global $config;
        DAO::connect($config["database"]['dbName']);
        //Connecting Admin
        $_SESSION["user"]=DAO::getOne("User", "admin=1");
        $_SESSION['KCFINDER'] = array(
                'disabled' => false
        );
        $_SESSION['logStatus'] = 'success';

        $faq=new Faq();

        //Loading Index
        $this->get("Indexx/asUser");
        $this->get("Faqs/index");
        $this->wait();
        //Is the FAQ Here ?
        $titreFaq=$faq->getid();
        $notifItem = $this->getElementsBySelector(".btnVoirFaq");
        $notifItem[0]->click();
        $titreFaqSelec=$faq->getid();
        $test = ($titreFaq==$titreFaqSelec)?true: false;
        // $idFaqs=sustring();
        $this->wait();
    }
}