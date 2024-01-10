<?php
include 'db_conn.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id']; // Added line to get the id from the form
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "UPDATE `crud` SET `fname`='$fname',`lname`='$lname',`email`='$email',`gender`='$gender' WHERE id = $id ";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?msg=Record updated successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Crud</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
        Edit Information
    </nav>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Click update</h3>
            <p class="text-muted">

            </p>
        </div>

        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content center">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style='width:50vm; min-width:300px;'>
                <!-- Added hidden input field to store the id -->
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                <div class="row">
                    <div class="col">
                        <label class="form-label">First name</label>
                        <input type='text' class="form-control" name='fname' value="<?php echo $row['fname']; ?>">
                    </div>
                    &nbsp;

                    <div class="col">
                        <label class="form-label">Last name</label>
                        <input type='text' class="form-control" name='lname' value="<?php echo $row['lname']; ?>">
                    </div>
                    &nbsp;

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type='email' class="form-control" name='email' value="<?php echo $row['email']; ?>">
                    </div>
                    &nbsp;

                    <div class="col">
                        <label class="form-label">Gender</label> &nbsp;
                        <input type='radio' class="form-control" name='gender' id='male' value='male' <?php echo ($row['gender'] == 'male') ? "checked" : ""; ?>>
                        <label for="male" class="form-input-lable">Male</label>
                        &nbsp;
                        <input type='radio' class="form-control" name='gender' id='female' value='female' <?php echo ($row['gender'] == 'female') ? "checked" : ""; ?>>
                        <label for="female" class="form-input-lable">Female</label>
                        &nbsp;
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" name='submit'>Save</button> &nbsp;
                        <a href='index.php' class='btn btn-danger'>Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
