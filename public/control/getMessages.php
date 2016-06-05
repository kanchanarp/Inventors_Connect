<?php
    include_once "../../controller/messageHandler.class.php";
    $messageHandler=new messageHandler();
    $conversationId=null;
    $msgList=($messageHandler->getMessages($conversationId));
    foreach($msgList as $msg){
        echo "<li class=\"timeline-inverted\">
            <div class=\"timeline-badge success\"><i class=\"fa fa-graduation-cap\"></i>
            </div>
            <div class=\"timeline-panel\">
               <div class=\"timeline-heading\">
                  <h4 class=\"timeline-title\">".$msg['Username']."</h4>
               </div>
               <div class=\"timeline-body\">
                    <p>".$msg['Message']."</p>
               </div>
            </div>
           </li>";
    }

?>