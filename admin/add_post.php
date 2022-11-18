<?php
 if (isset($_POST['btn'])) {
  
  // form validate
  $errors = array();

  if (empty($_POST['author'])) {
   $errors[] = "Author is Required";
  }
  if (empty($_POST['caption'])) {
    $errors[] = "Caption is Required";
   }
   if (empty($_POST['content'])) {
    $errors[] = "Content is Required";
}
	

include_once "../myclasses/posts.php";
   $cobj = new Post();
   $output = $cobj->insertPost($_POST['author'],$_POST['caption'],$_POST['content']);
   

if ($output == 'success') {
	$msg= "success";
		header("Location: post.php?msg=$msg");
		exit();
	}else {
		$errors[] =$output;
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
    <title>Add post</title>
</head>
<body>
<div class="container-fluid">


    <div class="row justify-content-center" >
    <?php include_once "sidebar.php"; ?>
        <div class="col-6">
         
            <h1 class="text-center h2">Add Post</h1>
            
            <form action="" method="post" id="form">
            <div class="mb-3">
                <label id="author" name="author">Author</label>
                <input name="author" id="author" type="text" class="form-control"/>
            </div>
            <div class="mb-3">
                <label id="caption" name="caption">Caption</label>
                <input name="caption" id="caption"  type="text" class="form-control"/>
            </div>

            <div class="mb-3">
                <label id="content" name="content">Content</label>
                <textarea rows="5" cols="400" name='content' class="form-control" id="content"  maxlength="1000" style="resize:none"></textarea>
            </div>

            <div class="mb-3">
                
                <input name="btn" id="btn" value="Add Post" class="btn btn-primary" type="submit"/>
            </div>
            </form>
        </div>
    </div>
</div>


<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>    
</body>
</html>