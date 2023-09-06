<?php
include "config/db_connect.php";

$sql = "SELECT * FROM users";
$statement = $pdo->prepare($sql);
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <title>user table</title>
    <style>
        img{
            width: 150px;
            height: 100px;
        }
    </style>
</head>
<body>
    <div class="container mt-5 w-50">
        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th>id</th>
                    <th>full_name</th>
                    <th>gender</th>
                    <th>phone</th>
                    <th>address</th>
                    <th>email</th>
                    <th>passport</th>
                </tr>
            </thead>

            <tbody>
            <?php foreach($users as $user){?>
                    <tr>
                        <td><?php echo $user['id'] ?></td>
                        <td><?php echo $user['full_name'] ?></td>
                        <td><?php echo $user['gender'] ?></td>
                        <td><?php echo $user['phone'] ?></td>
                        <td><?php echo $user['address'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo '<img src="uploads/'.$user['passport'].'" alt="">'  ?></td>
                    </tr>
            <?php
            } 
            ?>
        </tbody>

        </table>
    </div>
</body>
</html>