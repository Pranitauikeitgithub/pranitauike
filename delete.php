<?php
include 'db_conn.php';

$id = $_GET['id'];

$sql = "DELETE FROM `crud` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: index.php?msg=Record deleted successfully");
    exit(); // Ensure to stop script execution after a header redirect
} else {
    // Display a proper error message
    echo "Failed: " . mysqli_error($conn);
    http_response_code(500); // Set a proper HTTP response code for server error
}
?>
