<?php
	class document{
		private $documentId;
		private $documentName;
		private $path;
		private $owner;
		private $permission;
		private $viewerList=array(); //Users that are allowed to view this
		private $downloaderList=array(); //Users that are allowed to download this
		
		//Construtors for document objects.
		function __construct($documentId,$documentName,$path,$owner,$permission,$viewerList,$downloaderList){
			$this->documentId=$documentId;
			$this->documentName=$documentName;
			$this->path=$path;
			$this->owner=$owner;
			$this->permission=$permission;
			$this->viewerList=$viewerList;
			$this->downloaderList=$downloaderList;
		}
		public function getDocumentId(){
			return $this->documentId;
		}
		public function setDocumentName($documentName){
			$this->documentName=$documentName;
		}
		public function getDocumentName(){
			return $this->documentName;
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