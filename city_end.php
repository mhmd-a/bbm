<?php
session_start();
include('connection.php');

// add state operation:

if(isset($_POST['City_Btn']))

 { 
  	$city_code = $_POST['city_code'];
 	$state = $_POST['state'];
 	$city_name = $_POST['city_name'];
 	$description = $_POST['description'];
  	
	 
	    $query = "INSERT INTO city (city_code, state_fk, city_name, description) values ('$city_code','$state', '$city_name', '$description')";

	 	$query_run = mysqli_query($connection, $query);

	 	if($query_run)
	 	{
	 	  
	 		$_SESSION['success'] = "Congratulations: New City Is Added";
	 		header('Location: city.php');
	 	}else
	 	{
	 		
	 		$_SESSION['status'] = "Sorry: City Is Not Added";
	 		header('Location: city.php');

	 	}
	 	
}

 // edit or update  state operation:

 if(isset($_POST['updatebtn']))
 {
 	$id = $_POST['Edit_id'];
 	$city_code = $_POST['Edit_code'];
 	$state = $_POST['state'];
 	$city_name = $_POST['Edit_name'];
 	$description = $_POST['Edit_description'];
 	

 	$query = "UPDATE city SET city_code='$city_code', state_fk='$state', city_name='$city_name', description='$description' WHERE city_id='$id' ";
 	$query_run = mysqli_query($connection, $query);

 	if($query_run)
 	{
 		$_SESSION['success']= "Congratulations: Your Data Is Updated";
 		header('Location: city.php');



 	}else
 	{
 		$_SESSION['status'] = "Sorry: Your Data Is Not Updated";
 		header('Location: city.php');
 	}


 }


// delete City Operation;
 
  if(isset($_POST['deletebtn']))
 {
 	$id = $_POST['delete_id'];

 	$query = "DELETE  FROM city WHERE city_id='$id' ";
 	$query_run  = mysqli_query($connection, $query);

 	if($query_run)
 	{
 		$_SESSION['success']= "Congratulations: Your Data Is Deleted";
 		header('Location: city.php');
 	}else
 	{
 		$_SESSION['status']= "Sorry: Your Data Is Not Deleted";
 		header('Location: city.php');
 	}


 }

?>