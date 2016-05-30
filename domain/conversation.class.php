<?php 
	class conversation{
		private $conversationId;
		private $userList=array(); //users involved in the conversation
		
		//Construtors for conversation objects.
		function __construct($conversationId,$userList){
			$this->conversationId=$conversationId;
			$this->userList=$userList;
		}
		public function getConversationId(){
			return $this->conversationId;
		}
		public function setUserList($userList){
			$this->userList=$userList;
		}
		public function getUserList(){
			return $this->userList;
		}
	}
?>