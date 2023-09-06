<?php
include "config/db_connect.php";
include "components/navbar.php";
$post_id = $_GET['id'];

// sql statement
$sql = "SELECT * FROM `post` WHERE id=$post_id";
$statement = $pdo->prepare($sql);
$statement->execute();
$post = $statement->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>dynamic page</title>
</head>
<body>
    <div class="container mt-5">
        <div class="text-center"><img src="uploads/<?php echo $post['passport'];?>" class="img-fluid w-50 h-50" alt=""></div>
        <h3 class="text-center text-primary"><?php echo $post['title']; ?></h3>
        <p class="lead text-center "><?php echo $post['body']; ?></p>
        <div class="text-center"> <a href="blog_post.php" class="btn btn-primary mb-3">Go to posts page</a></div>
      
    </div>

    <script src="assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script>
</body>
</html>