<?php
include 'connect.php';
$sqlquery = "SELECT * FROM contact ORDER BY last_name ASC";
$retvval = mysqli_query($conn, $sqlquery);

if (!$retvval) {
    die('Could not get data: ' . mysqli_error($conn));
}

while ($row = mysqli_fetch_array($retvval, MYSQLI_ASSOC)) {
?>
    <tr>
        <td><?php echo $row['last_name']; ?></td>
        <td><?php echo $row['first_name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['contact_num']; ?></td>
        <td>
            <button class="button updateBtn" data-id="<?php echo $row['id']?>">Update</button>
            <button class="button deleteBtn" data-id="<?php echo $row['id']?>">Delete</button>
        </td>
    </tr>
<?php
}
?>