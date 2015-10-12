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
		$divB = $this->getElementBySelector('.data');
		$this->assertNotNull($divB);
	}
}