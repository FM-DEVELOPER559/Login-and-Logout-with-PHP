<?php

require "conn.php";

$dell_id = $_REQUEST['id'];

$query = mysqli_query($conn,"DELETE from users where id=$dell_id");

if($query){
    // header("location:index.php");
    // $errmessage = '<div class="text-center mt-5 bg-warning py-2"><h5>Successfully Deleted</h5></div>';
    echo "<script>
    alert('Successfully Deleted');
    </script>";
    ?>
    <meta http-equiv="refresh" content="0; url=http://localhost/user/index.php">
    <?php
}else{
    echo "Data is not delete";
}





?>