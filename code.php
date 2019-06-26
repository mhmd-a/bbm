 <?php
session_start();

include('connection.php'); //Database connection page

// add new admin profile operation:

 if(isset($_POST['register_btn']))
 {  $name = $_POST['name'];
 	$username = $_POST['username'];
 	$email = $_POST['email'];
 	$password = $_POST['password'];
    $confirmpassword = $_POST['cofirm_pass'];
 	$usertype = $_POST['usertype'];
 	$images = $_FILES["photo"]["name"];
	 
    if($password === $confirmpassword)
    {

        
	    $query = "INSERT INTO member (name, username, email, password, usertype, profile) values ('$name','$username', '$email', '$password', '$usertype','$images')";

	 	$query_run = mysqli_query($connection, $query);

	 	if($query_run)
	 	{
	 	  	move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/".$_FILES["photo"]["name"]);
	 		$_SESSION['success'] = "Congratulations: Your Data Is Added";
	 		header('Location: members.php');
	 	}else
	 	{
	 		
	 		$_SESSION['status'] = "Sorry: Your Is Not Added";
	 		header('Location: members.php');

	 	}
	 	
	}


	else
	 	{
	 		
	 		$_SESSION['status'] = "Sorry: Password is not Matched: ";
	 		header('Location: members.php');

	 	}
	 }
 

  //update operation:

 if(isset($_POST['updatebtn']))
 {
 	$id = $_POST['Edit_id'];
 	$name = $_POST['Edit_name'];
 	$username = $_POST['Edit_username'];
 	$email = $_POST['Edit_email'];
 	$password = $_POST['Edit_password'];
    $usertype = $_POST['Update_Usertype'];

 	$query = "UPDATE member SET name='$name', username='$username', email='$email', usertype='$usertype', password='$password' WHERE member_id='$id' ";
 	$query_run = mysqli_query($connection, $query);

 	if($query_run)
 	{
 		$_SESSION['success']= "Congratulations: Your Data Is Updated";
 		header('Location: members.php');



 	}else
 	{
 		$_SESSION['status'] = "Sorry: Your Data Is Not Updated";
 		header('Location: members.php');
 	}


 }

//Delete operation 

 if(isset($_POST['deletebtn']))
 {
 	$id = $_POST['delete_id'];

 	$query = "DELETE  FROM member WHERE member_id='$id' ";
 	$query_run  = mysqli_query($connection, $query);

 	if($query_run)
 	{
 		$_SESSION['success']= "Congratulations: Your Data Is Deleted";
 		header('Location: register.php');
 	}else
 	{
 		$_SESSION['status']= "Sorry: Your Data Is Not Deleted";
 		header('Location: register.php');
 	}


 }

 //the login Operation:

 if(isset($_POST['admin-loginbtn']))
 {
 	$email  =  $_POST['email'];
 	$password = $_POST['password'];

 	$query = "SELECT * FROM member WHERE email='$email' AND password='$password'";
 	$query_run = mysqli_query($connection, $query);
     
     $usertypes = mysqli_fetch_array($query_run);

 	if($usertypes['usertype'] == "admin")
 	{
 		$_SESSION['username']  = $email;
 		header('Location: index1.php');

 	}else if($usertypes['usertype'] == "user")
 	{
 		$_SESSION['username']  = $email;
 		header('Location: User/index.php');

 	}else
 	{
 		$_SESSION['status'] = "Your Email or Password is not Correct:";
 		header('Location: login.php');
 	}


 }

 // Logout Operation 

 if(isset($_POST['logout_btn']))
 {
 	session_destroy();
 	unset($_SESSION['username']);
 	header('Location: index.php');
 }

 	

?>