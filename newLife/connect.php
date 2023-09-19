<?php 
$servername = 'localhost';
$user = 'root';
$password = '';
$dbname = 'contactlist';

$conn = mysqli_connect($servername, $user, $password, $dbname);

if(!$conn){
    die("Connection failed" . mysqli_connect_error());
} else {
    // echo 'Connected successfuly';
}
?>