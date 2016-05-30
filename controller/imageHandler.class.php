<?php

/**
 * Created by PhpStorm.
 * User: kanchanaR
 * Date: 24/05/2016
 * Time: 19:46
 */
require_once("../functions.php");
require_once("../dataAccess/imageDb.class.php");
require_once("../domain/image.class.php");
class imageHandler
{
    public function addImage($filename,$path,$owner,$description,$permission){
        $imageDb=new imageDb();
        $image=$imageDb->addImage($filename,$path,$owner,$description,$permission);
        $imageOb=null;
        if($image!=null){
            $imageOb=new image($image["ImageId"],$filename,$path,$owner,$permission,null,null);
        }
        return $imageOb;
    }

    public function removeImage($imageId){
        $imageDb=new imageDb();
        $imageDb->removeImage($imageId);
    }

    public function rename($imageId,$filename){
        $imageDb=new imageDb();
        $image=$imageDb->rename($imageId,$filename);
        $imageOb=null;
        if($image!=null){
            $imageOb=new image($image["ImageId"],$filename,$image["Path"],$image["Owner"],$image["Permission"],null,null);
        }
        return $imageOb;
    }

    public function changeLocation($imageId,$path){
        $imageDb=new imageDb();
        $image=$imageDb->changeLocation($imageId,$path);
        $imageOb=null;
        if($image!=null){
            $imageOb=new image($image["ImageId"],$image["Filename"],$image["Path"],$image["Owner"],$image["Permission"],null,null);
        }
        return $imageOb;
    }

    public function findImageByName($filename){
        $imageDb=new imageDb();
        $image=$imageDb->findImageByName($filename);
        $imageOb=null;
        if($image!=null){
            $imageOb=new image($image["ImageId"],$filename,$image["Path"],$image["Owner"],$image["Permission"],null,null);
        }
        return $imageOb;
    }

    public function addViewers($imageId,$username){
        $imageDb=new imageDb();
        $image=$imageDb->addViewers($imageId,$username);
        $imageOb=null;
        if($image!=null){
            $imageOb=new image($image["ImageId"],$image["Filename"],$image["Path"],$image["Owner"],$image["Permission"],null,null);
        }
        return $imageOb;
    }

    public function addDownloaders($imageId,$username){
        $imageDb=new imageDb();
        $image=$imageDb->addDownloaders($imageId,$username);
        $imageOb=null;
        if($image!=null){
            $imageOb=new image($image["ImageId"],$image["Filename"],$image["Path"],$image["Owner"],$image["Permission"],null,null);
        }
        return $imageOb;
    }

    public function getImageList($username){
        $imageDb=new imageDb();
        $imageList=$imageDb->getImageList($username);
        return $imageList;
    }
}