<?php
include_once "../../controller/messageHandler.class.php";
if(session_status() !== PHP_SESSION_ACTIVE){
	session_start();
}
$messageHandler=new messageHandler();
if(isset($_POST["conversationName"])){
	$permission=$_POST["permission"];
	array_push($permission,$_SESSION["User"]);
    $conversationId=$messageHandler->newConversation($_POST["conversationName"],$permission);
    echo "<li class=\"left clearfix\"  onclick=\"testClick(".$conversationId.")\">
                                    <span class=\"chat-img pull-left\">
                                        <img src=\"../images/Profile.jpg\" alt=\"User Avatar\" class=\"img-circle\" />
                                    </span>
                                    <div class=\"chat-body clearfix\">
                                        <div class=\"header\">
                                            <strong class=\"primary-font\">".$_POST["conversationName"]."</strong><br/>
                                            <small class=\" text-muted\">
                                                <i class=\"fa fa-clock-o fa-fw\"></i> 12 mins ago
                                            </small>
                                        </div>
                                    </div>
                                </li>";
	header("Location:../pages/messages.php");
}
?>