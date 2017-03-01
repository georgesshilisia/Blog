<?php
include 'database.php';
//Check if the form is submitted
if (isset($_POST['submit'])){
$user=mysqli_real_escape_string($con,$_POST['user']);
    $message=mysqli_real_escape_string($con,$_POST['message']);

    //set the time zone
    date_default_timezone_get('America/New_York');
    $time=date('h:i:s:a',time());
    if(!isset($user)|| $user==''||!isset($message)||$message==''){
        $error="Kindly fill in your name and message ";
        header("Location: index.php?error=".urlencode($error));
        exit();
    }
    else{
        $query="INSERT INTO Blog (time,user,message) VALUES('$time','$user','$message')";
    }
    if(!mysqli_query($con,$query)){
        die('Error:'.mysqli_error($con));
    }
    else{
        header("Location: index.php");
        exit();
    }
}
?>
/**
 * Created by PhpStorm.
 * User: shilisia
 * Date: 2/26/17
 * Time: 1:40 PM
 */