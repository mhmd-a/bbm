<?php 

include('header.php');
include('navbar.php');
?>

<div class="container-fluid" >
<!-- Datatables example -->

	<div class="card shadow mb-4">
		<div class="card-header py-3 bg-info text-white">
		  <h6 class="m-0 font-weight-bold ">Edit Admin Profile </h6>
	    </div>
	<div class="card-body">
<?php
include('connection.php'); //connection includer:
if(isset($_POST['edit_btn']))
{
   $id = $_POST['edit_id'];

 	 $query = "SELECT * FROM state WHERE state_id='$id'";
 	 $query_run = mysqli_query($connection, $query);

 	 foreach ($query_run as $row)
 	  {
 	 	?>

         <form action="state_end.php" method="post">
         	  <input type="hidden" name="Edit_id" value="<?php echo $row['state_id'] ?>">
         	  <div class="form-group">
		      	<label>State Code</label>
		      	<input type="text" name="Edit_code" value="<?php echo $row['state_code'] ?>" class="form-control" placeholder="Enter State Code">
		      </div>
         	  <div class="form-group">
		      	<label>State Name</label>
		      	<input type="text" name="Edit_name" value="<?php echo $row['state_name'] ?>" class="form-control" placeholder="Enter State Name">
		      </div>
		      <div class="form-group">
		      	<label>Description</label>
		      	<input type="text" name="Edit_description" value="<?php echo $row['description'] ?>" class="form-control" placeholder="Enter description">
		      </div>
		      
		      
		      <a href="state.php" class="btn btn-danger">CANCEL</a>
		      <button type="submit" name="updatebtn" class="btn btn-info">Update</button>
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