<?php 

include('header.php');
include('navbar.php');
?>

<div class="container-fluid" >
<!-- Datatables example -->

	<div class="card shadow mb-4">
		<div class="card-header py-3 badge-danger text-white">
		  <h6 class="m-0 font-weight-bold ">Edit Admin Profile </h6>
	    </div>
	<div class="card-body">
<?php
include('connection.php'); //connection includer:
if(isset($_POST['edit_btn']))
{
   $id = $_POST['edit_id'];

 	 $query = "SELECT * FROM member WHERE member_id='$id'";
 	 $query_run = mysqli_query($connection, $query);

 	 foreach ($query_run as $row)
 	  {
 	 	?>

         <form action="code.php" method="post">
         	  <input type="hidden" name="Edit_id" value="<?php echo $row['member_id'] ?>">
         	  <div class="form-group">
		      	<label>Name</label>
		      	<input type="text" name="Edit_name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Enter Name">
		      </div>
		      <div class="form-group">
		      	<label>Username</label>
		      	<input type="text" name="Edit_username" value="<?php echo $row['username'] ?>" class="form-control" placeholder="Enter Username">
		      </div>
		      <div class="form-group">
		      	<label>Email</label>
		      	<input type="text" name="Edit_email" value="<?php echo $row['email'] ?>"class="form-control" placeholder="Enter email">
		      </div>
		      <div class="form-group">
		      	<label>Password</label>
		      	<input type="password" name="Edit_password" value="<?php echo $row['password'] ?>"class="form-control" placeholder="Enter Password">
		      </div>
		      <div class="form-group">
		      	<label>User Type</label>
		        <select name="Update_Usertype" class="form-control">
		        	<option value="admin"> admin </option>
		        	<option value="user"> user </option>
		        </select>
		      </div>

		      <a href="members.php" class="btn btn-danger">CANCEL</a>
		      <button type="submit" name="updatebtn" class="btn btn-success">Update</button>
		</form>
		<?php

	 	 }
	 }

	 ?>
	   </div>    	   
	  </div>
  
<?php 
include('footer.php');
include('scripts.php');
?>