<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <title>Dashboard</title>
</head>
<body>
<main>
<div class="container">
    <div class="row">
        <?php include_once "sidebar.php"; ?>
        <div class="col-md-8 col-lg-8" style="padding:1px">
            
            <!-- Icon Cards-->
        <div class="row justify-content-center">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="mr-5">POSTS</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="post.php">
                <span class="float-left">View Details</span>
              </a>
            </div>
          </div>


          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="mr-5">COMMENTS</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
              </a>
            </div>
          </div>
       
        </div>
          
            </div>
    </div>
    
        </main>
        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>    
</body>
</html>