<?php
	include('connection.php');
	session_start();

	$name = $_POST['name'];
	$fathername = $_POST['fathername'];
	$gender = $_POST['gender'];
	$datepicker = $_POST['datepicker'];
	$weight = $_POST['weight'];
	$email = $_POST['email'];
	$blood = $_POST['blood'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$pincode = $_POST['pincode'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$images = $_FILES["photo"]["name"];

	


 if(file_exists("upload/" .$_FILES["photo"]["name"]))
    {
    	$store = $_FILES["photo"]["name"];
    	$_SESSION['status'] = "image already exists. '.$store.'";
    	header('Location: donor.php');

   }
    else
    {



			$insert = "INSERT INTO donor(name, father_name, gender, dob, body_weight, email, blood_group, state, city, address, pincode, phone, image, username_fk, status) VALUES ('$name', '$fathername', '$gender', '$datepicker', '$weight', '$email', '$blood', '$state', '$city','$address', '$pincode', '$phone', '$images', '".$_SESSION['username']."', '0')";

	     $start = mysqli_query($connection, $insert);
		
		 if($start)
	 	{
	 		move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/".$_FILES["photo"]["name"]);
	 		$_SESSION['success']= "Congratulations: You new donor is added:";
	 		header('Location: donor.php');
	 	}else
	 	{
	 		$_SESSION['status']= "Sorry: your data is not Added!";
	 		header('Location: donor.php');
	 	}

	 }



?>