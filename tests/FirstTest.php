<?php
use micro\orm\DAO;
class FirstTest extends \PHPUnit_Framework_TestCase {

    // public function testOne() {
    //     $this->assertEquals(3, 2+1);
    // }
    public static function setupBeforeClass(){
        global $config;
        DAO::connect($config["database"]['dbName']);
    }

    public function testConfig(){
        global $config;
        $this->assertTrue($config["test"]);
    }

    public function testTicket(){
        $ticket = DAO::getOne("Ticket", 1);
        $this->assertNotNull($ticket);
        $this->assertEquals($ticket->getId(), 1);
    }
 
}