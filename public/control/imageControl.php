<?php
include_once "../../controller/imagetHandler.class.php";
if(isset($_POST["submit"])){
    $fileHandler=new documentHandler();
    if(isset($_POST["fname"])&&isset($_POST["description"])&&isset($_POST["permission"])){
        $docId=$fileHandler->addDocment($_POST["fname"],"../files/".$_SESSION["User"],$_SESSION["User"],$_POST["description"],$_POST["permission"]);
        $fileHandler->addViewers($docId,$_POST["viewPerm"]);
        $fileHandler->addDownloaders($docId,$_POST["downPerm"]);
    }
}
$fileName = $_FILES["fileUploaded"]["name"]; // The file name
$fileTmpLoc = $_FILES["fileUploaded"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["fileUploaded"]["type"]; // The type of file it is
$fileSize = $_FILES["fileUploaded"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["fileUploaded"]["error"]; // 0 for false... and 1 for true
$var="../images/".$_SESSION["User"];
echo $var;
if (!file_exists($var)) {
    mkdir($var, 0777, true);
}

if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
if(move_uploaded_file($fileTmpLoc, "$var/$fileName")){
    echo "$fileName upload is complete";
} else {
    echo "move_uploaded_file function failed";
}
?>