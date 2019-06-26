<?php 
include('header.php');
include('navbar.php');
?>



<!-- Modal -->
<div class="modal fade" id="addState" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title" id="exampleModalLabel" >Add New State</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	      <form action="state_end.php" method="post">
	      <div class="modal-body">
	      		<div class="form-group">
	      		<label>State Code</label>
	      		<input type="text" name="state_code" class="form-control" placeholder="Enter State Code">
	      	</div>
	      	<div class="form-group">
	      		<label>State Name</label>
	      		<input type="text" name="State_name" class="form-control" placeholder="Enter State Name">
	      	</div>
	      	<div class="form-group">
	      		<label>Description</label>
	      		<input type="text" name="description" class="form-control" placeholder="Enter Description">
	      	</div>
	      
	      	       <input type="hidden" name="usertype" value="admin">
           
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" name="State_btn" class="btn btn-warning">Save</button>
	      </div>
	    </form>
	   </div>
  </div>
</div>

 <div class="container shadow mb-4">
<!-- Datatables example -->
	<div class="card shadow mb-2">
		<div class="card-header py-3  bg-white ">
			  
		  <h5 class="m-0 font-weight-bold text-black">  Hello, <span style="color: blue"> <?php echo $_SESSION['username']?></span> Welcome To State Management Page:
	      </h5>
	       <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addState">
			 add State
			 </button>
	    </div>
	<div class="card-body">

		<?php
			include('connection.php');
            if(isset($_POST['search']))
            {
            	$searchKey = $_POST['search'];

            	 $query = " SELECT * FROM state where state_name LIKE '%$searchKey%'";
          

            }else
            {
            	 $query = " SELECT * FROM state";
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
				<thead class="bg-white text-dark">
					<tr>
						
						<th>State Code</th>
						<th>Name</th>
						<th>Description</th>
						<th>Action</th>
						<th>Action</th>
					
					
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
					
						<td><?php echo $row['state_code'];?></td>
						<td><?php echo $row['state_name'];?></td>
						<td><?php echo $row['description'];?></td>
						
						<td>
							<form action="edit_state.php" method="post">
								<input type="hidden" name="edit_id" value="<?php echo $row['state_id']; ?>">
						   <button  type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
						</form>
						</td>
						<td>
						<form action="state_end.php" method="post">
							<input type="hidden" name="delete_id" value="<?php echo $row['state_id']; ?>">
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