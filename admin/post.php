<?php
    include_once "../myclasses/posts.php";
if(isset($_GET['id'])){
    $postobj = new Post;
    $output = $postobj->deletePost($_GET['id']);

    if ($output == true) {
        $status ="success";
        $msg ="post was successfully deleted";

        header("Location: post.php");
        exit;
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
    <title>posts</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
    <div class="col-md-2 col-lg-2">
    <?php
    include_once "sidebar.php";
    ?>
    </div>
        <div class="col-md-10 col-lg-10">
            <h1 class="mt-4 mb-3">
            <small>All Posts</small>
        </h1>
        <a href="add_post.php" class="btn btn-primary mb-3"> Add Post </a>
        <?php
            if (isset($_REQUEST['btn'])) {
               ?>
               <div class="alert alert-success">
                <p><?php if (isset($_REQUEST['msg'])) {
                    echo $_REQUEST['msg'];
                } ?></p>
               </div>
               <?php
            }
        ?>
<div class="table-responsive">
<table class ="table">

<thead>
    <tr>
        <th>#</th>
        <th>Authors</th>
        <th>Captions</th>
        <th>Contents</th>
        <th>Action</th>
</tr>
</thead>
<tbody>
    <?php
        include_once "../myclasses/posts.php";
        $obj = new Post();
        $posts= $obj->getAllPost();

        
        
        if (count($posts) > 0) {
            $kounter = 0;
            foreach ($posts as $key => $item) {
?>
    <tr>
        <td><?php echo ++$kounter ?></td>
        
        <td class="w-25"><?php echo $item['author'] ?></td>
        <td class="w-25"><?php echo $item['caption'] ?></td>
        <td class="w-25"><p class="text-wrap">
        <?php echo substr($item['content'],0,50) ?>
        </p></td>
        <td class="w-75">
                <a href="viewpost.php?id=<?php echo $item['id'] ?>" class= "btn btn-primary btn-sm">view</a>
                <a href="editpost.php?id=<?php echo $item['id'] ?>" class= "btn btn-primary btn-sm">Edit</a>
                <a href="post.php?id=<?php echo $item['id'] ?>" class= "btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
        </td>
    </tr>
<?php
            }
        }

    ?>

        </tbody>


     
</table>
</div>
</div>
</div>

</div>

<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
function myFunction() {
let text;
if (confirm("Are you sure you want to delete this post?") == true) {
    text = "<div class='text-success'>You have successfully deleted this post</div>";
  } else {
    text = "<div class='text-success'>You cancelled";
  }
  document.getElementById("demo").innerHTML = text;
}
</script>   
</body>
</html>