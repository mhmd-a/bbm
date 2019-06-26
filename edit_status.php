<?php
	include('connection.php');

	$id = $_GET['status_id'];
	$status = $_POST['status'];

	$edit = "UPDATE donor SET status='$status' WHERE donor_id='$id'";
	$query_run = mysqli_query($connection, $edit);
	 
	 if($query_run)
 	{
 		$_SESSION['success']= "Congratulations: You Activated donor:";
 		header('Location: Active_donors.php');
 	}else
 	{
 		$_SESSION['status']= "Sorry: your data is not activated";
 		header('Location: donor.php');
 	}
	
?>