<?php
use micro\orm\DAO;
class LoginTest extends AjaxUnitTest {

    public static function setUpBeforeClass() {
        parent::setUpBeforeClass();
        $capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'firefox',\WebDriverCapabilityType::VERSION=>'41.0');
        self::$webDriver = \RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);

        global $config;
        DAO::connect($config["database"]['dbName']);

    }

    public function testUser(){
        $user = DAO::getOne("User", "admin=0");

        $this->get("Indexx/index");

        $loginForm = $this->getElementById("loginForm");
        $this->assertNotNull($loginForm);

        $this->getElementById("email")->sendkeys($user->getMail());
        $this->getElementById("password")->sendkeys($user->getPassword());
        $this->getElementById("submitLogin")->click();

        $alert = $this->getElementBySelector(".alert-success");
        $this->assertNotNull($alert);

        $this->get("Indexx/disconnect");

    }

    public function testAdmin(){
        $user = DAO::getOne("User", "admin=1");

        $this->get("Indexx/index");

        $loginForm = $this->getElementById("loginForm");
        $this->assertNotNull($loginForm);

        $this->getElementById("email")->sendkeys($user->getMail());
        $this->getElementById("password")->sendkeys($user->getPassword());
        $this->getElementById("submitLogin")->click();

        $alert = $this->getElementBySelector(".alert-success");
        $this->assertNotNull($alert);

        $this->get("Indexx/disconnect");

    }

    public function testFailed(){

        $this->get("Indexx/index");

        $loginForm = $this->getElementById("loginForm");
        $this->assertNotNull($loginForm);

        $this->getElementById("email")->sendkeys("1@1.fr");
        $this->getElementById("password")->sendkeys("1");
        $this->getElementById("submitLogin")->click();

        $alert = $this->getElementBySelector(".alert-danger");
        $this->assertNotNull($alert);

        $loginForm = $this->getElementById("loginForm");
        $this->assertNotNull($loginForm);

    }

}