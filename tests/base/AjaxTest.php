<?php 
/**
* 
*/
class AjaxTest extends AjaxUnitTest
{
	public function testAjax(){
		$this->get("Indexx/asAdmin");
		sleep(10);
		//$div = $this->getElementBySelector('.error');
		//$this->assertNotNull($div);
		$divB = $this->getElementBySelector('.response');
		$this->assertContains("Questions", $divB->getText());
	}
}