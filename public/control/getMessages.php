<?php
    include_once "../../controller/messageHandler.class.php";
    $messageHandler=new messageHandler();
    $conversationId=null;
    $msgList=($messageHandler->getMessages($conversationId));
    echo "<li class=\"timeline-inverted\">
            <div class=\"timeline-badge success\"><i class=\"fa fa-graduation-cap\"></i>
            </div>
            <div class=\"timeline-panel\">
               <div class=\"timeline-heading\">
                  <h4 class=\"timeline-title\">Test Post</h4>
               </div>
               <div class=\"timeline-body\">
                    <p>This is a sample text post. The user can post his discussion in textual form or any other legible form in this area. This area shows the user the posts that are visible to him or her.</p>
               </div>
            </div>
           </li>";
?>