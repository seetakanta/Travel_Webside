<?php
session_start();
include 'connect.php';

echo '<pre>';
print_r($_SESSION);
if(isset($_POST['submit'])){
    $place=mysqli_real_escape_string($connection,$_POST['place']);
    $person=mysqli_real_escape_string($connection,$_POST['person']);
    $arrival = date("Y-m-d", strtotime($_POST['arrival'])) ;
    $leaving = date("Y-m-d", strtotime($_POST['leaving'])) ;
    $sql_query=mysqli_query($connection,"insert into booking(place,person,arrival,leaving)values('$place','$person','$arrival','$leaving')");
    // if($sql_query){
    //     echo "Booked Successfully";
    // }
    // else
    // {
    //     echo "Booking failed";
    // }
}
header('location:index.php');
?>