<?php
 
include_once "constants.php";
class Database {
   var $id;
   var $name;
   var $username;
   var $password;
   var $status;
   var $author;
   var $caption;
   var $content;
   var $dbcon; //database controller handler

   // member functions
   public function __construct(){
    $this->dbcon = new MySQLi(DB_HOST, DB_USERNAME, DB_PASSWORD,DB_DATABASE_NAME);

    if($this->dbcon->connect_error){
        die("connection failed".$this->dbcon->connect_error);
    }
    return $this->dbcon;
}
}