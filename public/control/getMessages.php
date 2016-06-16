<?php
	if(session_status() !== PHP_SESSION_ACTIVE){
		session_start();
	}

    include_once "../../controller/messageHandler.class.php";
    $messageHandler=new messageHandler();
    $conversationId=$_POST["ConversationId"];
    $msgList=($messageHandler->getMessages($conversationId));
	if(empty($msgList)){
		echo "No messages available";
	}else{
		echo "<ul class=\"timeline\" id=\"chatBox\">";
		foreach($msgList as $msg){
			if($msg['SentBy']==$_SESSION["User"]){
				echo "<li class=\"timeline-inverted\">";
			}else{
				echo "<li>";
			}
			echo "<div class=\"timeline-badge success\"><i class=\"fa fa-comment\"></i>
				</div>
				<div class=\"timeline-panel\">
				   <div class=\"timeline-heading\">
					  <h4 class=\"timeline-title\">".$msg['SentBy']."</h4>
				   </div>
				   <div class=\"timeline-body\">
						<p>".$msg['Message']."</p>
				   </div>
				</div>
			   </li>";
		}
		echo "</ul>";
	}

?>