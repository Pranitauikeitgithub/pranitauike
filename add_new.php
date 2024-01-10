<?php
include 'db_conn.php';
if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
   

    $sql = "INSERT INTO `crud`(`id`, `fname`, `lname`, `email`, `gender`) VALUES (NULL,'$fname','$lname','$email','$gender')";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location: index.php?msg=New Record Created successfully");

   }
   else{
    echo "Failed: " .mysqli_error($conn);
   }

}

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
        <div class="text-center mb-4" >
            <h3>Add new User</h3>
            <p class="text-muted">
                Complete the form below to add a new user
            </p>
        </div>
        <div class="container d-flex justify-content center">
            <form action="" method="post" style='width:50vm; min-width:300px;'>
            <div class="row">
                <div class="col">
                    <label class="form-label">first name</label>
                    <input type='fname' class="form-control" name='fname'>
                </div>
                &nbsp;

                <div class="col">
                    <label class="form-label">last name</label>
                    <input type='lname' class="form-control" name='lname'>
                </div>
                &nbsp;

                <div class="mb-3">
                    <label class="form-label">email</label>
                    <input type='email' class="form-control" name='email'>
                </div>
                &nbsp;

                <div class="col">
                    <label class="form-label">gender</label> &nbsp;
                    <input type='radio' class="form-control" name='gender'
                    id='male' value='male'>
                    <label for="male" class="form-input-lable">Male</label>
                    &nbsp;
                    <input type='radio' class="form-control" name='gender'
                    id='female' value='female'>
                    <label for="female" class="form-input-lable">Female</label>
                    &nbsp;
                </div>
                <div>
                 <button type="submiy" class="btn btn-success" name='submit'>Save</button> &nbsp;
                 <a href='index.php' class='btn btn-danger'>Cancel</a>
                </div>
            </div>

            </form>
        </div>
    </div>
</body>
</html>