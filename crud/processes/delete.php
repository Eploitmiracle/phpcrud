<?php
if(isset($_GET['id'])){
    require "../config/db_connect.php";
    $id = $_GET['id'];

    $sql = "DELETE FROM `post` WHERE id=$id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    header('location: ../blog_post.php');
}

 
?>