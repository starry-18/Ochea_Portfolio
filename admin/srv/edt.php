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

    $sql = "INSERT INTO `services`(serviceName, `desc`, pictureRoute) VALUES ('$title', '$desc', '$image_name')";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        header("Location: edt.php?msg=New data created");
    } else {
        echo "Failed: " . mysqli_error($connect);
    }

    if ($image_error === UPLOAD_ERR_OK) {
        $target_dir = "C:/xampp/htdocs/julWeb/assets/";
        $target_file = $target_dir . basename($image_name);
        move_uploaded_file($image_tmp_name, $target_file);
    } else {
        echo "Failed to upload image: " . $image_error;
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
    <title>Services</title>
</head>

<body class="edtpage">

    <div class="card2">

        <div>
            <div>
                <h3 class="edtitle">Services</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <table style="margin-left: 20px;">
                        <tr>
                            <td><label for="">Service Name:</label></td>
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

            </div>
            </form>
        </div>
        <div>
            <?php
            include '../../database.php';

            $sql = "SELECT * FROM `services`";
            $result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($result) == 0) {
                echo 'No Data Yet';
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>


                    <div class="incontent">
                        <div style="margin-left: 20px;">
                            <div style="font-weight: bolder;">
                                <?php echo $row['serviceName'] ?>
                            </div>
                            <?php echo $row['desc'] ?>
                            <div><img style="height:200px; width:auto; max-width:500px;" class="img-fluid" src="../../assets/<?php echo $row['pictureRoute'] ?>" alt="<?php echo $row['pictureRoute'] ?>" /></div>

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