<?php
include '../../database.php';
if (isset($_POST['submit'])) {
    $school = $_POST['school'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $course = $_POST['course'];
    $lvl = $_POST['lvl'];
    $loc = $_POST['loc'];


    $sql = "INSERT INTO `educations`(schoolName, yearStart, yearEnd, level, course, location) VALUES ('$school','$start','$end','$course','$lvl','$loc')";

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
    <title>Education</title>
</head>

<body class="edtpage">
    <div class="container">
        <div>
            <div class="card2">
                <h3 class="edtitle">Education</h3>
                <form action="" method="post">
                    <table style="margin-left: 20px;">
                        <tr>
                            <td><label for="">School:</label></td>
                            <td><input class="form" type="text" name="school" placeholder="School Name"></td>
                        </tr>
                        <tr>
                            <td><label for="">Start Year:</label></td>
                            <td><input class="form" type="text" name="start"></td>
                        </tr>
                        <tr>
                            <td><label for="">End Year:</label></td>
                            <td><input class="form" type="text" name="end"></td>
                        </tr>
                        <tr>
                            <td><label for="">Level:</label></td>
                            <td><input class="form" type="text" name="lvl" placeholder="Primary, Secondary, Tertiary Etc."></td>
                        </tr>
                        <tr>
                            <td><label for="">Course:</label></td>
                            <td><input class="form" type="text" name="course"></td>
                        </tr>
                        <tr>
                            <td><label for="">Location:</label></td>
                            <td><input class="form" type="text" name="loc" placeholder="School Address"></td>
                        </tr>
                    </table>
                    <div style="padding-left: 30px;">
                        <button class="mainButton" type="submit" name="submit">Add</button>
                    </div>

            </div>
            </form>
        </div>

        <div>
            <br><br><br>
            <div style="display: flex; justify-content: center;">
                <table style="width: 60%;" class="educTable">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>School Name</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Level</th>
                            <th>Course</th>
                            <th>Location</th>
                            <th style="width: 60px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../../database.php';

                        $sql = "SELECT * FROM `educations`";
                        $result = mysqli_query($connect, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['schoolName'] ?></td>
                            <td><?php echo $row['yearStart'] ?></td>
                            <td><?php echo $row['yearEnd'] ?></td>
                            <td><?php echo $row['level'] ?></td>
                            <td><?php echo $row['course'] ?></td>
                            <td><?php echo $row['location'] ?></td>
                            <td style="text-align: right;">
                                <a href="del.php?id=<?php echo $row['id'] ?>"><button class="cancelButton">Delete</button></a>
                            </td>

                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>

                </table>
            </div>
        </div>
        <br>
        <div style="padding-left: 30px;"><a href="../index.php"> <button class="mainButton">Exit</button></a></div><br><br>

    </div>
    </div>


</body>

</html>