$(function(){
	$(document).on("submit","#messageForm",function(){
		var message=$.trim($("#btn-input").val());
		var conversationId=$.trim($("#convId").val());
		if(message!="" && conversationId!=""){
			$.post("../control/ChatControl.php",{message: message,conversationId: conversationId},function(data){
				$("#chatBox").append(data);
			});
		}else{
			alert("No message to send");
		}
	});
	function getMessages(){
		$.get("../control/GetMessages.php",function(data){
			$.("#chatBox").html(data);
		});
	}
	setInterval(function(){
		getMessages();
	},500);
});