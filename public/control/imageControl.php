<?php
include_once "../../controller/imageHandler.class.php";
	if(session_status() !== PHP_SESSION_ACTIVE){
		session_start();
	}
$fileName = $_FILES["fileUploaded"]["name"]; // The file name
$fileTmpLoc = $_FILES["fileUploaded"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["fileUploaded"]["type"]; // The type of file it is
$fileSize = $_FILES["fileUploaded"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["fileUploaded"]["error"]; // 0 for false... and 1 for true
$var="../images/".$_SESSION["User"];
$temp = explode(".", $fileName);
$newFileName = $_POST["fname"]. '.' . end($temp);
echo $var;
if (!file_exists($var)) {
    mkdir($var, 0777, true);
}

if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
if(move_uploaded_file($fileTmpLoc, "$var/$newFileName")){
    echo "$fileName upload is complete";

		$fileHandler=new imageHandler();
		var_dump($_POST);
		if(isset($_POST["fname"])&&isset($_POST["permission"])){
			$docId=$fileHandler->addImage($newFileName,$var,$_SESSION["User"],"image file",$_POST["permission"]);
			$fileHandler->addViewers($docId,$_POST["viewPerm"]);
			$fileHandler->addDownloaders($docId,$_POST["downPerm"]);
		}

	//
} else {
    echo "move_uploaded_file function failed";
}

?>