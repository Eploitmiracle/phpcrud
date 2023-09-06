
<?php
session_start();
include "config/db_connect.php";
include "components/navbar.php";

$sql = " SELECT * FROM `post` ORDER BY id DESC ";
$stmt = $pdo -> prepare($sql);
$stmt -> execute();
$posts = $stmt -> fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Blog post</title>
   
</head>
<body>
   <div class=" container mt-5  m-auto">
    <div class="text-center">
        <p class="h2 text-primary mb-5">posts page in cards</p>
    </div>
    <div class="alert alert-success alert-dismissible fade show mb-5" role="alert" ><?php 
    if(isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }

    ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    <!-- posts in card -->
    <div class="row g-4 mb-5">
    <?php foreach($posts as $post){?>
        <div class="col-md-6 col-lg-4 col-sm-12">
            <div class="card h-100 w-100 text-center">
                <div class="card-body">
                    <img src="uploads/<?php echo $post['passport'];?>" class="img-fluid" alt="">
                    <h4 class="card-title"><?php echo $post['id']; ?></h4>
                    <h4 class="card-title"><?php echo $post['title']; ?></h4>
                    <p class="card-text text-truncate"><?php echo $post['body']; ?></p>
                    <a href="dynamic_post_page.php?id=<?php echo $post['id']; ?>" class="btn btn-primary">Read more</a>
                    <a href="processes/delete.php?id=<?php echo $post['id'];?>" class="btn btn-danger">Delete</a>
                    <a href="create_post.php?id=<?php echo $post['id'];?>" class="btn btn-warning">Update</a>
                    <p class="card-text"><?php echo $post['create']; ?></p>
                </div>
            </div>
        </div>
        <?php
            } 
            ?>
    </div>
       
   </div>

   <script src="assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script>
</body>
</body>
</html>