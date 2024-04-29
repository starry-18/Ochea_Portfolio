<?php
include '../../database.php';

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $abtmeshrt = $_POST['abtmeshrt'];
    $abtme = $_POST['abtme'];
    $eml = $_POST['eml'];
    $cnt = $_POST['cnt'];
    $prof = $_POST['prof'];

    $image1 = $_FILES['avatar'];
    $image_tmp_name1 = $image1['tmp_name'];
    $image_size1 = $image1['size'];
    $image_error1 = $image1['error'];

    // Upload new avatar
    $target_dir = "../../assets/";
    if ($image_error1 === UPLOAD_ERR_OK) {
        $target_file1 = $target_dir . "profile.png";
        if (file_exists($target_file1)) {
            unlink($target_file1);
        }
        move_uploaded_file($image_tmp_name1, $target_file1);
    } else {
        echo "Failed to upload image: " . $image_error1;
    }

    // Upload new CV (PDF file)
    $cv_file = $_FILES['cv_file'];
    $cv_tmp_name = $cv_file['tmp_name'];
    $cv_name = basename($cv_file['name']);
    $target_cv_path = "";
    if ($cv_name !== "") {
        $target_cv_path = $target_dir . $cv_name;
        move_uploaded_file($cv_tmp_name, $target_cv_path);
    }

    $sql = "UPDATE `mydetail` SET `firstName`='$fname',`midName`='$mname',`lastName`='$lname',`aboutMeShort`='$abtmeshrt',`aboutMeFull`='$abtme',`email`='$eml',`contact`='$cnt',`profession`='$prof', `cv_path`='$target_cv_path' WHERE id=1";

    $result = mysqli_query($connect, $sql);
    if ($result) {
        header("Location: ../index.php?msg=data updated");
    } else {
        echo "Failed: " . mysqli_error($connect);
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
    <title>Admin Detail</title>
</head>

<body>

    <div class="container">

        <?php
        $sql = "SELECT * FROM `mydetail` WHERE id = 1";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="card2">
            <h3 class="edtitle">Admin Detail</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr class="formtable">
                        <td><label for="">First Name:</label></td>
                        <td><input class="form" type="text" name="fname" value="<?php echo $row['firstName'] ?>"></td>
                    </tr>
                    <tr class="formtable">
                        <td><label for="">Middle Initial:</label></td>
                        <td><input class="form" type="text" name="mname" value="<?php echo $row['midName'] ?>"></td>
                    </tr>
                    <tr class="formtable">
                        <td><label for="">Last Name:</label></td>
                        <td><input class="form" type="text" name="lname" value="<?php echo $row['lastName'] ?>"></td>
                    </tr>

                    <tr class="formtable">
                        <td><label for="">Contact</label></td>
                        <td><input class="form" type="text" name="cnt" value="<?php echo $row['contact'] ?>"></td>
                    </tr>
                    <tr class="formtable">
                        <td><label for="">Email:</label></td>
                        <td> <input class="form" type="text" name="eml" value="<?php echo $row['email'] ?>"></td>
                    </tr>
                    <tr class="formtable">
                        <td><label for="">About Me(Short):</label></td>
                        <td><textarea rows="5" cols="100" type="text" name="abtmeshrt" ?><?php echo $row['aboutMeShort'] ?></textarea></td>
                    </tr>
                    <tr class="formtable">
                        <td><label for="">About Me:</label></td>
                        <td><textarea rows="5" cols="100" type="text" name="abtme" ?><?php echo $row['aboutMeFull'] ?></textarea></td>
                    </tr>
                    <tr class="formtable">
                        <td><label for="">Profession:</label></td>
                        <td> <input class="form" type="text" name="prof" value="<?php echo $row['profession'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Avatar:</td>
                        <td> <img style=" height:200px; width:auto; max-width:500px;" class="img-fluid" src="../../assets/profile.png" alt="..." /></td>
                        <td><input type="file" name="avatar" id="image"></td>
                    </tr>
                    <tr class="formtable">
                        <td><label for="">Curriculum Vitae:</label></td>
                        <td>
                            <input class="form" type="file" name="cv_file" accept=".pdf">
                        </td>
                    </tr>
                </table>
                <br>
                <div style="padding-left: 30px;">
                    <button class="mainButton" type=" submit" name="submit">Save</button>

                </div>
            </form>
            <br>
            <a style="padding-left: 30px;" href=" ../index.php"><button class="cancelButton">Cancel</button></a>

        </div>
    </div>
</body>

</html>