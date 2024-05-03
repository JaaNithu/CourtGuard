<?php 

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "offence";

//Connection
$con = mysqli_connect("$host","$username","$password","$database");

//Check connection
if(!$con){
    header("Location: ../errors/dberror.php");
    die();
    // die(mysqli_connect_errno($con));
}
// else{
//     echo "Database Connected.!";
// }
?>