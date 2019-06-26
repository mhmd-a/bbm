<?php 

//include('security.php');
include('header.php');
include('navbar.php');
?>



<!-- Modal -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header badge-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel" >Add Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	      <form action="code.php" method="post">
	      <div class="modal-body">
	      		<div class="form-group">
	      		<label>Name</label>
	      		<input type="text" name="name" class="form-control" placeholder="Enter name">
	      	</div>
	      	<div class="form-group">
	      		<label>Username</label>
	      		<input type="text" name="username" class="form-control" placeholder="Enter Username">
	      	</div>
	      	<div class="form-group">
	      		<label>Email</label>
	      		<input type="text" name="email" class="form-control" placeholder="Enter email">
	      	</div>
	      	<div class="form-group">
	      		<label>Password</label>
	      		<input type="password" name="password" class="form-control" placeholder="Enter Password">
	      	</div>

	      	<div class="form-group">
	      		<label>Confirm Password</label>
	      		<input type="password" name="cofirm_pass" class="form-control" placeholder="Confirm Password">
	      	</div>
		       <div class="form-group">
	            <input type="file" class="form-control" name="photo" id="photo" ></input>
	          </div>
            
	      	       <input type="hidden" name="usertype" value="admin">
           
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" name="register_btn" class="btn btn-success">Save</button>
	      </div>
	    </form>
	   </div>
  </div>
</div>


<!-- Datatables example -->
	<div class="card shadow mb-2">
		<div class="card-header py-3 ">
		  <h5 class="m-0 font-weight-bold text-dark">  Hello, <span style="color: blue"> <?php echo $_SESSION['username']?></span> Welcome To Members Management Page:
	      </h5>
	      	 <button type="button" class="btn btn-warning m-0" data-toggle="modal" data-target="#addadminprofile">
			 Add Member
			 </button>
	     

	    </div>
	<div class="card-body">
		<div class="table-responsive">

		<?php
			include('connection.php');
            if(isset($_POST['search']))
            {
            	$searchKey = $_POST['search'];

            	 $query = " SELECT * FROM member where name LIKE '%$searchKey%'";
          

            }else
            {
            	 $query = " SELECT * FROM member";
                  $searchKey = "";

            }
             $query_run = mysqli_query($connection, $query);

           
			?>

				<?php
		if(isset($_SESSION['success']) && $_SESSION['success'] !='')
		{
			echo ' <div class="alert alert-success"> '.$_SESSION['success'].' </div>';
			unset($_SESSION['success']);
		}

		if(isset($_SESSION['status']) && $_SESSION['status'] !='')
		{
			echo '<div class="alert alert-danger"> '.$_SESSION['status'].' </div>';
			unset($_SESSION['status']);
		}


		?>
		<div class="row">
		<div class="col-md-12 ">
			
		<form action="" method="post">
	        <div class="row">
			 <div class="col-12 col-md-6">
			 </div>
			 	<div class="col-6 col-sm-4" style="margin-left: 10%">
			 <input type="search" name="search" class="form-control "   placeholder="Search by name:" value="<?php echo $searchKey; ?>">
			</div>
			<div class="col-sm-2-0">
				<button class="btn btn-danger "> <i class="fas fa-search fa-sm"></i></button>
			</div>
		</div>
		</form>
	</div>
		<br>
	

			<table class="table table-hover" id="dataTable" width="90%" cellspacing="0">
				<thead class="bg-dangers text-dark">
					<tr>
						
						<th>username</th>
						<th>Email</th>
						<th>Password</th>
						<th>UserType </th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(mysqli_num_rows($query_run) > 0)
					{
						while($row = mysqli_fetch_assoc($query_run))
						{
						?>
					<tr>
					
						<td><?php echo $row['username'];?></td>
						<td><?php echo $row['email'];?></td>
						<td><?php echo $row['password'];?></td>
						<td><?php echo $row['usertype'];?></td>
						<td>
							<form action="register_edit.php" method="post">
								<input type="hidden" name="edit_id" value="<?php echo $row['member_id']; ?>">
						   <button  type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
						</form>
						</td>
						<td>
						<form action="code.php" method="post">
							<input type="hidden" name="delete_id" value="<?php echo $row['member_id']; ?>">
						   <button  type="submit" name="deletebtn" class="btn btn-danger">DELETE</button>
						</form>
						</td>
					      
					</tr>
						<?php	
						}
					}else
					{
						echo '<div class="alert alert-warning"> No Record Founded: </div>';
					}

					?>
				</tbody>
				
			</table>
		</div>
	</div>

</div>

<?php 
include('footer.php');
include('scripts.php');
?>