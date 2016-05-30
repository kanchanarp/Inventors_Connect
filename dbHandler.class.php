<?php

/**
 * Created by PhpStorm.
 * User: kanchanaR
 * Date: 23/05/2016
 * Time: 00:18
 */
namespace app;
require_once "functions.php";
include_once "dataAccess/userDb.class.php";
use \app\db\userDb;
class dbHandler
{
    public function connectDB(){
        global $connection;
        define("DB_HOST","localhost");
        define("DB_USER","root");
        define("DB_PASS","");
        define("DB_NAME","inventorsconnectdb");
        $connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if(mysqli_connect_errno()){
            die("Connection failed: ".mysqli_connect_error());
        }else{
            echo "Done";
            $user=new userDb();
            $user->create_user("test3","test3","test3","test3","2012-02-03",1,1);
        }
    }
}

$dbH=new dbHandler();
$dbH->connectDB();