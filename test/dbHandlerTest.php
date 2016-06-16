<?php

$_SERVER['DOCUMENT_ROOT'] = 'C:\\xampp\\htdocs';
require_once("$_SERVER[DOCUMENT_ROOT]\\ProjectSE\\dbHandler.class.php");
class dbHandlerTest extends PHPUnit_Framework_TestCase
{
    public function testGetConnection(){
        $dbHandler=new dbHandler();
        $connection=$dbHandler->getConnection();
        $this->assertEquals(null,mysqli_connect_errno());
    }
}
