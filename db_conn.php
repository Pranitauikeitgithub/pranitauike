<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'pranita';

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die('connection faile'.mysqli_connect_error());

}
// echo "connected succesfully";


?>