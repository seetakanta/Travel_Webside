<?php
session_reset();
include 'connect.php';

$sql_in = "select * from regist_form";
$result = mysqli_query($connection,$sql_in);
?>
<table style="border: 1px solid black;">
    <thead>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Number</th>
        <th>Email</th>
        <th>Password</th>
        <th>Birthday</th>
        <th>Gender</th>
        <th>category</th>
        <th>Edit</th>
        <th>Delete</th>

</thead>
<tbody>
    <?php
        while($fetch_data=mysqli_fetch_row($result)){
            echo '<tr>';
            echo '<td>'.$fetch_data[1].'</td>';
            echo '<td>'.$fetch_data[2].'</td>';
            echo '<td>'.$fetch_data[3].'</td>';
            echo '<td>'.$fetch_data[4].'</td>';
            echo '<td>'.$fetch_data[5].'</td>';
            echo '<td>'.$fetch_data[6].'</td>';
            echo '<td>'.$fetch_data[7].'</td>';
            echo '<td>'.$fetch_data[8].'</td>';


            echo '<td><a href=register.php?id='.$fetch_data[0].'>Edit</a></td>';
            // echo '<td><a href=order.php?id='.$fetch_data[0].'>Edit</a></td>';
            echo '<td><a href=delete.php?id='.$fetch_data[0].'>Delete</a></td>';
            echo '<tr>';


        }
    ?>
    <tr>
        <td>
        <button class="btn" name="logout" value="Logout">
            <a href="logout.php">Logout</a></button>
    </td>
    </tr>
    </tbody>
    </thead>