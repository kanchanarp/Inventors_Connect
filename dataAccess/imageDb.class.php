<?php

/**
 * Created by PhpStorm.
 * User: kanchanaR
 * Date: 17/05/2016
 * Time: 09:12
 */
require_once("$_SERVER[DOCUMENT_ROOT]/ProjectSE/functions.php");
 include_once "$_SERVER[DOCUMENT_ROOT]/ProjectSE/dbHandler.class.php";
class imageDb
{
    public function addImage($filename,$path,$owner,$description,$permission){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $filename=format_string($filename);
        $path=format_string($path);
        $description=format_string($description);
        $permission=format_string($permission);
        $owner=format_string($owner);
        $query="INSERT INTO image(Filename,Path,Owner,Description,Permission) VALUES('{$filename}','{$path}','{$owner}','{$description}','{$permission}')";
        mysqli_query($connection,$query);
    }

    public function removeImage($imageId){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $imageId=format_string($imageId);
        $query="DELETE FROM image WHERE ImageId='{$imageId}'";
        mysqli_query($connection,$query);
    }

    public function renameImage($imageId,$filename){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $imageId=format_string($imageId);
        $filename=format_string($filename);
        $query="UPDATE image SET Filename='{$filename}' WHERE ImageId='{$imageId}'";
        mysqli_query($connection,$query);
    }

    public function changeLocation($imageId,$path){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $imageId=format_string($imageId);
        $path=format_string($path);
        $query="UPDATE image SET Path='{$path}' WHERE ImageId='{$imageId}'";
        mysqli_query($connection,$query);
    }

    public function findImageByName($filename){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $filename=format_string($filename);
        $query="SELECT * FROM image WHERE Filename='{$filename}'";
        $image_qry=mysqli_query($connection,$query);
		confirm_query($image_qry);
		if($image=mysqli_fetch_assoc($image_qry)){
			return $image;
		}else{
			return null;
		}
    }

    public function addViewers($imageId,$username){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $imageId=format_string($imageId);
        $username=format_string($username);
        $query="INSERT INTO imagecanview VALUES('{$imageId}','{$username}')";
        mysqli_query($connection,$query);
    }

    public function addDownloaders($imageId,$username){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $imageId=format_string($imageId);
        $username=format_string($username);
        $query="INSERT INTO imagecandown VALUES('{$imageId}','{$username}')";
        mysqli_query($connection,$query);
    }

    public function getImageList($username){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $username=format_string($username);
        $query="SELECT * FROM image WHERE Owner='{$username}'";
        $image_qry=mysqli_query($connection,$query);
		confirm_query($image_qry);
        $imageList=array();
		while ($row = mysqli_fetch_assoc($image_qry)) {
			array_push($imageList,$row);
		}
		return $imageList;
    }
}