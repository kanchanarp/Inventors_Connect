<?php
$_SERVER['DOCUMENT_ROOT'] = 'C:\\xampp\\htdocs';
require_once("$_SERVER[DOCUMENT_ROOT]\\ProjectSE\\controller\\technologyHandler.class.php");
class technologyHandlerTest extends PHPUnit_Framework_TestCase
{
    public function testGetTechByDescription(){
        $technologyHandler=new technologyHandler();
        $tech=$technologyHandler->getTechByDescription("Test");
        $this->assertEquals(1,$tech->getTechId());
    }
    public function testFindTechnology(){
        $technologyHandler=new technologyHandler();
        $tech=$technologyHandler->findTechnology("Test");
        $this->assertEquals(null,$tech);
    }
}
