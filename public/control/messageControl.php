<?php
    include_once "../../controller/messageHandler.class.php";
	session_start();
    $messageHandler=new messageHandler();
    if(isset($_POST["message"])&&isset($_POST["conversationId"])){
        $messageID=$messageHandler->newMessage($_POST["conversationId"],$_POST["message"],$_SESSION["User"],null,null);
        echo "<li class=\"timeline-inverted\">
                                    <div class=\"timeline-badge success\"><i class=\"fa fa-comment\"></i>
                                    </div>
                                    <div class=\"timeline-panel\">
                                        <div class=\"timeline-heading\">
                                            <h4 class=\"timeline-title\">".$_SESSION["User"]."</h4>
                                        </div>
                                        <div class=\"timeline-body\">
                                            <p>".$_POST["message"]."</p>
                                        </div>
                                    </div>
                                </li>";
    }
?>