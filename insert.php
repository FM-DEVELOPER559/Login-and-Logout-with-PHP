<?php
include 'conn.php';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $gender = $_POST['gender'];
  $country = $_POST['country'];
  $hobby1 = $_POST['hobby'];
  $checked = "";
  foreach($hobby1 as $hobby)  
       		{  
          		$checked.= $hobby.",";  
       		}

  $result = mysqli_query($conn,"insert into users(name,email,password,gender,country,hobby)values('$name','$email','$password','$gender','$country','$checked')");
  // if($result){
  //   echo "Data inserted ";
  // }else{
  //   echo "Something wrong";
  // }
  header("location:index.php");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>User Registration</title>
  </head>
  <body>
  <?php include "header.php"; ?>
      <div class="container">
          <h1 class="text-center">User Registration</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="user" onsubmit="return formValidation()">
        <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp">
              <span id="message"></span>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp">
              <span id="message"></span>
            </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
          </div>
          <div class="row">
              <div class="col">
                <label for="">Gender</label>
                <input class="form-check-input" type="radio" value="Male" name="gender" id="flexRadioMale">
                <label class="form-check-label" for="flexRadioMale">
                  Male
                </label>
                <input class="form-check-input" type="radio" value="Female" name="gender" id="flexRadioFemale">
                <label class="form-check-label" for="flexRadioFemale">
                  Female
                </label>
                <input class="form-check-input" type="radio" value="Other" name="gender" id="flexRadioOther">
                <label class="form-check-label" for="flexRadioOther">
                  Other
                </label>
                <div>
                  <small id="emailHelp" class="form-text text-muted">
                    </small>
                </div>
              </div>
            </div>
            <select class="form-select" name="country" required aria-label="Default select example">
              <option selected>Select Country</option>
              <option value="Pak">Pakistan</option>
              <option value="Chaina">Chaina</option>
              <option value="UAE">UAE</option>
            </select>
            <div class="row py-2">
                <div class="col-sm-12">
                    <label for="">Hobbies</label>
                    <input class="form-check-input" type="checkbox"  name="hobby[]"  value="Reading" role="switch" class="hobby">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Reading</label>
                    <input class="form-check-input" type="checkbox"  name="hobby[]"  value="Writing" role="switch" class="hobby">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Writing</label>
                    <input class="form-check-input" type="checkbox"  name="hobby[]"  value="Gardning" role="switch" class="hobby">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Gardning</label>
                    <input class="form-check-input" type="checkbox"  name="hobby[]"  value="Cricket" role="switch" class="hobby">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Cricket</label>
                    <input class="form-check-input" type="checkbox"  name="hobby[]"  value="Movies" role="switch" class="hobby">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Movies</label>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary my-1">Submit</button>
          </form>
      </div>
      <script src="assets/main.js"></script>
  </body>
</html>