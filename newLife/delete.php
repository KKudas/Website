<?php
include 'connect.php';

if (isset($_POST['id'])) {
  $id = $_POST['id'];

  $sql = "DELETE FROM contact WHERE id = $id";

  if ($conn->query($sql) === TRUE) {
    echo "Contact deleted successfully!";
  } else {
    echo "Error deleting contact: " . $conn->error;
  }
}
?> 