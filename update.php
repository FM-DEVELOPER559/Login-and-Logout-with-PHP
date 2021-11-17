<?php
session_start();
if($_SESSION["id"]) {
require "conn.php";
$update_id = $_REQUEST['id'];
$sql = mysqli_query($conn,"SELECT * from users where id=$update_id");
$row = mysqli_fetch_array($sql);
$gender = $row['gender'];
$country = $row['country'];
$hobby = $row['hobby'];

if(isset($_POST['submit'])){
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  // $password = $_POST['password'];
  $gender = $_POST['gender'];
  $country = $_POST['country'];
  $hobby1 = $_POST['hobby'];
  $checked = "";
  foreach($hobby1 as $hobby)  
       		{  
          		$checked.= $hobby.",";  
       		}

  $result = mysqli_query($conn,"update users set name='$name',email='$email',gender='$gender',country='$country',hobby='$checked' where id=$id");
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
      <div class="container">
          <h1 class="text-center">User Registration</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="user" onsubmit="return formValidation()">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']?>" aria-describedby="nameHelp">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email']?>" aria-describedby="emailHelp">
              </div>
            <!-- <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="password">
            </div> -->
            <div class="row">
                <div class="col">
                  <label for="">Gender</label>
                  <input class="form-check-input" type="radio" value="Male" name="gender" onblur="validatename(this.id)" id="flexRadioMale"
                  <?php if ( $gender =='Male' ) { 
                      echo 'checked'; 
                    }?>>
                  <label class="form-check-label" for="flexRadioMale">
                    Male
                  </label>
                  <input class="form-check-input" type="radio" value="Female" name="gender" id="flexRadioFemale"
                  <?php if ( $gender =='Female' ) { 
                      echo 'checked'; 
                    }?>>
                  <label class="form-check-label" for="flexRadioFemale">
                    Female
                  </label>
                  <input class="form-check-input" type="radio" value="Other" name="gender" id="flexRadioOther"
                  <?php if ( $gender =='Other' ) { 
                      echo 'checked'; 
                    }?>>
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
                <option value="Pak"
                <?php
                if ( $country =='Pak' ) {
                    echo 'selected';
                }
                ?>>Pakistan</option>
                <option value="Chaina"
                <?php
                if ( $country =='Chaina' ) {
                    echo 'selected';
                }
                ?>>Chaina</option>
                <option value="UAE"
                <?php
                if ( $country =='UAE' ) {
                    echo 'selected';
                }
                ?>>UAE</option>
              </select>
              <div class="row py-2">
                <?php
                    $checkbox=$hobby;
                    $arr=explode(",",$checkbox);
                ?>
                  <div class="col-sm-12">
                      <label for="">Hobbies</label>
                      <input <?php if(in_array("Reading",$arr)){echo "checked";}?> class="form-check-input" type="checkbox"  name="hobby[]"  value="Reading" role="switch" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Reading</label>
                      <input <?php if(in_array("Writing",$arr)){echo "checked";}?> class="form-check-input" type="checkbox"  name="hobby[]"  value="Writing" role="switch" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Writing</label>
                      <input <?php if(in_array("Gardning",$arr)){echo "checked";}?> class="form-check-input" type="checkbox"  name="hobby[]"  value="Gardning" role="switch" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Gardning</label>
                      <input <?php if(in_array("Cricket",$arr)){echo "checked";}?> class="form-check-input" type="checkbox"  name="hobby[]"  value="Cricket" role="switch" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Cricket</label>
                      <input <?php if(in_array("Movies",$arr)){echo "checked";}?> class="form-check-input" type="checkbox"  name="hobby[]"  value="Movies" role="switch" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Movies</label>
                  </div>
              </div>
            <button type="submit" name="submit" class="btn btn-primary my-1">Submit</button>
          </form>
      </div>
      <script src="assets/main.js"></script>
  </body>
</html>
<?php }else {
	header("Location:login.php");
}  ?>