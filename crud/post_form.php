<?php
include "config/db_connect.php";

if(isset($_POST['submit'])){

$title = $_POST['title'];
$body = $_POST['body'];

$sql_query = "INSERT INTO `post` (`title`,`body`) VALUES ('$title', '$body')";
$sql_query = $pdo->prepare($sql_query);
$sql_query->execute();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form to post</title>
    <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body>
   <div class="container m-auto w-50 mt-5">
   <div class="mb-3 text-center">
        <h3 class="text-primary">Posting to POST database from here!</h3>
    </div>
   <form action="" method="post">
        <input type="text" name="title" placeholder="title" class="form-control mb-3" required>
        <textarea name="body" id="" cols="30" rows="10" class="form-control mb-3" required placeholder="content"></textarea>
        <button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
    </form>
   </div>
</body>
</html>