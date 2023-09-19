<?
include 'connect.php';
include 'submit.php';
include 'update.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1><center>CONTACT LIST</center></h1>
    <table>
        <thead>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                include "print.php";
            ?>
        </tbody>
    </table>

    <div id="update" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <?php
                include 'update.php';
            ?>
        </div>
    </div>

    <!-- MODAL -->
    <button id="myBtn">Add</button>
    
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form  method="POST">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name ="lastName"><br>
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName"><br>
                <label for="email" >Email:</label>
                <input type="text" id="email" name="email" required><br>
                <label for="contact">Contact Number:</label>
                <input type="text" id="contact" name="contact"><br>

                <input type="submit" name="submit" id="sub" onclick="validate()">
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>