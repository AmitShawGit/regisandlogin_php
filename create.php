<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />
    <style>
      .container {
        width: 500px;
        margin-top: 50px;
        background-color: rgb(111, 175, 196);
        padding: 30px;
      }
      h1,
      p {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Create Your Account</h1>
      <div class="row">
        <div class="col-md-12">
          <form action="" method="POST">
            <div class="form-group">
              <label for="Name">Name</label>
              <input type="text" name="uname" id="Name" class="form-control" />
            </div>

            <div class="form-group">
              <label for="mobile">Mobile</label>
              <input
                type="number"
                name="mobile"
                id="mobile"
                class="form-control"
              />
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input
                type="email"
                name="email"
                id="email"
                class="form-control"
              />
            </div>

            <div class="form-group">
              <label for="Password">Password</label>
              <input
                type="password"
                name="pass"
                id="password"
                class="form-control"
              />
            </div>

            <div class="form-group">
              <label for="cpassword">Confirm Password</label>
              <input
                type="password"
                name="cpass"
                id="cpassword"
                class="form-control"
              />
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button
            ><br /><br />
            <p>Already have a account <a href="login.php">Log In</a></p>
          </form>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
<?php 
include 'connection.php';

if(isset($_POST['submit'])){
  $name = mysqli_real_escape_string($con, $_POST['uname']);
  $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $pass = mysqli_real_escape_string($con, $_POST['pass']);
  $cpass = mysqli_real_escape_string($con, $_POST['cpass']);

  $bpass = password_hash($pass,PASSWORD_BCRYPT);
  $cbpass = password_hash($cpass, PASSWORD_BCRYPT);

   $selectquery = " select * from reg where email = '$email' ";
   $query = mysqli_query($con, $selectquery);
   $emailcount = mysqli_num_rows($query);

   if($emailcount > 0){
    ?>
    <script>
        alert("already exists");
    </script>
    <?php
}
    else{
        $insertquery = " insert into reg(name,mobile,email,password,cpass) value('$name','$mobile','$email','$bpass', '$cbpass') ";
        $iquery = mysqli_query($con,$insertquery);
        header('location:login.php');
    }
   }


?>

