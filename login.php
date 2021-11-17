<?php
include "conn.php";
$errmessage = "";
session_start();
if(isset($_POST['login'])){
    $username = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email='".$username."' and password = '".$password."'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    if(is_array($row)){ 
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
        // $_SESSION["email"] = $row['email'];
        // $_SESSION["password"] = $row['email'];
        header("location:index.php");
    }else{
        $errmessage = '<div class="text-center mt-5 bg-warning py-2"><h5>Please Create Your Account <a href="insert.php">Register</a></h5></div>';
        
    }
}
if(isset($_SESSION["id"])) {
  header("Location:index.php");
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <?php include "header.php"; ?>
      <form class="col-5 mx-auto mt-5 " action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return formValidation()">
        <h1 class="pb-5 text-center">Login</h1>
        <div class="row mb-3">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" placeholder="Enter your Email" id="email" name="email">
          </div>
        </div>
        <div class="row mb-3">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" placeholder="Enter your Password" id="password" name="password">
          </div>
        </div>
        
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button class="btn btn-primary me-md-2" type="submt" name="login">Login</button>
        </div>
        <div><?php echo $errmessage ?></div>

      </form>

      <script>
      function formValidation() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    // var passlength = document.getElementById("password").value;

    if (email == "" ) {
        window.alert("Please Enter Your Email");
        return false;
    }
    
    if (password == "") {
        window.alert("Please Enter Your Password");
        return false;
    } 

    if (password.length < 5 ) {
        window.alert("Please Enter Minmum 5 Digit Password");
        return false;
    }
}
    </script>
</body>
</html>