<!-- displaying post from our database -->
<?php
/* linking our database connection to our post.php file
to gain access to to the database and
*/
include "config/db_connect.php";

// sql query
$sql = " SELECT * FROM `post` ";

// preparing our $sql query from $pdo 
$stmt = $pdo -> prepare($sql);

// execution of statement
$stmt -> execute();

/* fetch method is used to fetch one record while fetchAll is used to fetch all record
the fetchAll fetches this record either in an array or object using the following command
PDO::FETCH_ASSOC (fetching as an associative array)
*/
$posts = $stmt -> fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <title>post</title>
</head>
<body>
   <div class=" container mt-5 w-50 m-auto">
    
   <table class="table table-striped table-hover table-responsive">
    <!-- table head -->
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>body</th>
                <th>created</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($posts as $post){?>
                    <tr>
                        <td><?php echo $post['id'] ?></td>
                        <td><?php echo $post['title'] ?></td>
                        <td><?php echo $post['body'] ?></td>
                        <td><?php echo $post['create'] ?></td>
                    </tr>
            <?php
            } 
            ?>
        </tbody>
        
    </table>
   </div>
</body>
</html>