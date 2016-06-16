<?php

$_SERVER['DOCUMENT_ROOT'] = 'C:\\xampp\\htdocs';
require_once("$_SERVER[DOCUMENT_ROOT]\\ProjectSE\\controller\\userHadler.class.php");
class userHadlerTest extends PHPUnit_Framework_TestCase
{
    public function testFindUser(){
        $userHandler=new userHadler();
        $user=$userHandler->findUser("test");
        $user1=$userHandler->findUser("other");
        $this->assertEquals('2012-02-03',$user["DateOfBirth"]);
        $this->assertEquals(null,$user1["DateOfBirth"]);
    }
    public function testGetInvolvedTech(){
        $userHandler=new userHadler();
        $tech=$userHandler->getInvolvedTech("test");
        $this->assertEquals(1,$tech[0]["TechId"]);
    }
    public function testGetAllUsers(){
        $userHandler=new userHadler();
        $userList=$userHandler->getAllUsers();
        $this->assertEquals("Kanchana",$userList[0]["FirstName"]);
        $this->assertEquals("Ruwanpathirana",$userList[0]["LastName"]);
    }
}
