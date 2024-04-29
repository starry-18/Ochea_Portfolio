<?php
include '../../database.php';

// Initialize variables
$projectId = "";
$projectName = "";
$desc = "";

// Check if projectId is set (assuming it's passed via GET or POST)
if (isset($_GET['projectId'])) {
    $projectId = $_GET['projectId'];
    // Fetch project details from the database based on the projectId
    $sql = "SELECT * FROM `projects` WHERE `id` = $projectId";
    $result = mysqli_query($connect, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Assign project details to variables
        $projectName = $row['projectName'];
        $desc = $row['desc'];
        // You can also populate other fields here if needed
    } else {
        echo "Project not found";
    }
}

// Handle form submission
if (isset($_POST['submit'])) {
    $projectId = $_POST['id'];
    $projectName = $_POST['projectName'];
    $desc = $_POST['desc'];

    // Check if a new image is provided
    if (isset($_FILES['pictureRoute']) && $_FILES['pictureRoute']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['pictureRoute'];
        $image_tmp_name = $image['tmp_name'];
        $image_name = basename($image['name']);
        $target_dir = "../../assets/";
        $target_file = $target_dir . $image_name;
        // Upload new project image
        if (move_uploaded_file($image_tmp_name, $target_file)) {
            // Construct the SQL query to update the project
            $sql = "UPDATE `projects` SET `projectName` = '$projectName', `pictureRoute` = '$target_file', `desc` = '$desc' WHERE `id` = $projectId";
            $result = mysqli_query($connect, $sql);
            if ($result) {
                header("Location: edt.php?msg=data updated");
                exit();
            } else {
                echo "Failed to update project: " . mysqli_error($connect);
            }
        } else {
            echo "Failed to upload image";
        }
    } else {
        // If no new image is provided, update project without modifying the pictureRoute
        $sql = "UPDATE `projects` SET `projectName` = '$projectName', `desc` = '$desc' WHERE `id` = $projectId";
        $result = mysqli_query($connect, $sql);
        if ($result) {
            header("Location: edt.php?msg=data updated");
            exit();
        } else {
            echo "Failed to update project: " . mysqli_error($connect);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styles.css" rel="stylesheet" />
    <title>Edit Project</title>
</head>

<body>

    <div class="container">

        <div class="card2">
            <h3 class="edtitle">Edit Project</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="projectId" value="<?php echo $projectId; ?>">
                <table>
                    <tr class="formtable">
                        <td><label for="">Project Name:</label></td>
                        <td><input class="form" type="text" name="projectName" value="<?php echo $projectName; ?>"></td>
                    </tr>
                    <tr class="formtable">
                        <td><label for="">Description:</label></td>
                        <td><textarea class="form" rows="5" cols="100" name="desc"><?php echo $desc; ?></textarea></td>
                    </tr>
                    <tr class="formtable">
                        <td><label for="">Picture Route:</label></td>
                        <td><input class="form" type="file" name="pictureRoute"></td>
                    </tr>
                </table>
                <br>
                <div style="padding-left: 30px;">
                    <button class="mainButton" type="submit" name="submit">Update</button>
                </div>
            </form>
            <br>
            <a style="padding-left: 30px;" href="../prj/edt.php"><button class="cancelButton">Cancel</button></a>

        </div>
    </div>
</body>

</html>
