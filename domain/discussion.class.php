<?php 
	class discussion{
		private $discussionId;
		private $subject;
		private $initiator;
		private $description;
		private $comments=array(); //List of comments
		private $permission;
		private $tagged=array(); //Array of tagged users
		private $technologies=array(); //Array of related technologies
		
		//Construtors for discussion objects.
		function __construct($discussionId,$subject,$initiator,$description,$permission,$tagged,$technologies,$comments){
			$this->discussionId=$discussionId;
			$this->subject=$subject;
			$this->initiator=$initiator;
			$this->description=$description;
			$this->permission=$permission;
			$this->tagged=$tagged;
			$this->technologies=$technologies;
			$this->comments=$comments;
		}
		public function getDiscussionId(){
			return $this->discussionId;
		}
		public function setSubject($subject){
			$this->subject=$subject;
		}
		public function getSubject(){
			return $this->subject;
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
		public function setTagged($tagged){
			$this->tagged=$tagged;
		}
		public function getTagged(){
			return $this->tagged;
		}
		public function setTechnologies($technologies){
			$this->technologies=$technologies;
		}
		public function getTechnologies(){
			return $this->technologies;
		}
		public function setComments($comments){
			$this->comments=$comments;
		}
		public function getComments(){
			return $this->comments;
		}
		public function addTag($tag){
			
		}
		public function addTechnology($tech){
			
		}
	}
?>