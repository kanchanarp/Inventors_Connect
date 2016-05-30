<?php 
	class technology{
		private $TechId;
		private $keyWords=array(); //Array of keywords. i.e.: Electronic, Tronic.
		private $description;
		
		//The constrautor for technology objects
		function __construct($TechId,$keyWords,$description){
			$this->TechId=$TechId;
			$this->keyWords=$keyWords;
			$this->description=$description;
		}
		
		//Getters and setters.
		public function getTechId(){
			return $this->TechId;
		}
		public function setDescription($description){
			$this->description=$description;
		}
		public function getDiscription(){
			return $this->description;
		}
		public function setKeyWord($keyWords){
			$this->keyWords=$keyWords;
		}
		public function getKeyWord(){
			return $this->keyWords;
		}
	}
?>