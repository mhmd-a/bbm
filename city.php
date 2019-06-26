<?php 
 include('connection.php');

 
    $city = " SELECT * FROM state";
    $query_run = mysqli_query($connection, $city);

//include('security.php');
include('header.php');
include('navbar.php');
?>



<!-- Modal -->
<div class="modal fade" id="addState" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel" >Add New City</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	      <form action="city_end.php" method="post">
	      <div class="modal-body">
	      		<div class="form-group">
	      		<label>City Code</label>
	      		<input type="text" name="city_code" class="form-control" placeholder="Enter City Code">
	      	</div>
	      	<div class="form-group">
	      	<label>Select State</label>
	      	<select name="state" class="form-control">
	      		
	      			<?php
					if(mysqli_num_rows($query_run) > 0)
					{
						while($row = mysqli_fetch_assoc($query_run))
						{
						?>
						
						<option value="<?php echo $row['state_id'];?>"><?php echo $row['state_name'];?></option>
						<?php	
						}
					}
					?>
	      	</select>
	      	</div>
	      	<div class="form-group">
	      		<label>City Name</label>
	      		<input type="text" name="city_name" class="form-control" placeholder="Enter City Name">
	      	</div>
	      		
	      	<div class="form-group">
	      		<label>Description</label>
	      		<input type="text" name="description" class="form-control" placeholder="Enter Description">
	      	</div>
           
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" name="City_Btn" class="btn btn-warning">Save</button>
	      </div>
	    </form>
	   </div>
  </div>
</div>


  <!-- the table displaying data-->

 
<!-- Datatables example -->
	<div class="card shadow mb-2">
		<div class="card-header py-3  bg-white ">
			  
		  <h5 class="m-0 font-weight-bold text-black">  Hello, <span style="color: blue"> <?php echo $_SESSION['username']?></span> Welcome To City Management Page:
	      </h5>
	       <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addState">
			 add City
			 </button>
	    </div>
	<div class="card-body">

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
		<div class="table-responsive">
			<?php
			include('connection.php');
            
            $query = " SELECT city.city_id, city.city_code, city.city_name, city.description, state.state_name FROM city LEFT JOIN state ON state.state_id = city.state_fk";
            $query_run = mysqli_query($connection, $query);

			?>
			<table class="table table-hover" id="dataTable" width="90%" cellspacing="0">
				<thead class="bg-defoult text-black">
					<tr>
						
						<th>City Code</th>
						<th>City Name</th>
						<th>State</th>
						<th>Description</th>
						<th>Action</th>
						<th>Action</th>
					
					
					</tr>
				</thead>
				<tbody>
					<?php
					
						while($row = mysqli_fetch_assoc($query_run))
						{
						?>
					<tr>
					
						<td><?php echo $row['city_code'];?></td>
						<td><?php echo $row['city_name'];?></td>
						<td><?php echo $row['state_name'];?></td>
						<td><?php echo $row['description'];?></td>
						
						<td>
							<form action="edit_city.php" method="post">
								<input type="hidden" name="edit_id" value="<?php echo $row['city_id']; ?>">
						   <button  type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
						</form>
						</td>
						<td>
						<form action="city_end.php" method="post">
							<input type="hidden" name="delete_id" value="<?php echo $row['city_id']; ?>">
						   <button  type="submit" name="deletebtn" class="btn btn-danger">DELETE</button>
						</form>
						</td>
					      
					</tr>
						<?php	
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