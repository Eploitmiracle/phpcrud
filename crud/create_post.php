<?php
include "config/db_connect.php";
include "components/navbar.php";
session_start();


if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM post WHERE id=$id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['$id']);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>create post</title>
</head>
<body>
   <div class="container mt-5">

   <div class="mt-3 mb-3" ><?php 
    if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }

    ?></div>
    
    <div class="row">
        <div class="col-md-2"></div>
        <!-- form section -->
        <div class="col-md-8">
            <form method="post" action="processes/process_create_post.php" enctype="multipart/form-data"> 
                <input type="text" name="id" value="<?php if(!empty($post['id'])){ echo $post['id'];};?>" hidden >
                <input type="text" name="title" placeholder="title" class="form-control" value="<?php if(isset($_GET['id'])){echo $post['title'];} ?>"><br>
                <textarea name="body" id="" cols="30" rows="10" placeholder="body" class="form-control mb-3"><?php if(isset($_GET['id'])){echo $post['body'];}?></textarea><br>
                <input type="file" name="image" class="form-control"><br>
                <?php if(isset($_GET['id'])){?>
                <button type="submit" name="update" class="btn btn-primary form-control">Update Post</button>
                <?php }else{?>
                <button type="submit" name="create" class="btn btn-primary form-control">Create Post</button>
                <?php }?>
            </form>
        </div>


    </div>
   </div>

   <script src="assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script>
</body>
</html>