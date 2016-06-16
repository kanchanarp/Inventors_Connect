<?php

$_SERVER['DOCUMENT_ROOT'] = 'C:\\xampp\\htdocs';
require_once("$_SERVER[DOCUMENT_ROOT]\\ProjectSE\\controller\\documentHandler.class.php");
class documentHandlerTest extends PHPUnit_Framework_TestCase
{
    public function testFindDocumentByName(){
        $documentHandler=new documentHandler();
        $document=$documentHandler->findDocumentByName("Assignment.pdf");
        $this->assertEquals("../files/test",$document->getPath());
    }
    public function testGetDocumentList(){
        $documentHandler=new documentHandler();
        $document=$documentHandler->getDocumentList("test");
        $this->assertEquals("Assignment.pdf",$document[2]["Filename"]);
    }
}
