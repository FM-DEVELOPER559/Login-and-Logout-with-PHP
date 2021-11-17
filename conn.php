<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dataBase = "user";

$conn = mysqli_connect($serverName,$userName,$password,$dataBase);

if ($conn) {
    // echo "Connection succussfull";
}else{
    echo "Connection is not succussfull".$conn->error();
}

?>