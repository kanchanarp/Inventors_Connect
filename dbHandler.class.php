<?php

/**
 * Created by PhpStorm.
 * User: kanchanaR
 * Date: 23/05/2016
 * Time: 00:18
 */
include_once "$_SERVER[DOCUMENT_ROOT]/ProjectSE/dataAccess/userDb.class.php";
class dbHandler
{
	private static $connection=NULL;
    public function connectDB(){
		
		if(self::$connection==NULL){
			define("DB_HOST","localhost");
			define("DB_USER","root");
			define("DB_PASS","");
			define("DB_NAME","inventorsconnectdb");
			self::$connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		}
        if(mysqli_connect_errno()){
            die("Connection failed: ".mysqli_connect_error());
        }else{
            //echo "Done";
        }
    }
	public function getConnection(){
		$this->connectDB();
		return self::$connection;
	}
}
		$user=new userDb();
		$us=$user->find_user_by_username("test");

?>
