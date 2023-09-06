<?php
class Blog{

    // function for creating post
   public function createPost($data){
        include "../config/db_connect.php";
        $title = $data['title'];
        $body = $data['body'];
        $image_name = $data['passport'];
        $sql = "INSERT INTO post (title, body, passport) VALUES(?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $insert_post = $stmt->execute([$title, $body, $image_name]);
        return $insert_post;
    }


    //function to get all post
    public function getAllPost(){
        include "../config/db_connect.php";
        $sql = " SELECT * FROM `post` ORDER BY id DESC ";
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute();
        $posts = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        return $posts;

    }


    // function to get post by id
    public function getPostById($id){
        include "../config/db_connect.php";
        $sql = "SELECT * FROM `post` WHERE id=?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$id]);
        $posts = $statement->fetch(PDO::FETCH_ASSOC);
        return $posts;

    }


    // function to update post with images
    public function updatePostWithImage($title, $body, $image_name, $id){
        include "../config/db_connect.php";
        $update_sql = "UPDATE post SET title=?, body=?, passport=? WHERE id=?";
        $update_stmt =$pdo->prepare($update_sql);
        $update_post = $update_stmt->execute([$title, $body, $image_name, $id]);
        return $update_post;
    }

     // function to update post without images
     public function updatePostWithoutImage($data){
        include "../config/db_connect.php";
        $title = $data['title'];
        $body = $data['body'];
        $id = $data['id'];
        $update_sql = "UPDATE post SET title=?, body=? WHERE id=?";
        $update_stmt =$pdo->prepare($update_sql);
        $update_post = $update_stmt->execute([$title, $body, $id]);
        return $update_post;
        

    }


    // function to delete post
    public function deletePost($id){
        include "../config/db_connect.php";
        $sql = "DELETE FROM post WHERE id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt;

    }

}


?>
