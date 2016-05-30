<?php 
	class message{
		private $messageId;
		private $conversationId;
		private $from;
		
		//Constructor for message objects.
		function __construct($messageId,$conversationId,$from){
			$this->conversationId=$conversationId;
			$this->from=$from;
		}
		public function getConversationId(){
			return $this->conversationId;
		}
		public function getMessageId(){
			return $this->messageId;
		}
		public function setFrom($from){
			$this->from=$from;
		}
		public function getFrom(){
			return $this->from;
		}
	}
?>