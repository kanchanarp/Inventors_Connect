<?php

$_SERVER['DOCUMENT_ROOT'] = 'C:\\xampp\\htdocs';
require_once("$_SERVER[DOCUMENT_ROOT]\\ProjectSE\\controller\\imageHandler.class.php");
class imageHandlerTest extends PHPUnit_Framework_TestCase
{
    public function testFindImageByName(){
        $imageHandler=new imageHandler();
        $image=$imageHandler->findImageByName("Test1.jpg");
        $this->assertEquals("../images/test",$image->getPath());
    }
    public function testGetImageList(){
        $imageHandler=new imageHandler();
        $image=$imageHandler->getImageList("test");
        $this->assertEquals("Test1.jpg",$image[0]["Filename"]);
    }
}
