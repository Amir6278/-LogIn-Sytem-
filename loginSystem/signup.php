<?php
$showAlert = false;
$Error = false;

  require 'partials/_dbConnect.php';

  if(isset($_POST['submit'])){
      $username = $_POST['name'];
      $userEmail= $_POST['email'];
      $userPass= $_POST['password'];
      $confirmPass= $_POST['cpassword'];
      $sqlExit = "SELECT * FROM `users` WHERE name = '$username'";
      $ExitResult=mysqli_query($connection,$sqlExit);
      $Exits = mysqli_num_rows($ExitResult);
      if($Exits!=0){
        $showError = 'User name already Exits';
        $Error = true;
      }

      else 
      {
         if($userPass == $confirmPass)
         {
             $hash = password_hash($userPass,PASSWORD_DEFAULT);

         $sql = " INSERT INTO `users`(`name`, `email`, `pass`) VALUES ('$username','$userEmail','$hash')";
         $result = mysqli_query($connection,$sql);
         if($result){
            $showAlert = true;
         }
         

     }
     else{
        $showError = 'Passwords Do not match';
        $Error = true;
  
     } 
        
  }



}


?>







<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
  </head>
  <body>
    <?php require 'partials/_nav.php'; ?>
     <!-- alerts of innserting data -->
 <?php 
   if($showAlert){
       echo '<div class="alert alert-success" role="alert">
       Succees! Your account has been created & You can Log in to Continue.
     </div>';
   }
   else if($Error){
    echo '<div class="alert alert-danger" role="alert">
    <strong> ' .$showError. '</strong>
  </div>';
   }
   ?>
     
    <div class="container mx-auto center">
    <form action="/loginSystem/signup.php" method="post">
    <h2 class="my-3 text-center">SignUp to Isecure </h2>
  <div class="mb-3 ">
    <label for="exampleInputEmail1" class="form-label">User Name:</label>
    <input type="name" class="form-control" id="name" name="name" maxlength="11" aria-describedby="name">
    <label for="exampleInputEmail1" class="form-label">Email:</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="cpassword" id="cpassword">
    <div id="emailHelp" class="form-text">Make Sure to use the same password.</div>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
</form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>