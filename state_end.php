<?php
session_start();
include('connection.php');

// add state operation:

if(isset($_POST['State_btn']))
 {  $state_code = $_POST['state_code'];
 	$State_name = $_POST['State_name'];
 	$description = $_POST['description'];
 
	 
	    $query = "INSERT INTO state (state_code, state_name, description) values ('$state_code','$State_name', '$description')";

	 	$query_run = mysqli_query($connection, $query);

	 	if($query_run)
	 	{
	 	  
	 		$_SESSION['success'] = "Congratulations: New State Is Added";
	 		header('Location: state.php');
	 	}else
	 	{
	 		
	 		$_SESSION['status'] = "Sorry: State Is Not Added";
	 		header('Location: state.php');

	 	}
	 	
}

 // edit or update  state operation:

 if(isset($_POST['updatebtn']))
 {
 	$id = $_POST['Edit_id'];
 	$state_code = $_POST['Edit_code'];
 	$state_name = $_POST['Edit_name'];
 	$description = $_POST['Edit_description'];
 	

 	$query = "UPDATE state SET state_code='$state_code', state_name='$state_name', description='$description' WHERE state_id='$id' ";
 	$query_run = mysqli_query($connection, $query);

 	if($query_run)
 	{
 		$_SESSION['success']= "Congratulations: Your Data Is Updated";
 		header('Location: state.php');



 	}else
 	{
 		$_SESSION['status'] = "Sorry: Your Data Is Not Updated";
 		header('Location: state.php');
 	}


 }


// delete State Operation;
 
  if(isset($_POST['deletebtn']))
 {
 	$id = $_POST['delete_id'];

 	$query = "DELETE  FROM state WHERE state_id='$id' ";
 	$query_run  = mysqli_query($connection, $query);

 	if($query_run)
 	{
 		$_SESSION['success']= "Congratulations: Your Data Is Deleted";
 		header('Location: state.php');
 	}else
 	{
 		$_SESSION['status']= "Sorry: Your Data Is Not Deleted";
 		header('Location: state.php');
 	}


 }

?>

