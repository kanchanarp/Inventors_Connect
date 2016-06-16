<?php

/**
 * Created by PhpStorm.
 * User: kanchanaR
 * Date: 24/05/2016
 * Time: 20:36
 */
require_once("$_SERVER[DOCUMENT_ROOT]/ProjectSE/functions.php");
require_once("$_SERVER[DOCUMENT_ROOT]/ProjectSE/dataAccess/technologyDb.class.php");
require_once("$_SERVER[DOCUMENT_ROOT]/ProjectSE/domain/technology.class.php");
class technologyHandler
{
    public function addTechnology($keyword,$description){
        $technologyDb=new technologyDb();
        $technologyDb->addTechnology($keyword,$description);
    }
    public function getTechByDescription($description){
        $technologyDb=new technologyDb();
        $technology=$technologyDb->getTechByDescription($description);
        $technologyOb=null;
        if($technology!=null){
            $technologyOb=new technology($technology["TechId"],null,$description);
        }
        return $technologyOb;
    }
    public function findTechnology($keyword){
        $technologyDb=new technologyDb();
        $technology=$technologyDb->findTechnology($keyword);
        $technologyOb=null;
        if($technology!=null){
            $technologyOb=new technology($technology["TechId"],null,$technology["Description"]);
        }
        return $technologyOb;
    }
    public function getTechList(){
        $technologyDb=new technologyDb();
        return $technologyDb->getTechList();
    }
}