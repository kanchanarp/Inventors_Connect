<?php

/**
 * Created by PhpStorm.
 * User: kanchanaR
 * Date: 17/05/2016
 * Time: 09:12
 */
require_once("../functions.php");
class imageDb
{
    public function addImage($filename,$path,$owner,$description,$permission){
        global $connection;
        $filename=format_string($filename);
        $path=format_string($path);
        $description=format_string($description);
        $permission=format_string($permission);
        $owner=format_string($owner);
        $query="INSERT INTO image(Filename,Path,Owner,Description,Permission) VALUES('{$filename}','{$path}','{$owner}','{$description}','{$permission}')";
        mysqli_query($connection,$query);
    }

    public function removeImage($imageId){
        global $connection;
        $imageId=format_string($imageId);
        $query="DELETE FROM image WHERE ImageId='{$imageId}'";
        mysqli_query($connection,$query);
    }

    public function rename($imageId,$filename){
        global $connection;
        $imageId=format_string($imageId);
        $filename=format_string($filename);
        $query="UPDATE image SET Filename='{$filename}' WHERE ImageId='{$imageId}'";
        mysqli_query($connection,$query);
    }

    public function changeLocation($imageId,$path){
        global $connection;
        $imageId=format_string($imageId);
        $path=format_string($path);
        $query="UPDATE image SET Path='{$path}' WHERE ImageId='{$imageId}'";
        mysqli_query($connection,$query);
    }

    public function findImageByName($filename){
        global $connection;
        $filename=format_string($filename);
        $query="SELECT * FROM image WHERE Filename='{$filename}'";
        mysqli_query($connection,$query);
    }

    public function addViewers($imageId,$username){
        global $connection;
        $imageId=format_string($imageId);
        $username=format_string($username);
        $query="INSERT INTO imagecanview VALUES('{$imageId}','{$username}')";
        mysqli_query($connection,$query);
    }

    public function addDownloaders($imageId,$username){
        global $connection;
        $imageId=format_string($imageId);
        $username=format_string($username);
        $query="INSERT INTO imagecandown VALUES('{$imageId}','{$username}')";
        mysqli_query($connection,$query);
    }

    public function getImageList($username){
        global $connection;
        $username=format_string($username);
        $query="SELECT * FROM image WHERE Owner='{$username}'";
        mysqli_query($connection,$query);
    }
}