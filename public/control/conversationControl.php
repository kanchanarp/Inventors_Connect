<?php
include_once "../../controller/messageHandler.class.php";
$messageHandler=new messageHandler();
if(isset($_POST["conversationName"])){
    $conversationId=$messageHandler->newConversation($_POST["conversationName"],null);
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
}
?>