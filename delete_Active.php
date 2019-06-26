<?php
	include('connection.php');

	$id = $_GET['donor_id'];

	$delete = "DELETE FROM donor WHERE donor_id='$id'";

	$query_run  = mysqli_query($connection, $delete);

 	if($query_run)
 	{
 		$_SESSION['success']= "Congratulations: Your Data Is Deleted";
 		header('Location: Active_donors.php');
 	}else
 	{
 		$_SESSION['status']= "Sorry: Your Data Is Not Deleted";
 		header('Location: Active_donors.php');
 	}


 
	
?>