<?php
session_start();
if(isset($_SESSION['id'])){
    header("location: dashboard.php");
}
if(isset($_POST['btn'])){
     
    // validation of form
    $myerr = array();
    if(empty($_POST['username'])){
      $myerr[]= "Username field cannot be empty";
    }
    if(empty($_POST['password'])){
      $myerr[]= "Password field cannot be empty";
    }
 
    if(empty($myerr)){

    include_once("../myclasses/blog.php");
    

    $userobj = new User();
    
    $output = $userobj->login($_POST['username'], $_POST['password']);

    if($output == false) {
      $myerr[]= "Invalid username or password";
    }else{
    
      header("Location: dashboard.php");
      exit();
    }
  }else{

  }
}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <title>admin login</title>
    
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center" style="height:100px;padding:100px">
        <div class="col-6">
         
            <h1 class="text-center h2">Login form</h1>
            <?php

            if(isset($myerr)) {
            foreach ($myerr as $key => $value) {
            echo "<div class='text-danger'>$value</div>";
            }

            }
            
        ?> 
            <form action="" method="post" id="form">
            <div class="mb-3">
                <label id="username" name="username">Username</label>
                <input name="username" id="username" type="text" class="form-control"/>
            </div>
            <div class="mb-3">
                <label id="password" name="password">Password</label>
                <input name="password" id="password"  type="password" class="form-control"/>
            </div>

            <div class="mb-3">
                
                <input name="btn" id="btn" value="Login" class="btn btn-primary" type="submit"/>
            </div>
            </form>
        </div>
    </div>
</div>




<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>    
</body>
</html>