<?php
include '../../database.php';

$id = $_GET['id'];
$sql = "DELETE FROM `hardskills` WHERE id = $id";

$result = mysqli_query($connect, $sql);
if ($result) {
    header("Location: edt.php?msg=data deleted");
} else {
    echo "Failed: " . mysqli_error($connect);
}
