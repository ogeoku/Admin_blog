<?php
require_once "database.php";

class User extends Database{
   // member variables  

#start user login method
public function login($username,$password){
    
    //prepare statement
    $stmt = $this->dbcon->prepare("SELECT * FROM admin WHERE username=?");
    //bind
    $stmt->bind_param("s",$username);
    //execute
    $stmt->execute();
    //get result set
    $result = $stmt->get_result();
    //check if email exists
    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        if(password_verify($password, $row['password'])){
            
            //create session variables
           
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['status']= $row['status'];
            
           
            return true;
        }else{
            return false;
        }
    }else{
       
        return false;
    }
}
#end user login method

#start log out method

    function logout(){
        session_start();
        session_destroy();
    
        //redirect
        header("Location: index.php");
        exit();



}
#end log out method






}


?>