<?php
include '../../database.php';

$id = $_GET['id'];
$sql = "DELETE FROM `projects` WHERE id = $id";

$result = mysqli_query($connect, $sql);
if ($result) {
    header("Location: edt.php?msg=data deleted");
} else {
    echo "Failed: " . mysqli_error($connect);
}
