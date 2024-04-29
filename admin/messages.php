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
                <div class="subTitle">Messages</div>
                <div class="content">



                    <?php
                    include '../database.php';

                    $sql = "SELECT * FROM `messages`";
                    $result = mysqli_query($connect, $sql);
                    if (mysqli_num_rows($result) == 0) {
                        echo 'No Data Yet';
                    } else {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>


                            <table>
                                <tbody>
                                    <tr>
                                        <td style="width: 10%;">ID:</td>
                                        <td><?php echo $row['id'] ?> </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;">Name:</td>
                                        <td><?php echo $row['name'] ?> </td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td> <?php echo $row['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Contact:</td>
                                        <td><?php echo $row['phone'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Message:</td>
                                        <td><?php echo $row['message'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                    <?php }
                    } ?>
                    <br>
                </div>
            </div>

            <br>
            <div style="text-align: center; margin: 10px;">
                <a href="index.php"><button class="mainButton">Go Back To Admin</button></a>
                <a href="../index.php"><button class="mainButton">Go Back</button></a>
            </div>
        </div>
    </Div>
</body>

</html>