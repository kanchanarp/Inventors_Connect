<?php

/**
 * Created by PhpStorm.
 * User: kanchanaR
 * Date: 24/05/2016
 * Time: 19:35
 */
require_once("$_SERVER[DOCUMENT_ROOT]//functions.php");
require_once("$_SERVER[DOCUMENT_ROOT]//dataAccess/documentDb.class.php");
require_once("$_SERVER[DOCUMENT_ROOT]//domain/document.class.php");
class documentHandler
{

    public function addDocment($filename,$path,$owner,$description,$permission){
        $documentDb=new documentDb();
        $document=$documentDb->addDocment($filename,$path,$owner,$description,$permission);
        $documentOb=null;
        if($document!=null){
            $documentOb=new document($document["DocumentId"],$filename,$path,$owner,$permission,null,null);
        }
        return $documentOb;
    }

    public function removeDocument($documentId){
        $documentDb=new documentDb();
        $documentDb->removeDocument($documentId);
    }

    public function rename($documentId,$filename){
        $documentDb=new documentDb();
        $document=$documentDb->rename($documentId,$filename);
        $documentOb=null;
        if($document!=null){
            $documentOb=new document($document["DocumentId"],$filename,$document["Path"],$document["Owner"],$document["Permission"],null,null);
        }
        return $documentOb;
    }

    public function changeLocation($documentId,$path){
        $documentDb=new documentDb();
        $document=$documentDb->chnageLocation($documentId,$path);
        $documentOb=null;
        if($document!=null){
            $documentOb=new document($document["DocumentId"],$document["Filename"],$document["Path"],$document["Owner"],$document["Permission"],null,null);
        }
        return $documentOb;
    }

    public function findDocumentByName($filename){
        $documentDb=new documentDb();
        $document=$documentDb->findDocumentByName($filename);
        $documentOb=null;
        if($document!=null){
            $documentOb=new document($document["DocumentId"],$filename,$document["Path"],$document["Owner"],$document["Permission"],null,null);
        }
        return $documentOb;
    }

    public function addViewers($documentId,$username){
        $documentDb=new documentDb();
        $document=$documentDb->addViewers($documentId,$username);
        $documentOb=null;
        if($document!=null){
            $documentOb=new document($document["DocumentId"],$document["Filename"],$document["Path"],$document["Owner"],$document["Permission"],null,null);
        }
        return $documentOb;
    }

    public function addDownloaders($documentId,$username){
        $documentDb=new documentDb();
        $document=$documentDb->addDownloaders($documentId,$username);
        $documentOb=null;
        if($document!=null){
            $documentOb=new document($document["DocumentId"],$document["Filename"],$document["Path"],$document["Owner"],$document["Permission"],null,null);
        }
        return $documentOb;
    }

    public function getDocumentList($username){
        $documentDb=new documentDb();
        $documentList=$documentDb->getDocumentList($username);
        return $documentList;
    }
}