<?php
$db_host = 'sql310.infinityfree.com';
$db_username = 'if0_36440676';
$db_password = 'IEfrkbMYdeUHsUS';
$db_name = 'if0_36440676_lia' ;

$connect = mysqli_connect($db_host, $db_username,$db_password,$db_name);


if (mysqli_connect_error()){
    exit('Failed to connect to MySQL:' . mysqli_connect_error());
}
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?> 