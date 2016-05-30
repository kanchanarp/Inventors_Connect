<?php

/**
 * Created by PhpStorm.
 * User: kanchanaR
 * Date: 17/05/2016
 * Time: 09:11
 */
class documentDb
{

    public function addDocment($filename,$path,$owner,$description,$permission){
        global $connection;
        $filename=format_string($filename);
        $path=format_string($path);
        $description=format_string($description);
        $permission=format_string($permission);
        $owner=format_string($owner);
        $query="INSERT INTO document(Filename,Path,Owner,Description,Permission) VALUES('{$filename}','{$path}','{$owner}','{$description}','{$permission}')";
        mysqli_query($connection,$query);
    }

    public function removeDocument($documentId){
        global $connection;
        $documentId=format_string($documentId);
        $query="DELETE FROM document WHERE DocumentId='{$documentId}'";
        mysqli_query($connection,$query);
    }

    public function rename($documentId,$filename){
        global $connection;
        $documentId=format_string($documentId);
        $filename=format_string($filename);
        $query="UPDATE document SET Filename='{$filename}' WHERE DocumentId='{$documentId}'";
        mysqli_query($connection,$query);
    }

    public function chnageLocation($documentId,$path){
        global $connection;
        $documentId=format_string($documentId);
        $path=format_string($path);
        $query="UPDATE document SET Path='{$path}' WHERE DocumentId='{$documentId}'";
        mysqli_query($connection,$query);
    }

    public function findDocumentByName($filename){
        global $connection;
        $filename=format_string($filename);
        $query="SELECT * FROM document WHERE Filename='{$filename}'";
        mysqli_query($connection,$query);
    }

    public function addViewers($documentId,$username){
        global $connection;
        $documentId=format_string($documentId);
        $username=format_string($username);
        $query="INSERT INTO documentcanview VALUES('{$documentId}','{$username}')";
        mysqli_query($connection,$query);
    }

    public function addDownloaders($documentId,$username){
        global $connection;
        $documentId=format_string($documentId);
        $username=format_string($username);
        $query="INSERT INTO documentcandown VALUES('{$documentId}','{$username}')";
        mysqli_query($connection,$query);
    }

    public function getDocumentList($username){
        global $connection;
        $username=format_string($username);
        $query="SELECT * FROM document WHERE Owner='{$username}'";
        mysqli_query($connection,$query);
    }
}