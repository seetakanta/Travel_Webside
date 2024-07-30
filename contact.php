<?php
session_start();
include 'connect.php';

echo '<pre>';
print_r($_SESSION);
if(isset($_POST['send'])){
    $name=mysqli_real_escape_string($connection,$_POST['name']);
   $email=mysqli_real_escape_string($connection,$_POST['email']);
   $number=$_POST['number'];
   $subject=mysqli_real_escape_string($connection,$_POST['subject']);
   $message=mysqli_real_escape_string($connection,$_POST['message']);
   $sql_query=mysqli_query($connection,"insert into contact(name,email,number,subject,message)values
   ('$name','$email','$number','$subject','$message')");
//    if($sql_query){
//      echo "Contacted Successfully";
//      }
//      else
//     {
//         echo "Contacting failed";
//     }
}
header('location:index.php');
?>