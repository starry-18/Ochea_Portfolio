<?php
include '../../database.php';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $desc = $_POST['desc'];

    $image = $_FILES['image'];
    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];
    $image_size = $image['size'];
    $image_error = $image['error'];

    // Generate a unique name for the uploaded image
    $image_unique_name = uniqid('', true) . '-' . $image_name;

    // Move the uploaded image to the assets directory
    $target_dir = "../../assets/";
    $target_file = $target_dir . $image_unique_name;

    if (move_uploaded_file($image_tmp_name, $target_file)) {
        // Image uploaded successfully, now insert data into the database
        $sql = "INSERT INTO `projects` (projectName, `desc`, pictureRoute) VALUES ('$title', '$desc', '$image_unique_name')";
        $result = mysqli_query($connect, $sql);

        if ($result) {
            // Redirect to "../prj/edt.php" after creating a new project
header("Location: ../prj/edt.php?msg=New data created");
            exit(); // Ensure no further code execution after redirection
        } else {
            echo "Failed to insert data into database: " . mysqli_error($connect);
        }
    } else {
        echo "Failed to upload image.";
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
    <title>Projects</title>
</head>

<body class="edtpage">

    <div class="card2">

        <div>
            <div>
                <h3 class="edtitle">Projects</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <table style="margin-left: 20px;">
                        <tr>
                            <td><label for="">Project Name:</label></td>
                            <td><input class="form" type="text" name="title"></td>
                        </tr>
                        <tr>
                            <td><label for="">Description:</label></td>
                            <td><input class="form" type="text" name="desc"></td>
                        </tr>
                        <tr>
                            <td><label for="image">Image:</label></td>
                            <td><input type="file" name="image" id="image"></td>
                        </tr>
                    </table>
                    <br>
                    <div style="padding-left: 30px;">
                        <button class="mainButton" type="submit" name="submit">Add</button>
                    </div>

                </form>
            </div>
        </div>
        <div>
            <?php
            include '../../database.php';

            $sql = "SELECT * FROM `projects`";
            $result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($result) == 0) {
                echo 'No Data Yet';
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>


                    <div class="incontent">
                        <div style="margin-left: 20px;">
                            <div style="font-weight: bolder;">
                                <?php echo $row['projectName'] ?>
                            </div>
                            <?php echo $row['desc'] ?>
                            <div><img style="height:200px; width:auto; max-width:500px;" class="img-fluid" src="../../assets/<?php echo $row['pictureRoute'] ?>" alt="<?php echo $row['pictureRoute'] ?>" /></div>
                            <!--<a href="udte.php?id=<?php echo $row['id'] ?>"><button class="mainButton">Edit</button></a>-->
                            <a href="del.php?id=<?php echo $row['id'] ?>"><button class="cancelButton">Delete</button></a>
                        </div>
                    </div>

            <?php }
            } ?>
        </div>
        <br>
        <br>
        <div style="padding-left: 30px;"><a href="../index.php"> <button class="mainButton">Exit</button></a></div><br><br>

    </div>

    </div>


</body>

</html>