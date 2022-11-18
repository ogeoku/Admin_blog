<?php
include_once "../myclasses/posts.php";
$cobj = new Post();
$output = $cobj->viewPost($_GET['id']);
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

$author = $_POST['author'];
$caption= $_POST['caption'];
$content= $_POST['content'];
$id= $_GET['id'];

$postobj = new Post();
$output2= $postobj->updatePost($author,$caption,$content,$id);
if ($output2 == 'success' || $output2 == 'nothing to update') {
    header("Location: post.php?msg=$output2");
    exit;
}else {
    $errors[]= $output2;
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
    <title>Edit post</title>
</head>
<body>
<div class="container-fluid">


    <div class="row justify-content-center" >
    <?php include_once "sidebar.php"; ?>
        <div class="col-6">
         
            <h1 class="text-center h2">Add Post</h1>
<div class="col-md-8 col-md-8 mb-4">
    <?php 
        if (isset($errors)) {
            foreach ($errors as $key => $value) {
                echo "<div class='text-danger'>$value</div>";
            }
        }
    
    ?>
<form action="editpost.php?id=<?php if (isset($_REQUEST['id'])) {
    echo $_REQUEST['id'];
} ?>" method="post" id="form">
            <div class="mb-3">
                <label id="author" name="author">Author</label>
                <input name="author" id="author" type="text" class="form-control" value="<?php if (isset($output['author'])) {
                    echo $output['author'];
                } ?>"/>
            </div>
            <div class="mb-3">
                <label id="caption" name="caption">Caption</label>
                <input name="caption" id="caption"  type="text" class="form-control" value="<?php if (isset($output['caption'])) {
                    echo $output['caption'];
                } ?>"/>
            </div>

            <div class="mb-3">
                <label id="content" name="content">Content</label>
                <textarea rows="5" cols="500" name='content' class="form-control" id="content"  maxlength="1000" style="resize:none"><?php if (isset($output['content'])) {
                    echo $output['content'];
                } ?></textarea>
            </div>

            <div class="mb-3">
                
                <input name="btn" id="btn" value="Update Post" class="btn btn-primary" type="submit"/>
            </div>
            </form>
        </div>
    </div>
</div>
</div>            



<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>    
</body>
</html>