<?php
$login = false;
$error = false;
require 'partials/_dbConnect.php';

if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $userPass= $_POST['password'];
    $sql = "SELECT * FROM `users` WHERE name = '$username'";
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        while($row=mysqli_fetch_assoc($result))
        {
            if(password_verify($userPass,$row['pass']))
            {
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['name'] = $username;
                header("location:welcome.php");
            }
            else{
                $logError = "Invalid Password";
                $error = true;
            }
        }
        
    } 
    else {
        $logError = "Invalid Credentials. Account Doesn't Exist";
        $error = true;
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
    <title>Log In</title>
</head>

<body>
    <?php require 'partials/_nav.php'; ?>
    <!-- alerts of innserting data -->
    <?php
    if ($error == true) {

        echo '<div class="alert alert-danger" role="alert">
        <strong> Error! '  
        . $logError .
        '</strong> </div> ';
      
    }
    ?>

    <div class="container my-5 mx-auto center">
        <form action="/loginSystem/login.php" method="post">
            <h2 class="my-3 text-center">Log In to Isecure </h2>
            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label">User Name:</label>
                <input type="name" class="form-control" id="name" name="name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Sign In</button>
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