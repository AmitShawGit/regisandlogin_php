<?php session_start(); ?>
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
      <h1>Log In</h1>
      <div class="row">
        <div class="col-md-12">
          <form action="" method="POST">

            <div class="form-group">
              <label for="username">Username</label>
              <input type="email" name="username" id="username" class="form-control" />
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

            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button
            ><br /><br />
            <p>Already have a account <a href="create.php">Create Account</a></p>
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
    $user = $_POST['username'];
    $passw = $_POST['pass'];

    $selectquery = " select * from reg where email = '$user' " ;
    $query = mysqli_query($con, $selectquery);

    $emailcount = mysqli_num_rows($query);
    if($emailcount){
     $email_db = mysqli_fetch_assoc($query);
     $db_pass = $email_db['password'];
     $pass_decode = password_verify($passw, $db_pass);
     if($pass_decode){
      header('location:create.php');
     }
    }else{
      header('location:connection.php');
    }
 

}

?>