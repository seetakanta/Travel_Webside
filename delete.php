<?php

include 'connect.php';

$uniqueid = $_GET['id'];

 $deletequery = "delete from regist_form where unique_id=$uniqueid"; 

$query = mysqli_query($connection, $deletequery);
if($query){
	?>
	<script>
		alert('deleted successfull');
	</script>

	<?php
	
}else{
	?>
	<script>
		alert('Not deleted ');
	</script>

	<?php
}


header('location:Report.php');
?>