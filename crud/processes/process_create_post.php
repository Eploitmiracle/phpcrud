<?php
if((isset($_POST['create'])) || (isset($_POST['update']))){
    session_start();
    require "../config/db_connect.php";
    $title = $_POST['title'];
    $body = $_POST['body'];
    $id = $_POST['id'];
    $image_name = $_FILES['image']['name'];
    $allowed_ext = ['png', 'jpg', 'jpeg', 'gif'];
    $image_size = $_FILES['image']['size'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_ext = explode('.', $image_name);
    $image_ext = strtolower(end($image_ext));
    $image_name = time().'.'.$image_ext;
    $target_dir = "../uploads/{$image_name}";

    // SQL Query to insert into database table post
    if(isset($_POST['create'])){

        if(!in_array($image_ext, $allowed_ext)){
            $_SESSION['error']="invalid file type";
            header('location:../create_post.php');
            exit();
        }

        if($image_size > 1000000){  //1000000 byte = 1mb
            $_SESSION['error']="file too large";
            header('location:../create_post.php');
            exit();
        }

    $sql = "INSERT INTO post (title, body, passport) VALUES(?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $insert_post = $stmt->execute([$title, $body, $image_name]);

    move_uploaded_file($image_tmp, $target_dir);

    if($insert_post){
        $_SESSION['success'] = "post has been created successfully";
        header('location:../blog_post.php');
    }else{
        $_SESSION['error'] = "insert a post";
        header('location:../create_post.php');  
    }
}


        // update sql statement
        if(isset($_POST['update'])){

            if(!empty($image_ext)){

                if(!in_array($image_ext, $allowed_ext)){
                    $_SESSION['error']="invalid file type";
                    header('location:../create_post.php');
                    exit();
                }
                if($image_size > 1000000){  //1000000 byte = 1mb
                    $_SESSION['error']="file too large";
                    header('location:../create_post.php');
                    exit();
                }
                
                $update_sql = "UPDATE post SET title=?, body=?, passport=? WHERE id=?";
                $update_stmt =$pdo->prepare($update_sql);
                $update_post = $update_stmt->execute([$title, $body, $image_name, $id]);
                move_uploaded_file($image_tmp, $target_dir);
            }else{
                
                $update_sql = "UPDATE post SET title=?, body=? WHERE id=?";
                $update_stmt =$pdo->prepare($update_sql);
                $update_post = $update_stmt->execute([$title, $body, $id]);
            }
            
        if($update_post){
            $_SESSION['success'] = "post has been updated successfully";
            header('location:../blog_post.php');
        }else{
            $_SESSION['error'] = "post not up";
            header('location:../create_post.php');  
        }
    }
    
    



// validation
// if(empty($title)){
//     $_SESSION['error'] = "enter a post";
//     header('location:../create_post.php');
// }
// if(count($title)===0){
//     $_SESSION['error'] = "enter a post";
//     header('location:../create_post.php');
    
// }

}



?>