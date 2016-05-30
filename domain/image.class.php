<?php
	class image{
		private $imageId;
		private $description;
		private $path;
		private $owner;
		private $permission;
		private $viewerList=array(); //Users that are allowed to view this
		private $downloaderList=array(); //Users that are allowed to download this
		
		//Construtors for image objects.
		function __construct($imageId,$description,$path,$owner,$permission,$viewerList,$downloaderList){
			$this->imageId=$imageId;
			$this->description=$description;
			$this->path=$path;
			$this->owner=$owner;
			$this->permission=$permission;
			$this->viewerList=$viewerList;
			$this->downloaderList=$downloaderList;
		}
		
		public function getimageId(){
			return $this->imageId;
		}
		public function setDescription($description){
			$this->description=$description;
		}
		public function getDescription(){
			return $this->description;
		}
		public function setPath($path){
			$this->path=$path;
		}
		public function getPath(){
			return $this->path;
		}
		public function setOwner($owner){
			$this->owner=$owner;
		}
		public function getOwner(){
			return $this->owner;
		}
		public function setPermission($permission){
			$this->permission=$permission;
		}
		public function getPermission(){
			return $this->permission;
		}
		public function setViewerList($viewerList){
			$this->viewerList=$viewerList;
		}
		public function getViewerList(){
			return $this->viewerList;
		}
		public function setDownloadList($downloaderList){
			$this->downloaderList=$downloaderList;
		}
		public function getDownloadList(){
			return $this->downloaderList;
		}
	}
?>