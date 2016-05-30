<?php 
	class comment{
		private $commentId;
		private $discussionId;
		private $initiator;
		private $description;
		private $permission;
		
		//Construtors for comment objects.
		function __construct($commentId,$discussionId,$initiator,$description,$permission){
			$this->commentId=$commentId;
			$this->discussionId=$discussionId;
			$this->initiator=$initiator;
			$this->description=$description;
			$this->permission=$permission;
		}
		public function getCommentId(){
			return $this->commentId;
		}
		public function getDiscussionId(){
			return $this->discussionId;
		}
		public function getInitiator(){
			return $this->initiator;
		}
		public function setDescription($description){
			$this->description=$description;
		}
		public function getDescription(){
			return $this->description;
		}
		public function setPermission($permission){
			$this->permission=$permission;
		}
		public function getPermission(){
			return $this->permission;
		}
	}
?>