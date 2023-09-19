<?php
include 'connect.php';

if (isset($_POST['id'])) {
   $id = $_POST['id'];

    $sql = "SELECT * FROM contact WHERE id = $id";
    $check = mysqli_query($conn, $sql);

    if(!$check){
        die('Could not get data: ' . mysqli_error($conn));

    } else {

        $find = mysqli_fetch_array($check, MYSQLI_ASSOC);
        
        $first_name = $find['first_name'];
        $last_name = $find['last_name'];
        $showEmail = $find['email'];
        $contacts = $find['contact_num'];
?>  
        <!-- CONTENTS HERE -->
        <form action ="loadupdate.php" method="POST">
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name ="lastName" value="<?php echo $last_name;?>"><br>
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" value="<?php echo $first_name;?>"><br>
            <label for="email" >Email:</label>
            <input type="text" id="email" name="email" value="<?php echo $showEmail;?>" required><br>
            <label for="contact">Contact Number:</label>
            <input type="text" id="contact" name="contact" value="<?php echo $contacts;?>"><br>
            <p id="rowID" name="rowID" value="<?php echo $id;?>" style="display: none;"></p>

            <input type="submit" name="update" id="update" value="Update">
        </form>

    <?php
        }
    } else {
        echo "not work";
    }
?> 