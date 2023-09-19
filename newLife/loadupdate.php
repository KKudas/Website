<?php 
include 'connect.php';

if (isset($_POST['Update'])){
    $id = $_POST['rowID'];
    $lname = $_POST['lastName'];
    $fname = $_POST['firstName'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    // $sql = "UPDATE contact SET 'last_name'=$lname, 'first_name'=$fname, 'email'=$email, 'contact_num'=$contact WHERE id=$id";
    $sql = "UPDATE contact SET last_name='$lname', first_name='$fname', email='$email', contact_num='$contact' WHERE id=$id";
    
    $result = $conn->query($sql);

    if ($result == TRUE) {
        header("Location: index.php");
    }else{
        echo "Error:". $sql . "<br>". $conn->error;
    }
    
} else {
    echo 'not work';
}
?>