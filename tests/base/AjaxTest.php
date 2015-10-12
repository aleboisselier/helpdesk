<?php 
/**
* 
*/
class AjaxTest extends AjaxUnitTest
{
	public function testAjax(){
		$this->get("Indexx/asAdmin");
		sleep(10);
	}
}