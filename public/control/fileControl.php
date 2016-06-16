<?php
include_once "../../controller/documentHandler.class.php";
session_start();
$fileName = $_FILES["fileUploaded"]["name"]; // The file name
$file_ext = substr($filename, strripos($filename, '.'));
$fileTmpLoc = $_FILES["fileUploaded"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["fileUploaded"]["type"]; // The type of file it is
$fileSize = $_FILES["fileUploaded"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["fileUploaded"]["error"]; // 0 for false... and 1 for true
$temp = explode(".", $fileName);
$newFileName = $_POST["fname"]. '.' . end($temp);
$var="../files/".$_SESSION["User"];
echo $var;
if (!file_exists($var)) {
    mkdir($var, 0777, true);
}

if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
if(move_uploaded_file($fileTmpLoc, "$var/$newFileName")){
	if(isset($_POST["submit"])){
		$fileHandler=new documentHandler();
		if(isset($_POST["fname"])&&isset($_POST["description"])&&isset($_POST["permission"])){
			$docId=$fileHandler->addDocment($newFileName,"../files/".$_SESSION["User"],$_SESSION["User"],$_POST["description"],$_POST["permission"]);
			$fileHandler->addViewers($docId,$_POST["viewPerm"]);
			$fileHandler->addDownloaders($docId,$_POST["downPerm"]);
			
		}
	}
	//header("Location:../pages/files.php");
} else {
    echo "move_uploaded_file function failed";
}
?>