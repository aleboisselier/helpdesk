<?php 
/**
* 
*/
class SeleniumTest extends AjaxUnitTest
{

	public function testIndex(){
		$this->get("Indexx/index");
		$this->wait();

		$btDef = $this->getElementsBySelector(".btn-default");
		$doIt = false;
		foreach ($btDef as $btn) {
			if ($btn->getText() == "Utilisateurs") {
				$btn->click();
				$this->wait();
				$doIt = true;
				$thiq->assertPageContainsText("Utilisateurs");
				break;
			}
		}
		$this->assertTrue($doIt);
	}
}