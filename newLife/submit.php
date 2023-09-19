<?php 
include 'connect.php';

if (isset($_POST['submit'])){
    $lname = $_POST['lastName'];
    $fname = $_POST['firstName'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    $check = "SELECT email FROM contact WHERE email = '$email'";
    $search = mysqli_query($conn, $check);
    if(mysqli_num_rows($search)>0){
        echo '<script>alert("Email already exists!"); window.location.href = "index.php";</script>';
    } else {
        $sql = "INSERT INTO contact (first_name, last_name, email, contact_num)
        VALUES ('$fname', '$lname', '$email', '$contact')";

        $result = $conn->query($sql);

        if ($result == TRUE) {
            header("Location: index.php");
        }else{
            echo "Error:". $sql . "<br>". $conn->error;
        }
    }

    
} else {
    // echo 'not work';
}
?>