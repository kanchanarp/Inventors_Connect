<?php

/**
 * Created by PhpStorm.
 * User: kanchanaR
 * Date: 17/05/2016
 * Time: 09:11
 */
 require_once("$_SERVER[DOCUMENT_ROOT]/ProjectSE/functions.php");
  include_once "$_SERVER[DOCUMENT_ROOT]/ProjectSE/dbHandler.class.php";
class documentDb
{

    public function addDocment($filename,$path,$owner,$description,$permission){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $filename=format_string($filename);
        $path=format_string($path);
        $description=format_string($description);
        $permission=format_string($permission);
        $owner=format_string($owner);
        $query="INSERT INTO document(Filename,Path,Owner,Description,Permission) VALUES('{$filename}','{$path}','{$owner}','{$description}','{$permission}')";
        mysqli_query($connection,$query);
    }

    public function removeDocument($documentId){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $documentId=format_string($documentId);
        $query="DELETE FROM document WHERE DocumentId='{$documentId}'";
        mysqli_query($connection,$query);
    }

    public function renameDocument($documentId,$filename){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $documentId=format_string($documentId);
        $filename=format_string($filename);
        $query="UPDATE document SET Filename='{$filename}' WHERE DocumentId='{$documentId}'";
        mysqli_query($connection,$query);
    }

    public function chnageLocation($documentId,$path){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $documentId=format_string($documentId);
        $path=format_string($path);
        $query="UPDATE document SET Path='{$path}' WHERE DocumentId='{$documentId}'";
        mysqli_query($connection,$query);
    }

    public function findDocumentByName($filename){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $filename=format_string($filename);
        $query="SELECT * FROM document WHERE Filename='{$filename}'";
        $doc_qry=mysqli_query($connection,$query);
		confirm_query($doc_qry);
		if($doc=mysqli_fetch_assoc($doc_qry)){
			return $doc;
		}else{
			return null;
		}
    }

    public function addViewers($documentId,$username){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $documentId=format_string($documentId);
        $username=format_string($username);
        $query="INSERT INTO documentcanview VALUES('{$documentId}','{$username}')";
        mysqli_query($connection,$query);
    }

    public function addDownloaders($documentId,$username){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $documentId=format_string($documentId);
        $username=format_string($username);
        $query="INSERT INTO documentcandown VALUES('{$documentId}','{$username}')";
        mysqli_query($connection,$query);
    }

    public function getDocumentList($username){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $username=format_string($username);
        $query="SELECT * FROM document WHERE Owner='{$username}'";
        $doc_qry=mysqli_query($connection,$query);
		
		confirm_query($doc_qry);
		$doc=array();
		while ($row = mysqli_fetch_assoc($doc_qry)) {
			array_push($doc,$row);
		}
		return $doc;
    }
}