<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <title>view post</title>
</head>
<body>
<?php
        include_once "../myclasses/posts.php";
        $vobj = new Post();
        $viewposts= $vobj->viewPost($_GET['id']);

?>
    <div class="container-fluid">
        <div class="row">
    <div class="col-md-2 col-lg-2">
    <?php
    include_once "sidebar.php";
    ?>
    </div>
    <div class="col-10">
                <h1><?php echo $viewposts['caption'] ?></h1>
                <div class="col" style="border:1px solid black; height:200px; padding:10px">
                <p><?php echo $viewposts['content']?></p>
                </div>
                <p><b><i><?php echo $viewposts['author'] ?></i></b></p>

    
            </div>
        </div>
    </div>
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>   
</body>
</html>