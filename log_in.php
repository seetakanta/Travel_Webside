<?php

session_start();
include 'connect.php';

/*echo '<pre>';
print_r($_SESSION);*/
if(isset($_POST['login']))
{
// $email=$_REQUEST['email'];
// $password=$_REQUEST['password'];
$email=mysqli_real_escape_string($connection,$_POST['email']);
$password=mysqli_real_escape_string($connection,$_POST['password']);
$select_users= mysqli_query($connection,"select * from `regist_form` where email = '$email' and password='$password'") or die ('query failed');
$num = mysqli_num_rows($select_users);
//echo $num ; exit;
if($num == 1 ){
// echo 'ssdsd';
header('location:index.php');
}
else
{
  echo "<script>alert('email,password is wrong')</script>";
// header('location:index.php');
}
/*if(mysqli_num_rows($select_users) > 0){

  $row = mysqli_fetch_assoc($select_users);
}
else{
  $message[] = 'incorrect email or password!';
}*/

// $sql_query=mysqli_query($connection,"insert into login(email,password)values('$email','$password')");
// if($sql_query){

//     echo "Registered successfully";
//   }
//   else{
//     echo "Failed";
//   }

 }
// header('location:index.php');
?>