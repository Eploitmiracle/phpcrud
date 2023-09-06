<?php
include "config/db_connect.php";

if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $addres = $_POST['address'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $gender = $_POST['gender'];

    // file upload handling
    $file = $_FILES['file']['name'];
    $targetpath = 'uploads/'. $file;
    move_uploaded_file($_FILES['file']['temp_name'], $targetpath);

    // inserting data into the database
    $sql = "INSERT INTO users (full_name, gender, phone, address, passport, email) VALUES($fullname, $gender, $tel, $address, $file, $email)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
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
        <h3 class="text-primary">Posting to USERS database from here!</h3>
    </div>
   <form action= "users.php"  method="post" enctype='multipart/form-data'>
        <input type="text" name="fullname" placeholder="full name" class="form-control mb-3" required>
         <input type="address" name="address" class="form-control mb-3" placeholder="state" required>
         <input type="email" name="email" class="form-control mb-3" placeholder="email" required>
         <input type="tel" name="tel" class="form-control mb-3" placeholder="telephone" required>
         <input type="file" class="form-control mb-3" required>
         <select name="gender" id="" class="form-control mb-3" required>
            <option value="" selected disabled>select gender</option>
            <option value="">male</option>
            <option value="">female</option>
            <option value="">custom</option>
         </select>
        <button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
    </form>
   </div>
</body>
</html>