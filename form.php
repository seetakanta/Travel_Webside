<?php 
    include 'connect.php';
   echo '<pre>';print_r($_REQUEST);
   if(isset($_POST['submit'])){
   $firstname = $_POST['f_name'];
   $lastname = $_POST['l_name'];
   $number = $_POST['phone'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $birthday = date("Y-m-d", strtotime($_POST['birthday'])) ;
   $gender = $_POST['gender'];
   $category = $_POST['category'];
   $facility = $_POST['facility'];
  $sql_text="insert into regist_form(firstname,lastname,number,email,password,birthday,gender,category)
   values('$firstname','$lastname','$number','$email','$password','$birthday','$gender','$category')";
   $stmt = mysqli_query($connection,$sql_text);
   $uniqueid=mysqli_insert_id($connection);
   foreach($facility as $facilityid)
      {
          $sql_in="insert into facility(facilityid,unique_id)values($facilityid,$uniqueid)";
          // $result_f=mysqli_query($connection,$sql_in);//give other name the result bcz it may be over ridden with avobe result
        }
        // echo "registered successfully";

   }
   header('location:index.php');
   
   ?>
