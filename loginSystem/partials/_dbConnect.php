<?php 

$server="localhost";
$name="root";
$pass="";
$db_name="login";

$connection = mysqli_connect("$server","$name","$pass","$db_name");



if(!$connection){
   die ( " <h2> We have some problem to connect with database </h2>  <br>" . mysqli_connect_error($connection));

}





?>