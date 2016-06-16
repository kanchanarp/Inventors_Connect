<?php

/**
 * Created by PhpStorm.
 * User: kanchanaR
 * Date: 21/05/2016
 * Time: 18:00
 */

require_once("$_SERVER[DOCUMENT_ROOT]/ProjectSE/functions.php");
 include_once "$_SERVER[DOCUMENT_ROOT]/ProjectSE/dbHandler.class.php";
class technologyDb
{
    public function addTechnology($keyword,$description){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $description=format_string($description);
        $keyword=format_string($keyword);
        $query="INSERT INTO technology(Description) VALUES('{$description}')";
        mysqli_query($connection,$query);
        $techId=getTechByDescription($description);
        $query1="INSERT INTO technology_keyword VALUES('{$techId}','{$keyword}')";
        mysqli_query($connection,$query1);
    }
    public function getTechByDescription($description){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $description=format_string($description);
        $query="SELECT TechId FROM technology WHERE Description='{$description}'";
        $tech_set=mysqli_query($connection,$query);
        confirm_query($tech_set);
        if($tech=mysqli_fetch_assoc($tech_set)){
            return $tech;
        }else{
            return null;
        }
    }
    public function findTechnology($keyword){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $keyword=format_string($keyword);
        $query="SELECT TechId FROM technology_keyword WHERE Keyword='{$keyword}'";
        $tech_set=mysqli_query($connection,$query);
        confirm_query($tech_set);
        if($tech=mysqli_fetch_assoc($tech_set)){
            return $tech;
        }else{
            return null;
        }
    }
}