<?php
require 'db_conn.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pHP Crud</title>
</head>
<body>
      <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
        pHP Complete Crud Application

        
    </nav>
    <div class="container">
        <?php
        if(isset($_GET['msg'])){
            $msg = $_GET['msg'];
            echo '.$msg.';
        }

        ?>
        <a href="add_new.php" class="btn btn-dark">Add New</a>

    <table class="table table-hover text-center mb-3" id="TableForm" >
        <thead class="table-dark">
            <tr class="alert alert-info">
                <th scope="col">Sl no</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Action</th>
                
            </tr>
        </thead>
        <tbody>
                   
                    <?php
                    $sql = 'SELECT * FROM `crud`';
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                    <th><?php  echo $row['id']?></th>
                    <th><?php  echo $row['fname']?></th>
                    <th><?php  echo $row['lname']?></th>
                    <th><?php  echo $row['email']?></th>
                    <th><?php  echo $row['gender']?></th>

                    
                   
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>"><button class="btn btn-success">Edit</button></a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>"><button class="btn btn-danger">Delete</button></a>
                        </td>
                </tr>

                        <?php
                    }

 
                     ?>


        </tbody>
    </table>
</div>
    </div>

    
</body>
</html>