<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet" />
    <title>Admin Panel</title>
</head>

<body>
    <Div>
        <div>
            <div class="mainTitle">CONTENT MANAGEMENT <span>SYSTEM</span> </div>
        </div>

        <div style="margin-left: 200px; margin-right: 200px; margin-top: 20px; margin-bottom: 50px;">
            <div class="card">
                <div class="subTitle">ABOUT ME</div>
                <div class="content">



                    <?php
                    include '../database.php';

                    $sql = "SELECT * FROM `mydetail`";
                    $result = mysqli_query($connect, $sql);
                    if (mysqli_num_rows($result) == 0) {
                        echo 'No Data Yet';
                    } else {
                        $row = mysqli_fetch_assoc($result);
                    }
                    ?>

                    <table>
                        <tbody>
                            <tr>
                                <td>Name:</td>
                                <td><?php echo $row['firstName'] ?> <?php echo $row['midName'] ?> <?php echo $row['lastName'] ?></td>
                            </tr>
                            <tr>
                                <td>Contact:</td>
                                <td> <?php echo $row['contact'] ?></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><?php echo $row['email'] ?></td>
                            </tr>
                            <tr>
                                <td>About me(short):</td>
                                <td><?php echo $row['aboutMeShort'] ?></td>
                            </tr>
                            <tr>
                                <td>About me:</td>
                                <td><?php echo $row['aboutMeFull'] ?></td>
                            </tr>
                            <tr>
                                <td>Profession:</td>
                                <td><?php echo $row['profession'] ?></td>
                            </tr>
                            <tr>
                                <td>Avatar:</td>
                                <td> <img style=" height:200px; width:auto; max-width:500px;" class="img-fluid" src="../assets/profile.png" alt="..." /></td>
                            </tr>
                            <tr>
                                <td>Curriculum Vitae:</td>
                                <td><?php echo $row['cv_path'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <div>
                        <a href="abtMe/edt.php"><button class="mainButton">Edit</button></a>
                    </div>
                    <br>
                </div>
            </div>
            <div class="card">
                <div class="subTitle">EDUCATION</div>
                <div class="content">

                    <table class="educTable">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>School Name</th>
                                <th>Start</th>
                                <th>End</th>
                                <th> Level</th>
                                <th>Course</th>
                                <th>Location</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../database.php';

                            $sql = "SELECT * FROM `educations`";
                            $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                </tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['schoolName'] ?></td>
                                <td><?php echo $row['yearStart'] ?></td>
                                <td><?php echo $row['yearEnd'] ?></td>
                                <td><?php echo $row['level'] ?></td>
                                <td><?php echo $row['course'] ?></td>
                                <td><?php echo $row['location'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>

                    </table>
                    <br>
                    <div>
                        <a href="educ/edt.php"><button class="mainButton">Edit</button></a>
                    </div>


                    <br>
                </div>
            </div>
            <div class="card">
                <div class="subTitle">PORTFOLIO</div>
                <div style="font-size: 18px; font-weight: bold; color: #0e2954;">Services</div>
                <div class="content">
                    <?php
                    include '../database.php';

                    $cnt = 0;
                    $sql = "SELECT * FROM `services`";
                    $result = mysqli_query($connect, $sql);
                    if (mysqli_num_rows($result) == 0) {
                        echo 'No Data Yet';
                    } else {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $cnt++;
                    ?>
                            <div>
                                <div>
                                    <div>
                                        <img style=" height:200px; width:auto; max-width:500px;" class="img-fluid" src="../assets/<?php echo $row['pictureRoute'] ?>" alt="..." />
                                    </div>
                                    <div>ID: <?php echo $row['id'] ?>
                                    </div>
                                    <div style="font-weight: bolder;">
                                        Name: <?php echo $row['serviceName'] ?>
                                    </div>
                                    <div>
                                        Description: <?php echo $row['desc'] ?>
                                    </div>
                                </div>
                                <div style="background-color:  #d8d3d3; width: 100%; height: 2px;"> </div>

                            </div>
                    <?php }
                    } ?>
                    <br>
                    <div>
                        <a href="srv/edt.php"><button class="mainButton">Edit</button></a>
                    </div>
                    <br>


                    <br>
                </div>
                <div style="font-size: 18px; font-weight: bold; color: #0e2954;">Projects</div>
                <div class="content">
                    <?php
include '../database.php';

$cnt = 0;
$sql = "SELECT * FROM `projects`";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) == 0) {
    echo 'No Data Yet';
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        $cnt++;
?>
        <div>
            <div>
                <!-- Display image -->
                <img style="height: 200px; width: auto; max-width: 500px;" class="img-fluid" src="../assets/<?php echo $row['pictureRoute'] ?>" alt="Project Image" />
            </div>
            <div>ID: <?php echo $row['id'] ?></div>
            <div style="font-weight: bolder;">Name: <?php echo $row['projectName'] ?></div>
            <div>Description: <?php echo $row['desc'] ?></div>
        </div>
        <div style="background-color: #d8d3d3; width: 100%; height: 2px;"></div>
<?php
    }}?>
                    
                    <br>
                    <div>
                        <a href="prj/edt.php"><button class="mainButton">Edit</button></a>
                    </div>
                    <br>
                </div>

            </div>
            <div class="card">
                <div class="subTitle">SKILLS</div>
                <div style="font-size: 18px; font-weight: bold; color: #0e2954;">Professional Skills</div>
                <div class="content">
                    <?php
                    include '../database.php';
                    $cnt = 0;
                    $sql = "SELECT * FROM `proskills`";
                    $result = mysqli_query($connect, $sql);
                    if (mysqli_num_rows($result) == 0) {
                        echo 'No Data Yet';
                    } else {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $cnt++;
                    ?>
                            <div>
                                <div>
                                    <div>ID: <?php echo $row['id'] ?>
                                    </div>
                                    <div style="font-weight: bolder;">
                                        Skill: <?php echo $row['skillName'] ?>
                                    </div>
                                    <div>
                                        Percentage: <?php echo $row['lvl'] ?>%
                                    </div>
                                </div>
                                <div style="background-color:  #d8d3d3; width: 100%; height: 2px;"> </div>

                            </div>
                    <?php }
                    } ?>
                    <br>
                    <div>
                        <a href="proskill/edt.php"><button class="mainButton">Edit</button></a>
                    </div>
                    <br>
                </div>
                <br>
                <div style="font-size: 18px; font-weight: bold; color: #0e2954;">Soft Skills</div>
                <div class="content">
                    <?php
                    include '../database.php';
                    $cnt = 0;
                    $sql = "SELECT * FROM `softskills`";
                    $result = mysqli_query($connect, $sql);
                    if (mysqli_num_rows($result) == 0) {
                        echo 'No Data Yet';
                    } else {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $cnt++;
                    ?>
                            <div>
                                <div>
                                    <div>ID: <?php echo $row['id'] ?>
                                    </div>
                                    <div style="font-weight: bolder;">
                                        Skill: <?php echo $row['skillName'] ?>
                                    </div>
                                    <div>
                                        Percentage: <?php echo $row['lvl'] ?>%
                                    </div>
                                </div>
                                <div style="background-color:  #d8d3d3; width: 100%; height: 2px;"> </div>

                            </div>
                    <?php }
                    } ?>
                    <br>
                    <div>
                        <a href="softskill/edt.php"><button class="mainButton">Edit</button></a>
                    </div>
                    <br>
                </div>
                <br>
                <div style="font-size: 18px; font-weight: bold; color: #0e2954;">Hard Skills</div>
                <div class="content">
                    <?php
                    include '../database.php';
                    $cnt = 0;
                    $sql = "SELECT * FROM `hardskills`";
                    $result = mysqli_query($connect, $sql);
                    if (mysqli_num_rows($result) == 0) {
                        echo 'No Data Yet';
                    } else {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $cnt++;
                    ?>
                            <div>
                                <div>
                                    <div>ID: <?php echo $row['id'] ?>
                                    </div>
                                    <div style="font-weight: bolder;">
                                        Skill: <?php echo $row['skillName'] ?>
                                    </div>
                                    <div>
                                        Percentage: <?php echo $row['lvl'] ?>%
                                    </div>
                                </div>
                                <div style="background-color:  #d8d3d3; width: 100%; height: 2px;"> </div>
                            </div>
                    <?php }
                    } ?>
                    <br>
                    <div>
                        <a href="hardskill/edt.php"><button class="mainButton">Edit</button></a>
                    </div>
                    <br>
                </div>
            </div>
            <br>
            <div style="text-align: center; margin: 10px;">
                <a href="messages.php"><button class="mainButton">Go To Messages</button></a>
                <a href="../index.php"><button class="mainButton">Go Back</button></a>
            </div>

        </div>
    </Div>
</body>

</html>