<?php
include '../../database.php';
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $perc = $_POST['perc'];


    $sql = "INSERT INTO `hardskills`(skillName,lvl) VALUES ( '$title','$perc')";

    $result = mysqli_query($connect, $sql);
    if ($result) {
        header("Location: edt.php?msg=New data created");
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
    <title>Skills</title>
</head>

<body class="edtpage">
    <div class="card2">
        <div>
            <div>
                <h3 class=" edtitle">Hard Skills</h3>
                <form action="" method="post">
                    <table style="margin-left: 20px;">
                        <tr>
                            <td><label for="">Skill Name:</label></td>
                            <td><input class="form" type="text" name="title"></td>
                        </tr>
                        <tr>
                            <td><label for="">Percent:</label></td>
                            <td><input class="form" type="text" name="perc" placeholder="1 - 100"></td>
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

            $sql = "SELECT * FROM `hardskills`";
            $result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($result) == 0) {
                echo 'No Data Yet';
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>


                    <div class="incontent">

                        <div style="margin-left: 20px;">

                            <span style="font-weight: bolder;">
                                <?php echo $row['skillName'] ?>
                            </span> |
                            <?php echo $row['lvl'] ?>%
                            <br>
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